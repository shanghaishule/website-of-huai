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
		$this->display ();
	}
	// about
	public function about() {
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
		if($_GET['p']==false){
			$page=1;
		}else{
			$page=$_GET['p'];
		}
		//$where['classname']=$this->_get('classname','trim');
		$count=$db->count();
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();//
		$res=$db->order('statdate DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$res=$this->convertLinks($res);
		$this->assign('page',$show);
		$this->assign('p',$page);
		$this->assign('info',$this->info);
		$this->assign('tpl',$this->tpl);
		$this->assign('res',$res);
		//dump($res);die;
		$this->assign('copyright',$this->copyright);
		if ($count==1){
			$this->content($res[0]['id']);
			exit();
		}
		$this->display();
	}
	public function convertLinks($arr) {
		$i = 0;
		foreach ( $arr as $a ) {
			if ($a ['url']) {
				$arr [$i] ['url'] = $this->getLink ( $a ['url'] );
			}
			$i ++;
		}
		return $arr;
	}
	public function getLink($url){
		$urlArr=explode(' ',$url);
		$urlInfoCount=count($urlArr);
		if ($urlInfoCount>1){
			$itemid=intval($urlArr[1]);
		}
		//会员卡 刮刮卡 团购 商城 大转盘 优惠券 订餐 商家订单 表单
		if (strExists($url,'刮刮卡')){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'大转盘')){
			$link='/index.php?g=Wap&m=Lottery&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'砸金蛋')){
			$link='/index.php?g=Wap&m=Zadan&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'优惠券')){
			$link='/index.php?g=Wap&m=Coupon&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'刮刮卡')){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'商家订单')){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Host&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&hid='.$itemid;
			}else {
				$link='/index.php?g=Wap&m=Host&a=Detail&token='.$this->token.'&wecha_id='.$this->wecha_id;
			}
		}elseif (strExists($url,'万能表单')){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Selfform&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif (strExists($url,'相册')){
			$link='/index.php?g=Wap&m=Photo&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Photo&a=plist&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif (strExists($url,'全景')){
			$link='/index.php?g=Wap&m=Panorama&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Panorama&a=item&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif (strExists($url,'会员卡')){
			$link='/index.php?g=Wap&m=Card&a=vip&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'商城')){
			$link='/index.php?g=Wap&m=Product&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'订餐')){
			$link='/index.php?g=Wap&m=Product&a=dining&dining=1&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'团购')){
			$link='/index.php?g=Wap&m=Groupon&a=grouponIndex&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'留言')){
			$link='/index.php?g=Wap&m=Liuyan&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'首页')){
			$link='/index.php?g=Wap&m=Index&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}else {
			if (strpos($url,'?')){
				$link=str_replace('{wechat_id}',$this->wecha_id,$url).'&wecha_id='.$this->wecha_id;
			}else {
				$link=str_replace('{wechat_id}',$this->wecha_id,$url).'?wecha_id='.$this->wecha_id;
			}
				
		}
		return $link;
	}	
}
?>