<?php
function strExists($haystack, $needle)
{
	return !(strpos($haystack, $needle) === FALSE);
}
class HuaiAction extends BaseAction {
	private $info;
	public function _initialize(){
		parent::_initialize();
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
	//tijian
	public function exam() {
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
	// rebook
	public function rebook() {
		$this->display ();
	}
	// rebook
	public function suspect() {
		$this->display ();
	}
	//login
	public function login() {
		$this->display ();
	}
	//qifu
	public function qifu(){
	
		$this->display();
	}
	//lvse
	public function lvse(){
	
		$this->display();
	}
	//indexn
	public function indexn(){
		$mod = M('zhuanjia');
		$list = $mod->limit(0,9)->select();
		foreach($list as $key => $val){
			$list[$key]['shanchang'] = strip_tags($val['shanchang']);
		}
		$list = $this->getList($list);
		$this->assign('list',$list);
		$this->display();
	}

	//family
	public function enterprise(){
	
		$this->display();
	}
	//high
	public function high(){
	
		$this->display();
	}
	//center
	public function center(){
	
		$this->display();
	}
	//worker
	public function worker(){
	
		$this->display();
	}

	//优质资源
	public function source(){
		$mod = M('zhuanjia');
		$list = $mod->limit(0,9)->select();
		$list = $this->getList($list);
		$this->assign('list',$list);
		$this->display();
	}
	//优质资源列表
	public function lists(){
		$mod = M('zhuanjia');
		$count=$mod->count();
		$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();//
		$list = $mod->limit($Page->firstRow.','.$Page->listRows)->select();
		$list = $this->getList($list);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
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
	//家族方案
	public function jzfa(){
		$this->display();
	}
	//三大专题
	public function d_jzfa1(){
		$this->display();
	}

	public function d_jzfa2(){
		$this->display();
	}
	
	public function d_jzfa3(){
		$this->display();
	}
	
    //亚健康管理
    public function yjkgl(){
    	$this->display();
    }
	// 资讯
	public function news() {
		$cname = addslashes($this->_get('cname','trim'));
		if($cname == '就医资讯' || $cname == '专家观点' || $cname == '公司新闻'){
			 $where['classname'] = $cname;
		}else{
			$where = " 1 = 1";
		}
		$db=D('Img');
		//$where['classname']=$this->_get('classname','trim');
		$count=$db->where($where)->count();
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();//
		$res=$db->order('statdate DESC,id ASC')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		$res=$this->convertLinks($res);
		$this->assign('page',$show);
		$this->assign('info',$this->info);
		$this->assign('res',$res);
		//dump($res);die;
		$this->assign('copyright',$this->copyright);
		
		$this->display();
	}
	//移植中心
	public function yizhi(){
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
	   $preId=$db->field('id,title')->where($preId_where)->order('id DESC')->limit(1)->find();
	   
	   $this->assign("preArticle",$preId);
	    
	   $nextId_where["id"]=array('gt',$id);//下一篇
	   $nextArticle=$db->field('id,title')->where($nextId_where)->order('id ASC')->limit(1)->find();
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
