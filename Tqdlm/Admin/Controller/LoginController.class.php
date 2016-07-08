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
                $_SESSION['username'] = $data['username']; 
                $_SESSION['id'] = $data['id'];    
                $this->success("登录成功", 'Admin/News/index');    
            } else {
                $this->error('账号或密码错误');   
            }
        } else {
            $this->display();
        }
    }

}