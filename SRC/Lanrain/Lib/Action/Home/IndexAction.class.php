<?php
class IndexAction extends BaseAction{
	public function _initialize(){
		parent::_initialize();
	}
	//关注回复
	public function index(){
		$mod = M('zhuanjia');
		$list = $mod->limit(0,9)->select();
		foreach($list as $key => $val){
			$list[$key]['shanchang'] = strip_tags($val['shanchang']);
		}
		$list = $this->getList($list);
		$this->assign('list',$list);
		$this->display('indexn');
	}
	public function getList($list = array()){
		foreach ($list as $key => $val){
			$hos = M('order_address')->field("id,name")->where(array('id'=>$val['address_id']))->find();
			$keshi = M('keshi')->field("id,name")->where(array('id'=>$val['keshi_id']))->find();
			$zhicheng = M('zhicheng')->field('id,name')->where(array('id'=>$val['zhicheng_id']))->find();
			$list[$key]['hospital'] = $hos['name'];
			$list[$key]['keshi'] = $keshi['name'];
			$list[$key]['title'] = $zhicheng['name'];
		}
		return $list;
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
	
	//qifu
	public function qifu(){
		
			$this->display();
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