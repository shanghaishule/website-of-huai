<?php
class HuaiAction extends BaseAction {
	
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
		/*
		 * $db=D('Img'); if($_GET['p']==false){ $page=1; }else{ $page=$_GET['p']; } $where['classid']=$this->_get('classid','intval'); $count=$db->where($where)->count(); $pageSize=8; $pagecount=ceil($count/$pageSize); if($page > $count){$page=$pagecount;} if($page >=1){$p=($page-1)*$pageSize;} if($p==false){$p=0;} $res=$db->where($where)->order('statdate DESC,id DESC')->limit("{$p},".$pageSize."")->select(); $res=$this->convertLinks($res); $this->assign('page',$pagecount); $this->assign('p',$page); $this->assign('info',$this->info); $this->assign('tpl',$this->tpl); $this->assign('res',$res); $this->assign('copyright',$this->copyright); if ($count==1){ if($res[0]['url'] != ''){ header("location:".$res[0]['url']); } $this->content($res[0]['id']); exit(); } //$this->display($this->tpl['tpllistname']);
		 */
		$this->display ();
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
}
?>