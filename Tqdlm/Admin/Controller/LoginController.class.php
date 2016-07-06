<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function login() {

     //    if(empty($_POST['username'])){

     //        $this->error('帐号错误!');

	    // }elseif (empty($_POST['pwd'])){

	    //     $this->error('密码必须!');
	    // }

        $Dao = M("admin");

        $arr["username"] = "123456";
        $arr["pwd"] = "123456";

        $data = $Dao->where($arr)->field("id,username")->select();
        
        $_SESSION['username'] = $data[username]; 
        $_SESSION['pwd'] = $data[pwd];

        if($data>0){     
            $this->success("登陆成功",'Admin/Login/logn');    
        }else{
            $this->error('登录失败');   
        }
    }

     public function logn() {

    echo 11111;
    }
}