<?php
namespace Admin\Controller;

use Think\Controller;
use Common\Util\ParamCheck;

class NewsController extends CommonController
{
    /**
     * 获取列表
     */
    public function index()
    {
       if(IS_AJAX){
            $m_news = M('news');
            $requestData = $_REQUEST;
            $columns = array( 
                0 => 'title', 
                1 => 'type',
                2 => 'view',
                3 => 'is_online',
                4 => 'is_top',
                5 => 'mod_ts'
            );

            // 获取所有记录数
            $sql = "SELECT title, type, view, is_online, is_top, mod_ts, id ";
            $sql.=" FROM news";
            $total = count($m_news->query($sql));
            $totalFiltered = $total;

            // 获取搜索
            $sql = "SELECT title, type, view, is_online, is_top, mod_ts, id ";
            $sql.=" FROM news";
            if( !empty($requestData['search']['value']) ) {  
                $sql.=" WHERE title LIKE '%".$requestData['search']['value']."%' ";    
            }
            $totalFiltered = count($m_news->query($sql));
            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
            $res = $m_news->query($sql);

            $types = array('国际新闻', '国内新闻', '中国联盟', '联盟公告');
            $online = array('否', '是');
            $data = array();
            foreach( $res as $k => $v ) {
                $tmp=array();
                $id = $v['id'];
                $tmp[] = $v["title"];
                $tmp[] = $types[$v["type"]];
                $tmp[] = $v["view"];
                $tmp[] = $online[$v["is_online"]];
                $tmp[] = $online[$v["is_top"]];
                $tmp[] = $v["mod_ts"];
                $tmp[] = "<a class='btn btn-success tip-left view' style='margin-right:15px;' href='javascript:;' data-id='{$id}' title='查看'>查看</a>".
                         "<a class='btn btn-info tip-left edit' href='javascript:;' style='margin-right:15px;' data-id='{$id}' title='编辑'>编辑</a>".
                         "<a class='btn btn-danger tip-left del' href='javascript:;' data-id='{$id}' title='删除'>删除</a>";
                $data[] = $tmp;
            }

            $json_data = array(
                "draw"            => intval( $requestData['draw'] ), 
                "recordsTotal"    => intval( $total ),
                "recordsFiltered" => intval( $totalFiltered ), 
                "data"            => $data
            );

            echo json_encode($json_data);exit;
       }
        $this->display();
    }

    /**
     * 添加页面
     */
    public function add()
    {
        $this->display();
    }

    /**
     * 创建
     */
    public function create()
    {
        $data = $this->_checkParam();

        $id = M('news')->add($data);
        if ($data['is_top'] == '1') {
            // 如果这条新闻置顶 其他新闻全不置顶
            $where = "is_top = '1' And id <> {$id} AND type = '".$data['type']."'";
            M('news')->where($where)->save(array('is_top' => '0'));
        }
        if($id){
            $this->success("添加成功", U('Admin/News/index'));
        }else{
            $this->success("添加失败");
        }
    }

    /**
     * 编辑页面
     */
    public function edit()
    {
        $id = $_GET['id'];

        $info = M('News')->getById($id);
        
        $this->assign('info', $info);
        $this->display();
    }

    /**
     * 更新
     */
    public function update()
    {
        $id = $_POST['id'];
        $data = $this->_checkParam();
        if (empty($data['cover'])) unset($data['cover']);
        
        $row = M('News')->where('id='.$id)->save($data);
        if($row){
            if ($data['is_top'] == '1') {
                // 如果这条新闻置顶 其他新闻全不置顶
                $where = "is_top = '1' And id <> {$id} AND type = '".$data['type']."'";
                M('news')->where($where)->save(array('is_top' => '0'));
            }

            $this->success("更新成功", U('Admin/News/index'));
        }else{
            $this->success("更新失败!",$_SERVER['REQUEST_URI']);
        }
    }

    /**
     * 查看页面
     */
    public function view()
    {
        $id = $_GET['id'];

        $info = M('News')->getById($id);

        $this->assign('info', $info);
        $this->display();
    }

    /**
     * 删除
     */
    public function delete()
    {
        $id = $_POST['id'];

        $row = M('News')->where('id='.$id)->delete();
        if ($row) {
            $result = array('is_ok' => true);
        } else {
            $result = array('is_ok' => false);
        }
        echo json_encode($result);exit;
    }

    /**
     * _checkParam
     */
    private function _checkParam()
    {
//        ParamCheck::checkString('标题',$_POST['title'], 1);
//        ParamCheck::checkString('内容',$_POST['content'], 1);
//        ParamCheck::checkInt('类型',$_POST['type'], 1);
//        ParamCheck::checkString('封面',$_POST['cover'], 1);
//        ParamCheck::checkString('查看次数',$_POST['view'], 1);
//        ParamCheck::checkInt('是否置顶',$_POST['is_top'], 1);
//        ParamCheck::checkInt('是否上线',$_POST['is_online'], 1);
        if($_FILES['cover']['tmp_name']){
            $cover = $this->_processPic();
        }
        $data = array(
            'title'     => $_POST['title'],
            'author'    => $_POST['author'],
            'type'      => $_POST['type'],
            'cover'     => $_POST['type'] == '3' ? '' : $cover,
            'content'   => $_POST['content'],
            'is_top'    => $_POST['is_top'],
            'is_online' => $_POST['is_online'],
            'crt_ts'    => time()
        );

        return $data;
    }

    /**
     * 处理上传图片
     * @return string
     */
    private function _processPic()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
        $upload->rootPath = 'Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = 'news/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);

            $cover = $url.'/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
        }

        return $cover;
    }

}