<?php
class IndexAction extends BaseAction{
	//关注回复
	public function index(){
		//就医资讯
		$article_arr = M('img')->field('id,title')->where("classname='%s'",array('就医资讯'))->order('uptatetime DESC')->limit(9)->select();
		//绿色通道
		$green_arr = M('img')->field('id,title')->where("classname='%s'",array('绿色通道'))->order('uptatetime DESC')->limit(7)->select();
		//专家观点
		$idea_arr = M('img')->field('id,title')->where("classname='%s'",array('专家观点'))->order('uptatetime DESC')->limit(7)->select();
		//公司新闻
		$news_arr = M('img')->field('id,title')->where("classname='%s'",array('公司新闻'))->order('uptatetime DESC')->limit(7)->select();
		
		$this->assign('res',$article_arr);
		$this->assign('res1',$green_arr);
		$this->assign('res2',$idea_arr);
		$this->assign('res3',$news_arr);
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