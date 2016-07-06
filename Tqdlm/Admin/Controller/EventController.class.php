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

    	} else {
    		$this->display();
    	}
    }
}