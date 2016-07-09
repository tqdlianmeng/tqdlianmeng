<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function pwdUpdate(){

    	$u_pwd = M('admin');

    	$where = array('id' =>$_SESSION['id'], 'pwd' => md5($_POST['old_pwd']));
    	$oldpwd = $u_pwd -> where($where) -> find();
    	
    	if(empty($_POST['old_pwd'])){
    		$this->error('原密码选项不能为空');
    	}elseif(!$oldpwd){
    		$this->error('原密码选项不正确');
    	}elseif($_POST['new_pwd'] != $_POST['repwd']){
    		$this->error('两次密码输入不正确');
    	}else{
    		$res = $u_pwd -> where("id=".$_SESSION['id']) -> save(array('pwd' => md5($_POST['new_pwd'])));
    		if($res){
    			$this->success('管理密码修改成功', U('Admin/News/index'));
    		}else{
    			$this->error('管理密码修改失败', U('Admin/News/index'));
    		}
    	}
    }
}