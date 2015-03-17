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
		$mod = M('doctor');
		//所有医院
		$hospitalList = $mod->field('id,hospital')->group('hospital')->where("hospital != ''")->select();
		$this->assign("hospitalList",$hospitalList);
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
	//会诊医生
	public function hzdoc(){
		$mod = M('doctor');
		//所有医院
		$hospitalList = $mod->field('id,hospital')->group('hospital')->where("hospital != ''")->select();
		//所有医生
		$where['name'] = array("neq",'');
        $this->publicSearch($where);
		$this->display();
	}
	//根据医院获取该医院所有科室
	public function getDepartment(){
		$hospital = $this->_get('hospital');
		$departmentList = M('doctor')->field('department')->where(array('hospital'=>$hospital))->group('department')->select();
		echo json_encode($departmentList);
	}
	//根据医院和科室查找医生/快速搜索
	public function ksearch(){
		$hospital = '';
		$department='';
		if(IS_POST){
				$hospital = $this->_post('hospital');
				$department = $this->_post('department');			
		}
		if(IS_GET){
				$hospital = $this->_get('hospital');
				$department = $this->_get('department');			
		}

		if($hospital == '' && $department == '') {
			  $this->redirect(U('Huai/hzdoc'));exit;
		}else{
			  $where = array();
			  $where['hospital'] = $hospital;
			  $where['department'] = $department;
              $this->publicSearch($where);
			  $this->display('hzdoc');			  
		}
	}
	//模糊搜索
	public function search(){
		       $keywords = '';
			   if(IS_POST){
			   	    $keywords = $this->_post('keywords','trim');
			   }
			   
			   if(IS_GET){
			   		$keywords = $this->_get('keywords','trim');
			   }
		    
		    if($keywords == ''){
		    	$this->redirect(U('Huai/hzdoc'));exit;
		    }else{
		    	$where = array();
		    	$where['name'] = array('like','%'.$keywords.'%');
		    	$where['department'] = array('like','%'.$keywords.'%');
		    	$where['hospital'] = array('like','%'.$keywords.'%');
		    	$where['goodProject'] = array('like','%'.$keywords.'%');
		    	$where['_logic'] = 'or';
				$mod = M('doctor');
				//所有医院
				$hospitalList = $mod->field('id,hospital')->group('hospital')->where("hospital != ''")->select();
				//所有医生
				$count=$mod->where($where)->count();
				$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();//
				$doctorList=$mod->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
				foreach($doctorList as $key =>$val){
					 $doctorList[$key]['name'] = preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$val['name']);
					 $doctorList[$key]['department'] = preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$val['department']);
					 $doctorList[$key]['hospital'] = preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$val['hospital']);
					 $doctorList[$key]['goodProject'] = preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$val['goodProject']);			 
				}
				$this->assign('page',$show);
				//dump($doctorList);die;
				$this->assign("doctorList",$doctorList);
				$this->assign("count",$count);
				$this->assign("hospitalList",$hospitalList);	
		    	$this->assign("keywords",$keywords);
		    	$this->display('hzdoc');
		    }
	}
	//搜索公共部分
	public function publicSearch($where= array()){
		$mod = M('doctor');
		//所有医院
		$hospitalList = $mod->field('id,hospital')->group('hospital')->where("hospital != ''")->select();
		//所有医生
		$count=$mod->where($where)->count();
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();//
		$doctorList=$mod->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		//dump($doctorList);die;
		$this->assign("doctorList",$doctorList);
		$this->assign("count",$count);
		$this->assign("hospitalList",$hospitalList);		
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
	
	public function doctser(){
	
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
