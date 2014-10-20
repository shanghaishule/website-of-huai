<?php
class TousuModel extends Model{
	//自动完成
	protected $_auto = array (
			array('addtime','time',1,'function'), 	//新增时		
	);
	
	//自动验证
	protected $_validate=array(
			array('cwho','require','被投诉人必须！',1,'',3),
			array('cdetail','require','投诉详情必须！',1,'',3),
			array('cphone','isMobile','手机号码格式不正确',0,'callback'),
			array('cname','require','称呼必须！',1,'',3),
	);
	protected  function isMobile($num) {
		if (!$num) {
			return false;
		}
		return preg_match('#^13[\d]{9}$|14^[0-9]\d{8}|^15[0-9]\d{8}$|^18[0-9]\d{8}$#', $num) ? true : false;
	}
}
?>