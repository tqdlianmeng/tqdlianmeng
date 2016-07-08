<?php
namespace Admin\Controller;
use Think\Controller;

class ApiController extends ApiComController {

	/**
	 * 获取新闻列表
	 */
	public function news() {
		$type = $_REQUEST['type'];
		$p = empty($_REQUEST['p']) ? 1 : $_REQUEST['p'];
		$types = array('0', '1', '2', '3');

		if (empty($type) || !in_array($type, $types)) {
			$this->setErrCode(1);
			$this->setErrMsg('类型参数有误');
			$this->output();
		}

		$page_size = 5;
		$m_news = M('news');
		$where = array('type' => $type, 'is_online' => '1');
		$field = 'id, title, cover, type, content, crt_ts, view';

		$count = $m_news->where($where)->count();
		$total = intval(ceil($count / $page_size));

		$page = new \Think\Page($count, $page_size);
		$data = $m_news->where($where)->page($p.' , '.$page_size)->order('crt_ts DESC')->field($field)->select();
		foreach($data as $k => &$v) {
			if($v['type'] == '3') {
				$v['cover'] = '';
			}
			$v['content'] = htmlspecialchars(strip_tags($v['content']));
			$v['crt_ts'] = date('Y-m-d H:i:s', $v['crt_ts']);
		}

		$result = array('item' => $data, 'current' => intval($p), 'total' => $total);
		$this->setSucceeded(true);
		$this->setResult($result);
		$this->output();
	}

	/**
	 * 获取新闻详情
	 */
	public function newsDetail() {
		$id = $_REQUEST['id'];
		if(empty($id)) {
			$this->setErrCode(1);
			$this->setErrMsg('id参数有误');
			$this->output();
		}

		$field = 'id, title, cover, type, content, crt_ts, view, author';
		$where = array('id' => $id, 'is_online' => '1');

		$info = M('news')->where($where)->field($field)->find();
		if (!empty($info['content']) && !empty($info['id'])) {
			$info['content'] = htmlspecialchars($v['content']);
			M('news')->where('id='.$id)->setInc('view');
			$result = array('detail' => $info);
			$this->setSucceeded(true);
			$this->setResult($result);
			$this->output();
		} else {
			$this->setErrCode(2);
			$this->setErrMsg('内容不存在');
			$this->output();
		}
	}

	/**
	 * 获取对应类型新闻的置顶新闻
	 */
	public function topNews() {
		$type = $_REQUEST['type'];
		$types = array('0', '1', '2', '3');

		if (!in_array($type, $types)) {
			$this->setErrCode(1);
			$this->setErrMsg('类型参数有误');
			$this->output();
		}
		$where = array('type' => $type, 'is_top' => '1', 'is_online' => '1');
		$field = 'id, title, content, crt_ts, view, author';
		$info = M('news')->where($where)->field($field)->order('crt_ts DESC')->limit('1')->find();
		$info['crt_ts'] = date('Y-m-d H:i:s', $info['crt_ts']);
		if (!empty($info['content'])) $info['content'] = htmlspecialchars(strip_tags($v['content']));

		$result = array('top' => $info);
		$this->setSucceeded(true);
		$this->setResult($result);
		$this->output();
	}

	/**
	 * 最新资讯
	 */
	public function latestNews() {
		$m_news = M('news');
		$field = 'title, type, id';
		$info = $m_news->field($field)->limit('0 , 10')->order('crt_ts DESC')->select();
		$result = array('item' => $info);

		$this->setSucceeded(true);
		$this->setResult($result);
		$this->output();
	}

	/**
	 * 获取赛事资讯的轮播图 1-国际赛事 2-国内赛事
	 */
	public function getSlide() {
		$type = $_REQUEST['type'];
		$types = array('1', '2');
		if (empty($type) || !in_array($type, $types)) {
			$this->setErrCode(1);
			$this->setErrMsg('type参数错误');
			$this->output();
		}

		$m_news = M('slide');
		$where = array('is_online' => '1');
		$field = 'img';
		$slides = $m_news->where($where)->field($field)->order('crt_ts DESC')->select();

		$result = array('item' => $slides);
		$this->setSucceeded(true);
		$this->setResult($result);
		$this->output();
	}

	/**
	 * 获取赛事资讯
	 */
	public function getEvent() {
		$type = $_REQUEST['type'];
		$types = array('0', '1');
		$p = empty($_REQUEST['p']) ? 1 : intval($_REQUEST['p']);
		if (!in_array($type, $types)) {
			$this->setErrCode(1);
			$this->setErrMsg('type参数错误');
			$this->output();
		}

		$m_event = M('event');
		$where = array('is_online' => '1', 'type' => $type);

		$page_size = 4;
		$count = $m_event->where($where)->count();
		$total = intval(ceil($count/$page_size));
		$start = $page_size * ($p - 1);
		$end = $start + $page_size;

		$limit = $start.' , '.$page_size;
		$field = 'id, title, cover, content, crt_ts, view';
		$info = $m_event->where($where)->limit($limit)->field($field)->order('crt_ts DESC')->select();
		foreach ($info as $k => &$v) {
			if ($v['content']) $v['content'] = htmlspecialchars(strip_tags($v['content']));
			$v['crt_ts'] = date('Y-m-d H:i:s', $v['crt_ts']);
		}

		$result = array('item' => $info);
		$this->setSucceeded(true);
		$this->setResult($result);
		$this->output();
	}


	public function getActivity() {
		$type = $_REQUEST['type'];
		$types = array('0', '1', '2', '3', '4', '5');
		if (!in_array($type, $types)) {
			$this->setErrCode(1);
			$this->setErrMsg('type参数错误');
			$this->output();
		}

		$m_activity = M('activity');
		$where = array('is_online' => '1', 'type' => $type);
		$page_size = 4;
		$count = $m_event->where($where)->count();
		$total = intval(ceil($count/$page_size));
		$start = $page_size * ($p - 1);
		$end = $start + $page_size;
	}
}