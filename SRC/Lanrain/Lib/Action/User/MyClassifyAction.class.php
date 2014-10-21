<?php
class MyClassifyAction extends UserAction{
	function index(){
		$classify = $this->_get('classify');
		//$classid = $this->_get('classid');
		//if($classify){

			$db=D('Img');
			$where['classname']=$classify;
			$where['classid'] =$classid;
			$_SESSION['classname']=$classify;$_SESSION['classid']=$classid;
			$count=$db->where($where)->count();
			$page=new Page($count,25);
			$info=$db->where($where)->order('statdate DESC,id DESC')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('page',$page->show());
			$this->assign('info',$info);
			
			$info2 = M('Function')->where(array('name'=>$classify))->find();
			$this->assign('classify',$info2['funtype']);
			$this->assign('classify2',$classify);
			$this->assign('token',session('token'));
			$this->display('Img:index');
			
			
		//}
		//else{
		//	$this->error('没有找到该分类！');
		//}
		
		
		
	}
}

?>