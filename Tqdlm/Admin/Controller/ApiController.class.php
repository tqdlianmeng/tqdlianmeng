<?php
namespace Admin\Controller;
use Think\Controller;

class ApiController extends ApiComController {

	public function news() {
		$type = $_REQUEST['type'];
		$page = empty($_REQUEST['p']) ? 1 : $_REQUEST['p'];
		$types = array('0', '1', '2', '3');

		if (empty($type) || !in_array($type, $types)) {
			$this->setErrCode(1);
			$this->setErrMsg('类型参数有误');
			$this->output();
		}

		$m_news = M('news');
		$where = array('type' => $type);
		$count = $m_news->where($where)->count();
		$page = new \Think\Page($count, 5);
		
	}
}