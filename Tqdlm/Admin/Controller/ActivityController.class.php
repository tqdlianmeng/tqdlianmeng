<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController {
    
    public function index() {

        if (IS_AJAX) {
            $m_act = M('Activity');
            $requestData= $_REQUEST;
            $columns = array( 
                0 => 'title', 
                1 => 'type',
                2 => 'view',
                3 => 'is_online',
                4 => 'mod_ts'
            );

            // 获取所有记录数
            $sql = "SELECT id ";
            $sql.=" FROM Activity";
            $total = count($m_act->query($sql));
            $totalFiltered = $total;

            // 获取搜索
            $sql = "SELECT title, type, view, is_online, mod_ts, id ";
            $sql.=" FROM Activity";
            if( !empty($requestData['search']['value']) ) {  
                $sql.=" WHERE title LIKE '%".$requestData['search']['value']."%' ";    
            }
            $totalFiltered = count($m_act->query($sql));
            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
            $res = $m_act->query($sql);

            $types = array('国际、国内讲习', '国际、国内会议', '国际活动', '中国联盟活动', '分区活动', '省级协会活动');
            $online = array('否', '是');
            $data = array();
            foreach( $res as $k => $v ) {
                $tmp=array();
                $id = $v['id'];
                $tmp[] = $v["title"];
                $tmp[] = $types[$v["type"]];
                $tmp[] = $v["view"];
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

    //点击查看
    public function view() {
        $id = I('get.id');
        if (empty($id)) {
            $this->redirect('Activity/index');
        }
        $m_event = M('activity');
        $data = $m_event->where('id='.$id)->select();

        $this->assign('data', $data[0]);
        $this->display();
    }


    //活动资讯添加
    public function add(){
        // echo "<pre>";
        // var_dump($_POST);
        // var_dump($_FILES);
        // echo  "</pre>";
    	$Act = M('activity');
        
        if (IS_POST) {
            $test = $Act -> where(array('title'=>$_POST['title'])) -> select();

            if($test){
                $this -> error("介个活动都添加完了，不信你瞅瞅");
            }

            $data = array(
                'title'     => $_POST['title'],
                'author'    => $_POST['author'],
                'content'   => $_POST['content'],                
                'crt_ts'    => time()        
            );
            foreach($data as $key => $val){
                if(empty($val)){
                    $this -> error("必填选项不能为空");
                }
            }

            $data['is_online'] = $_POST['is_online'];
            $data['type']      = $_POST['type'];
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'activity/'; // 设置附件上传（子）目录


            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
                if(!empty($info['cover']['savename'])) {
                    $data['cover'] = $url.'/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
                }
                if(!empty($info['attach']['savename'])) {
                    $data['attach'] = $url.'/Public/Uploads/'.$info['attach']['savepath'].$info['attach']['savename'];
                }
            }


        	$res = $Act -> add($data);

        	if($res){
        		$this -> success("活动添加成功", U('Admin/Activity/index'));
        	}else{
        		$this -> error("活动添加失败");
        	}

        } else {
            $this->display();
        }
    }

    public function del(){

    	$Act = M('activity');

    	$id = $_POST['id'];
        
        $res = $Act->where('id='.intval($id))->delete();
        if ($res) {
            $result = array('is_ok' => true);
        } else {
            $result = array('is_ok' => false);
        }
        echo json_encode($result);exit;
    }


    public function edit(){
        $M = M("activity");
        $activity = $M->where("id=" . (int)$_GET['id'])->find();
        // var_dump($activity);die();
        
        if ($activity['id'] == '') {
            $this->error("该活动不存在");
        }

        $this->assign("activity", $activity);
        
        $this->display();
    }


    public function update(){
        // echo "<pre>";
        // var_dump($_POST);
        // var_dump($_FILES);
        // echo  "</pre>";die;
        if (IS_POST) {
            $list = M("activity");
            $data = array(
                'title'     => $_POST['title'],
                'author'    => $_POST['author'],
                'content'   => $_POST['content']                    
            );
            foreach($data as $key => $val){
                if(empty($val)){
                    $this -> error("必填选项不能为空");
                }
            }

            if(!empty($_FILES['cover']['name']) || !empty($_FILES['attach']['name'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'activity/'; // 设置附件上传（子）目录
                
            // 上传文件 
                $info = $upload->upload();
            
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);

                if(!empty($info['cover'])) {
                    $data['cover'] = $url.'/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
                }

                if(!empty($info['attach'])) {
                    $data['attach'] = $url.'/Public/Uploads/'.$info['attach']['savepath'].$info['attach']['savename'];
                }             
            }
            $data['is_online'] = $_POST['is_online'];
            $data['type']      = $_POST['type'];
            $res = $list->where('id='.(int)$_POST['act_id'])->save($data);
        
            if($res){
                $this -> success("活动修改成功", U('Admin/Activity/index'));
            }else{
                $this -> error("活动修改失败");
            }
        }
    }


}