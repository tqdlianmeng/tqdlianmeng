<?php

namespace Admin\Controller;
use Think\Controller;

class ApiComController extends Controller {
	private $_succeeded = false;
	private $_result = array('token' => 'this is a token!');// TODO：可用来验证api调用的安全性
	private $_err_code = NULL;
	private $_err_msg = 'unkown error';
	
	public function setSucceeded($is_ok) {
		$this->_succeeded = $is_ok;
	}
	
	public function getSucceeded() {
		return $this->_succeeded;
	}
	
	public function setResult($result) {
		if (!empty($result)) {
			$this->_result = array_merge($this->_result, $result);
		}
	}
	
	public function getResult() {
		return $this->_result;
	}
	
	public function setErrCode($err_code) {
		$this->_err_code = $err_code;
	}
	
	public function getErrCode() {
		return $this->_err_code;
	}
	
	public function setErrMsg($err_msg) {
		$this->_err_msg = $err_msg;
	}
	
	public function getErrMsg() {
		return $this->_err_msg;
	}
	
	/**
	 * 生成输入结果数组
	 * 
	 * @author wwt
	 */
	private function _genResult() {
		
		$result = array("succeeded" => $this->_succeeded, 'result' => $this->getResult());
		
		if (!$this->_succeeded) {
			if (!empty($this->_err_msg)) {
				$result['errmsg'] = $this->_err_msg;
			}
			
			if (!empty($this->_err_code)) {
				$result['errcode'] = $this->_err_code;
			}
		} else {
			$result['errcode'] = 0;
			$result['errmsg'] = '';
		}
		
		return json_encode($result);
	}
	
	/**
	 * 输出json格式结果
	 * 
	 * @author wwt
	 */
	public function output() {
		$content = $this->_genResult();
		
		ob_clean();
		
		header('Content-Length: ' . strlen($content));
		header('Connection: Close');
		
		echo $content;
		
		ob_end_flush();
		
		exit;
	}
}
?>