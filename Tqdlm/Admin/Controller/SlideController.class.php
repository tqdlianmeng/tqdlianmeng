<?php
namespace Admin\Controller;
use Think\Controller;
//轮播图控制器
class SlideController extends CommonController{

	public function index(){
		
		if (IS_AJAX) {
            $m_act = M('slide');
            $requestData= $_REQUEST;
            $columns = array( 
                0 => 'title', 
                1 => 'type',
                2 => 'img',
                3 => 'is_online',
                4 => 'mod_ts'
            );

            // 获取所有记录数
            $sql = "SELECT title, type, img, is_online, mod_ts, id ";
            $sql.=" FROM slide";
            $total = count($m_act->query($sql));
            $totalFiltered = $total;

            // 获取搜索
            $sql = "SELECT title, type, img, is_online, mod_ts, id ";
            $sql.=" FROM slide";
            if( !empty($requestData['search']['value']) ) {  
                $sql.=" WHERE title LIKE '%".$requestData['search']['value']."%' ";    
            }
            $totalFiltered = count($m_act->query($sql));
            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
            $res = $m_act->query($sql);

            $types = array('1' => '国际赛事轮播图', '2' => '国内赛事轮播图', '3' => '首页顶部轮播图', '4' => '首页中部轮播图', '5' => '首页底部轮播图');
            $online = array('1' => '是', '2' =>'否');
            $data = array();
            foreach( $res as $k => $v ) {
                $tmp=array();
                $id = $v['id'];
                $tmp[] = $v["title"];
                $tmp[] = $types[$v["type"]];
                $tmp[] = "<img style='width:100px;' src='".$v['img']."'>";
                $tmp[] = $online[$v["is_online"]];
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

            echo json_encode($json_data);
            
        } else {
            $this->display();
        }       

		
	}

	public function add(){

		$Slide = M('slide');
		if (IS_POST) {
            $test = $Slide -> where(array('title'=>$_POST['title'])) -> select();

            if($test){
                $this -> error("换个名字好吗？已经重复了");
            }

            $data = array(
                'title'     => $_POST['title'],
                'type'      => $_POST['type'],
                'is_online' => $_POST['is_online'],
                'crt_ts'    => time()
            );		
            
            foreach($data as $key => $val){
                if(empty($val)){
                    $this -> error("必填选项不能为空");
                }
            }

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->exts     = array('jpg', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'slide/'; // 设置附件上传（子）目录

            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
                if(!empty($info['img']['savename'])) {
                    $data['img'] = $url.'/Public/Uploads/'.$info['img']['savepath'].$info['img']['savename'];
                }              
            }

            $data['link_url'] = !empty($_POST['link_url']) ? $_POST['link_url'] : "";
        	$res = $Slide -> add($data);

        	if($res){
        		$this -> success("添加成功", U('Admin/Slide/index'));
        	}else{
        		$this -> error("添加失败");
        	}

        } else {
            $this->display();
        }
    }

    public function del(){

    	$Sli = M('slide');

    	$id = $_POST['id'];
        
        $res = $Sli->where('id='.intval($id))->delete();
        if ($res) {
            $result = array('is_ok' => true);
        } else {
            $result = array('is_ok' => false);
        }
        echo json_encode($result);exit;
    }

    public function edit(){
        $M = M("slide");
        $slide = $M->where("id=" . (int)$_GET['id'])->find();
        // var_dump($slide);die();
        
        if($slide['id'] == ""){
            $this->error("该图片不存在");
        }

        $this->assign("slide", $slide);
        
        $this->display();
    }

    public function update(){

        if (IS_POST) {

            $list = M("slide");
            $data = array(
                'title'     => $_POST['title'],                    
                'type'      => $_POST['type'],                    
                'is_online' => $_POST['is_online']
            );       
            
            foreach($data as $key => $val){
                if(empty($val)){
                    $this -> error("必填选项不能为空");
                }
            }

            if(!empty($_FILES['img']['name'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'slide/'; // 设置附件上传（子）目录

            // 上传文件 
                $info = $upload->upload();
            
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);

                if(!empty($info['img'])) {
                    $data_url['img'] = $url.'/Public/Uploads/'.$info['img']['savepath'].$info['img']['savename'];
                }
            }

            $data['link_url'] = !empty($_POST['link_url']) ? $_POST['link_url'] : "";
            $res = $list->where('id='.(int)$_POST['slide_id'])->save($data);

            if($res){
                $this -> success("修改成功", U('Admin/Slide/index'));
            }else{
                $this -> error("修改失败");
            }
        }
    }

    //点击查看
    public function view() {
        $id = I('get.id');
        if (empty($id)) {
            $this->redirect('Slide/index');
        }
        $sli = M('slide');
        $slide = $sli->where('id='.$id)->find();

        $this->assign('slide', $slide);
        $this->display();
    }
}