<?php
namespace Admin\Controller;
use Think\Controller;

class EventController extends CommonController {
    public function index() {
		if (IS_AJAX) {
			$m_event = M('event');
			$requestData= $_REQUEST;
			$columns = array( 
				0 => 'title', 
				1 => 'type',
				2 => 'view',
				3 => 'is_online',
				4 => 'mod_ts'
			);

			// 获取所有记录数
			$sql = "SELECT title, type, view, is_online, mod_ts, id ";
			$sql.=" FROM event";
			$total = count($m_event->query($sql));
			$totalFiltered = $total;

			// 获取搜索
			$sql = "SELECT title, type, view, is_online, mod_ts, id ";
			$sql.=" FROM event";
			if( !empty($requestData['search']['value']) ) {  
				$sql.=" WHERE title LIKE '%".$requestData['search']['value']."%' ";    
			}
			$totalFiltered = count($m_event->query($sql));
			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
			$res = $m_event->query($sql);

			$types = array('国际赛事', '国内赛事');
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

			echo json_encode($json_data);exit;
			
		} else {
	        $this->display();
		}       
    }

    /**
     * 添加赛事资讯
     */
    public function add() {
    	if (IS_POST) {
    		$data = array(
				'title'     => $_POST['title'],
                'author'    => $_POST['author'],
				'content'   => $_POST['content'],
				'crt_ts'    => time(),
    		);
    		foreach ($data as $k => $v) {
    			if(empty($v)) {
    				$this->error('必填选项不能为空');
    			}
    		}
            $data['is_online'] = $_POST['is_online'];
            $data['type']      = $_POST['type'];
    		$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
			$upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
			$upload->savePath = 'event/'; // 设置附件上传（子）目录
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
		    
    		$res = M('event')->add($data);
    		if ($res) {
    			$this->success('添加成功', U('Admin/Event/index'));
    		} else {
    			$this->error('添加失败,请重新添加');
    		}
    	} else {
    		$this->display();
    	}
    }

    /**
     * 查看赛事资讯
     */
    public function view() {
    	$id = I('get.id');
    	if (empty($id)) {
    		$this->redirect('Event/index');
    	}
    	$m_event = M('event');
    	$data = $m_event->where('id='.$id)->select();

    	$this->assign('data', $data[0]);
    	$this->display();
    }

    /**
     * 编辑赛事资讯
     */
    public function edit() {
    	if(IS_POST) {
    		$id = I('post.id');
    		if (empty($id)) {
    			$this->redirect('Event/index');
    		}
		   	$data = array(
				'title'     => $_POST['title'],
                'author'    => $_POST['author'],
				'content'   => $_POST['content']
    		);
    		foreach ($data as $k => $v) {
    			if(empty($v)) {
    				$this->error('必填选项不能为空');
    			}
    		}

            $data['is_online'] = $_POST['is_online'];
            $data['type']      = $_POST['type'];
    		$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->exts     = array('jpg', 'png', 'jpeg', 'zip', 'rar');// 设置附件上传类型
			$upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
			$upload->savePath = 'event/'; // 设置附件上传（子）目录
		    // 上传文件 
		    $info = $upload->upload();
	    	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);

		   	if(!empty($info['cover'])) {
		   		$data['cover'] = $url.'/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
		   	}

		   	if (!empty($info['attach'])) {
		   		$data['attach'] = $url.'/Public/Uploads/'.$info['attach']['savepath'].$info['attach']['savename'];
		   	}

		   	$res= M('event')->where('id='.I('post.id'))->save($data);
		   	if ($res) {
		   		$this->success('修改成功', U('Admin/Event/index'));
		   	} else {
		   		$this->error('修改失败');
		   	}

    	} else {
    		$id = I('get.id');
	    	if (empty($id)) {
	    		$this->redirect('Event/index');
	    	}
	    	$m_event = M('event');
	    	$data = $m_event->where('id='.$id)->select();

	    	$this->assign('data', $data[0]);
    		$this->display();
    	}
    }

    /**
     * 删除赛事资讯
     */
    public function delete() {
    	$id = $_POST['id'];
    	$m_event = M('event');

    	$res = $m_event->where('id='.intval($id))->delete();
    	if ($res) {
    		$result = array('is_ok' => true);
    	} else {
    		$result = array('is_ok' => false);
    	}
    	echo json_encode($result);exit;
    }
}