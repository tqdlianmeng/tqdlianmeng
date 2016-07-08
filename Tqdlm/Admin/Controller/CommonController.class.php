<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    
    public function _initialize(){
        
        if(!isset($_SESSION['username']) || $_SESSION['username'] == ''){
            $this->error("请先登陆管理员账号", U('Admin/Login/index')); 
        }
    }
}