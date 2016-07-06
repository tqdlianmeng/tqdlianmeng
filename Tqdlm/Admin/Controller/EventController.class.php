<?php
namespace Admin\Controller;
use Think\Controller;
class EventController extends Controller {
    public function index() {
        $this->display();
    }

    /**
     * 添加赛事资讯
     */
    public function add() {
    	if (IS_POST) {
    		$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录
			$upload->savePath = 'event'; // 设置附件上传（子）目录
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
				'type'      => $_POST['type'],
				'content'   => $_POST['content'],
				'is_online' => $_POST['is_online'],
				'crt_ts'    => time(),
				'cover'     => $cover,
				'attach'    => $attach
    		);
    		$res = M('event')->add($data);
    		if ($res) {
    			$this->success('添加成功');
    		} else {
    			$this->error('添加失败,请重新添加');
    		}
    	} else {
    		$this->display();
    	}
    }
}