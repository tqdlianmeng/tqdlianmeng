<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends Controller {
    
    public function index() {

        $sel = M('activity');

        $res = $sel -> field('id,title,type,crt_ts') -> select();

        $type_act = array(
            '0' => "国际活动",
            '1' => "中国联盟活动",
            '2' => "分区协会活动",
            '3' => "省级协会活动",
            '4' => "国际、国内会议",
            '5' => "国际、国内讲习"      
        );
        // echo "<pre>";
        // var_dump($res);
        // echo  "</pre>";
        $this->assign('type_act', $type_act);  
        $this->assign('res', $res);  
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

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'activity/'; // 设置附件上传（子）目录


            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $cover = './Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
                $attach = './Uploads/'.$info['attach']['savepath'].$info['attach']['savename'];
            }
            
            $data = array(
                'title'     => $_POST['title'],
                'author'    => $_POST['author'],
                'type'      => $_POST['type'],
                'content'   => $_POST['content'],
                'is_online' => $_POST['is_online'],
                'crt_ts'    => time(),
                'cover'     => $cover,
                'attach'    => $attach
            );

        	foreach($data as $key => $val){
        		if(empty($val)){
        			$this -> error("必填选项不能为空");
        		}
        	}

        	$res = $Act -> add($data);

        	if($res){
        		$this -> success("数据插入成功");
        	}else{
        		$this -> error("数据插入失败");
        	}
        }else{
            $this->display();
        }
    }

    public function del(){

    	$Act = M('activity');

    	if ($Act -> where("id=" . (int)$_POST['id'])->delete()) {
           echo json_encode(array("status"=>1,"info"=>"删除成功"));
        } else {
            $this->error("删除失败");
        }
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
        // var_dump($_POST);die();
        // $list = M("activity");
        //     $list->where('id='.(int)$_POST['act_id'])->save();
        //  $sql = $list ->getLastSql();
        //  echo $sql;
        // die();

        if (IS_POST) {
            $list = M("activity");

            // $res = $list->where('id='.(int)$_POST['act_id'])->save();

            // //echo json_encode($list);
            // if ($res == 1) {
            //     $this->success('数据保存成功', 'index');
            // }
            // $this->error('数据保存失败', "index");
            if(empty($_POST['attach']) || empty($_POST['cover'])){
            
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
                $upload->rootPath = './Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'activity/'; // 设置附件上传（子）目录

                
            // 上传文件 
                $info = $upload->upload();
            }
            if (!$info) {// 上传错误提示错误信息

                $this->error($upload->getError());
                   
            } else {// 上传成功
                $cover = './Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
                $attach = './Uploads/'.$info['attach']['savepath'].$info['attach']['savename'];
            }
            
            $data = array(
                'title'     => $_POST['title'],
                'author'    => $_POST['author'],
                'type'      => $_POST['type'],
                'content'   => $_POST['content'],
                'is_online' => $_POST['is_online'],
                'crt_ts'    => time(),
                'cover'     => $cover,
                'attach'    => $attach
            );

            foreach($data as $key => $val){
                if(empty($val)){
                    $this -> error("必填选项不能为空");
                }
            }

            $res = $list->where('id='.(int)$_POST['act_id'])->save();
           

            if($res){
                $this -> success("数据保存成功");
            }else{
                $this -> error("数据保存失败");
            }
        }
    }


    // public function sel(){

    //     $sel = M('activity');

    //     $res = $sel -> field('id','title','type','crt_ts') -> select();






    // }


}