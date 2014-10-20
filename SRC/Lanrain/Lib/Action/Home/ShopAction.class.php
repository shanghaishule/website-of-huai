<?php
class ShopAction extends BaseAction{
	public function _initialize() {
		//$where['token']=$this->getTokenTall();
		$flash=M('Flash')->select();
		$flash=$this->convertLinks($flash);
		$this->assign('flash',$flash);
		//dump($flash);exit;
		
		$title = M('img');		
		$where['classname'] = array ('eq','通知公告');
		$tit=$title->order('uptatetime DESC')->limit(1)->where($where)->select();
		//dump($tit);exit;
		$this->assign('titl',$tit);
		
		//$token = $_SESSION['token'];
		$token=$this->getTokenTall();
		$this->assign('token',$token);
		
		

		
		
	}
	public function convertLinks($arr){
		$i=0;
		foreach ($arr as $a){
			if ($a['url']){
				$arr[$i]['url']=$this->getLink($a['url']);
			}
			$i++;
		}
		return $arr;
	}

	public function index(){
		$where = array();
		$where['isshow']='是';
		$where['class']=1;
		$list = M('function_master')->where($where)->order('orderno asc')->select();
		$this->assign('list',$list);
		//dump($list);exit;
		$this->display();
	}
	public function classtwo(){
		$classone = $this->_get('classone');
		//dump($classone);exit;
		if($classone){
			$classtwo = M('function')->order('gid')->where(array('funtype'=>$classone))->select();
			//dump($classtwo);exit;
			$this->assign('classtwo',$classtwo);
			$this->display();
		}else{
			$this->error('参数错误！');
		}
	}
	public function tousu(){
		$this->display();
	}
	public function dh(){
		$this->display();
	}
	public function detail(){
		$data["classtwo"] = $this->_get('classtwo');
		$data["classid"] =$this->_get('classid');
		//dump($classtwo);exit;
		if($data["classtwo"]){
			$classtwo = M('img')->where($data)->order('createtime DESC')->select();
			//dump($classtwo);exit;
			$this->assign('classtwo',$classtwo);
			$this->display();
		}else{
			$this->error('参数错误！');
		}
	
	
	}	
	public function news(){//新闻中心
		$this->display();
	}
	public function comstyle(){//企业风采
		$this->display();
	}
	public function goveropen(){//政务公开
		$this->display();
	}	
	public function interv(){//招商引资
		$this->display();
	}
	public function exchange(){//互动交流
		$this->display();
	}	
	public function plive(){//港城民生
		$this->display();
	}
	public function server(){//便民服务
		$this->display();
	}
	public function chanye(){//临港产业城
		$this->display();
	}
    Public function chanye_detail(){//临港产业城5大模块
    	$this->display();
    }		
	public function weixing(){//澄西卫星城
		$this->display();
	}
	public function shengtai(){//生态宜居城
		$this->display();
	}							
	public function add_tousu(){
		$tousu=	D('Tousu');
		if($tousu->create()){
			if($tousu->add()){
				$this->success("提交成功！");
			}else{
				$this->error("服务器忙，请稍后再试！");
			}
		}else{
			$this->error($tousu->getError());
		}
	}
	public function query(){
		$this->display();
	}
}
?>