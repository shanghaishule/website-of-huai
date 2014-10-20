<?php
class ZhengwuAction extends UserAction{
	function index(){
		$tous = M('tousu'); // 实例化User对象
		import('ORG.Util.Page');// 导入分页类
		$count= $tous->count();// 查询满足要求的总记录数
		$Page= new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		 // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $tous->order('addtime')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('tous',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	public function proposal(){
		//$this->display('Diaoyan:index');
	}
}
?>