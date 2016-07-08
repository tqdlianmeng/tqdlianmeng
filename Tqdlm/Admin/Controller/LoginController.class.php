<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){

        $this -> display();
    }



    public function login() {

        if(empty($_POST['username'])){

            $this->error('帐号错误!');

	    }elseif (empty($_POST['pwd'])){

	        $this->error('密码必须!');
	    }

        $Dao = M("admin");

        $arr["username"] = $_POST['username'];
        $arr["pwd"] = md5($_POST['pwd']);

        $data = $Dao->where($arr)->field("id,username")->select();
        
        $_SESSION['username'] = $data[username]; 
        $_SESSION['id'] = $data[id];

        if($data>0){     
            $this->success("登陆成功",'Admin/Index/index');    
        }else{
            $this->error('登录失败');   
        }
    }

}