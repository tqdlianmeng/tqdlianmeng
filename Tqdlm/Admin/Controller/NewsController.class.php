<?php
namespace Admin\Controller;

use Think\Controller;
use Common\Util\ParamCheck;

class NewsController extends Controller
{
    /**
     * 获取列表
     */
    public function getList()
    {
       if(IS_AJAX){
           echo 333;die;
       }
        $this->display('News/list');
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
        if($id){
            $this->success("添加成功","/Admin/News/list");
        }else{
            $this->success("添加失败!","/Admin/News/add");
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

        $row = M('News')->where('id='.$id)->save($data);
        if($row){
            $this->success("更新成功","/Admin/News/list");
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
    public function del()
    {
        $id = $_POST['id'];

        $row = M('News')->where('id='.$id)->delete();
        if($row){
            $this->success("删除成功","/Admin/News/list");
        }else{
            $this->success("删除失败!","/Admin/News/list");
        }
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
        if($_FILES){
            $cover = $this->_processPic();
        }
        $data = array(
            'title'=>$_POST['title'],
            'type'=>$_POST['type'],
            'cover'=>$cover,
            'content'=>$_POST['content'],
            'view'=>$_POST['view'],
            'is_top'=>$_POST['is_top'],
            'is_online'=>$_POST['is_online'],
            'crt_ts'=>NOW_TIME,
            'mod_ts'=>NOW_TIME,
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
        $upload->savePath = 'news'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            $cover = '/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
        }

        return $cover;
    }

}