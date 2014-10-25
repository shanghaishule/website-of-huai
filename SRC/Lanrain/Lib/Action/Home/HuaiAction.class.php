<?php
function strExists($haystack, $needle)
{
	return !(strpos($haystack, $needle) === FALSE);
}
class HuaiAction extends BaseAction {
	private $info;
	public function _initialize(){
		$info=M('function_master')->where(array('class'=>1))->order('orderno asc')->select();
		$info=$this->convertLinks($info);//加外链等信息
	}
	
	// 首页
	public function index() {
		$this->display();
	}
	// about
	public function about() {
		$this->display ();
	}
	//hospital
	public function hospital () {
		$this->display ();
	}
	// contacts
	public function contacts() {
		$this->display ();
	}
	// diagnosis
	public function diagnosis() {
		$this->display ();
	}
	// information
	public function information() {
		$this->display ();
	}
	// examination
	public function examination() {
		$this->display ();
	}
	//hospitalall
	public function hospitalall() {
		$this->display ();
	}
	
	// consultant
	public function consultant() {
		$this->display ();
	}
	// product
	public function product() {
		$this->display ();
	}
	// 资讯
	public function news() {
		$db=D('Img');
		//$where['classname']=$this->_get('classname','trim');
		$count=$db->count();
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();//
		$res=$db->order('statdate DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$res=$this->convertLinks($res);
		$this->assign('page',$show);
		$this->assign('info',$this->info);
		$this->assign('res',$res);
		//dump($res);die;
		$this->assign('copyright',$this->copyright);
		
		$this->display();
	}
	
	//资讯详情
	public function newsDetail(){
	   $id = $this->_get('itemid','trim,intval');
	   if($id=='' || $id == null){
	   	  $this->display('news');
	   }
	   $db=D('Img');
	   $res = $db->where("id=%d",array($id))->find();
	   if(false === $res || empty($res)){
	   	  $this->error('当前资讯不存在');
	   	  exit;
	   }
	   
	   $preId_where['id']=array('lt',$id);//上一篇
	   $preId=$db->where($preId_where)->order('id DESC')->limit(1)->find();
	   $this->assign("preArticle",$preId);
	    
	   $nextId_where["id"]=array('gt',$id);//下一篇
	   $nextArticle=$db->where($nextId_where)->order('id ASC')->limit(1)->find();
	   $this->assign("nextArticle",$nextArticle);
	   
	   //dump($res);die;
	   $this->assign('res',$res);
	   $this->display();
	   	
	}
	
	public function convertLinks($arr) {
		$i = 0;
		foreach ( $arr as $a ) {
				$arr [$i] ['url'] = U('Home/Huai/newsDetail',array('itemid'=>$a['id']));
			$i ++;
		}
		return $arr;
	}
	
}
?>
