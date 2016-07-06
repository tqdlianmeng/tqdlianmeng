<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display("add_test.html");
    }

    public function add(){

    	$Act = M('activity');

    	var_dump($_FILES);
    	exit();

    	foreach($_POST as $key => $val){
    		if(empty($val)){
    			$this -> error("必填选项不能为空");
    		}
    	}

    	$res = $Act -> add($_POST);

    	if($res){

    		$this -> success("数据插入成功");
    	}else{
    		$this -> error("数据插入失败");
    	}
    }


    public function del(){

    	$Act = M('activity');

    	if ($Act -> where("id=" . (int)$_POST['id'])->delete()) {
           echo json_encode(array("status"=>1,"info"=>"删除成功"));
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }















}