<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){

        $this -> display();
    }

    /**
     * 后台登录
     */
    public function login() {
        if (IS_POST) {
            if(empty($_POST['username']) || empty($_POST['pwd'])){
                $this->error('帐号或密码不能为空');
            }

            $Dao = M("admin");
            $arr["username"] = $_POST['username'];
            $arr["pwd"] = md5($_POST['pwd']);

            $data = $Dao->where($arr)->field("id,username")->select();
            if ($data>0) {
                
                $_SESSION['username'] = $arr['username']; 
                $_SESSION['id'] = $arr['id'];    
                $this->success("登录成功", U('Admin/News/index'));    
            } else {
                $this->error('账号或密码错误');   
            }
        } else {
            $this->display();
        }
    }

    public function logout(){

        session_unset();
        session_destroy();
        $this->success("退出成功", U('Admin/Login/index'));
        
    }
}