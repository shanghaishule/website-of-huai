<?php
class BaseAction extends Action
{
    protected function _initialize()
    {
        define('RES', THEME_PATH . 'common');
        define('STATICS', TMPL_PATH . 'static');
        $this->assign('action', $this->getActionName());
        //设置wecha_id值
        $this->getWechaId();
    }
    protected function all_insert($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db   = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->add();
            if ($id) {
                $m_arr = array(
                    'Img',
                    'Text',
                    'Voiceresponse',
                    'Ordering',
                    'Lottery',
                    'Host',
                    'Product',
                    'Selfform',
					'Xitie',
                	'Diymen_class'
                );
                if (in_array($name, $m_arr)) {
                    $data['pid']     = $id;
                    $data['module']  = $name;
                    $data['token']   = session('token');
                    $data['keyword'] = $_POST['keyword'];
                    M('Keyword')->add($data);
                }
                
                if ($name == "Classify") {
                	//同步到商品分类
                	$itemcatedata = array();
                	$itemcatedata['name'] = $_POST['name'];
                	$itemcatedata['tags'] = $id;
                	$itemcatedata['status'] = 1;
                	$itemcatedata['tokenTall'] = session('token');
                	M('item_cate')->add($itemcatedata);
                }

                
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function insert($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db   = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->add();
            if ($id == true) {
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function save($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db   = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->save();
            if ($id == true) {
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function all_save($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db   = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->save();
            if ($id) {
                $m_arr = array(
                    'Img',
                    'Text',
                    'Voiceresponse',
                    'Ordering',
                    'Lottery',
                    'Host',
                    'Product',
                    'Selfform'
                );
                if (in_array($name, $m_arr)) {
                    $data['pid']    = $_POST['id'];
                    $data['module'] = $name;
                    $data['token']  = session('token');
                    $da['keyword']  = $_POST['keyword'];
                    M('Keyword')->where($data)->save($da);
                }
                
                if ($name == "Classify") {
                	//同步到商品分类
                	$itemcatedata0['name'] = $_POST['name'];
                	$itemcatedata1['tags'] = $_POST['id'];
                	$itemcatedata1['tokenTall'] = session('token');
                	M('item_cate')->where($itemcatedata1)->save($itemcatedata0);
                }
                
               // $this->success('操作成功', U(MODULE_NAME . $back));
				$this->success('操作成功', $back);
            } else {
                //$this->error('操作失败', U(MODULE_NAME . $back));
				$this->error('操作失败', $back);
            }
        }
    }
    protected function all_del($id, $name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db   = D($name);
        if ($db->delete($id)) {
            $this->ajaxReturn('操作成功', U(MODULE_NAME . $back));
        } else {
            $this->ajaxReturn('操作失败', U(MODULE_NAME . $back));
        }
    }
	protected function _upload(){
		import("@.ORG.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//设置上传文件类型
		$upload->allowExts = explode(',','jpg,gif,png,jpeg');
		//设置附件上传目录
		$upload->savePath = './data/attachments/';
		//设置需要生成缩略图，仅对图像文件有效
		$upload->thumb = true;
		// 设置引用图片类库包路径
		$upload->imageClassPath = '@.ORG.Image';
		//设置需要生成缩略图的文件后缀
		$upload->thumbPrefix = 'm_';
		//生产2张缩略图
		//设置缩略图最大宽度
		$upload->thumbMaxWidth = '720';
		//设置缩略图最大高度
		$upload->thumbMaxHeight = '400';
		//设置上传文件规则
		$upload->saveRule = uniqid;
		//删除原图
		$upload->thumbRemoveOrigin = true;
		if (!$upload->upload()) {
			//捕获上传异常
			return $upload->getErrorMsg();
		}else{
			//取得成功上传的文件信息
			$uploadList = $upload->getUploadFileInfo();
			return $uploadList;
		}
	}
	
	/*取当前用户微信号加密值，取不到则默认为空*/
	public function getWechaId(){
		$wecha_id = $this->_request('wecha_id', 'trim', '');
		if($wecha_id != "") {$_SESSION["wecha_id"]=$wecha_id;}
		if($wecha_id == "" && $_SESSION["wecha_id"] != "") {$wecha_id = $_SESSION["wecha_id"];}
		return $wecha_id;
	}
	
	public function getTokenTall(){
		$tokenTall = $this->_request('tokenTall', 'trim', '');
		if($tokenTall == "" && $_SESSION["tokenTall"] != "") {$tokenTall = $_SESSION["tokenTall"];}
		if($tokenTall == "" && $_SESSION["token"] != "") {$tokenTall = $_SESSION["token"];}
		if($tokenTall != "") {$_SESSION["tokenTall"]=$tokenTall;}
		 
		return $tokenTall;
	}
}
?>