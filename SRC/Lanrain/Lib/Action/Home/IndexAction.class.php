<?php
class IndexAction extends BaseAction{
	//关注回复
	public function index(){
		
		$this->display('Huai:index');
	}
	public function resetpwd(){
		$uid=$this->_get('uid','intval');
		$code=$this->_get('code','trim');
		$rtime=$this->_get('resettime','intval');
		$info=M('Users')->find($uid);
		if( (md5($info['uid'].$info['password'].$info['email'])!==$code) || ($rtime<time()) ){
			$this->error('非法操作',U('Index/index'));
		}
		$this->assign('uid',$uid);
		$this->display();
	}
	//后台登陆
	public function login(){
		if($_SESSION['uid'] == '' && !isset($_SESSION['uid'])){
			$this->display();
		}else{
			$this->redirect(U('User/Index/index'));
		}
	}
	
	public function test(){
		require_once './Extend/PHPExcel_1.7.9/Classes/PHPExcel/IOFactory.php';
		
		if (!file_exists("./Extend/PHPExcel_1.7.9/Examples/01simple.xls")) {
			exit("file not exist.");
		}
		
		$objPHPExcel = PHPExcel_IOFactory::load("./Extend/PHPExcel_1.7.9/Examples/01simple.xls");
		
		dump($objPHPExcel);
		
		die('xxxx');
	}
}