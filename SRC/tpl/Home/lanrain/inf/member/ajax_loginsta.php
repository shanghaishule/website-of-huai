<?php
/**
 * @version        $Id: ajax_loginsta.php 1 8:38 2010��7��9��Z tianya $
 * @package        DedeCMS.Member
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/config.php");
AjaxHead();
if($myurl == '') exit('');

$uid  = $cfg_ml->M_LoginID;

!$cfg_ml->fields['face'] && $face = ($cfg_ml->fields['sex'] == 'Ů')? 'dfgirl' : 'dfboy';
$facepic = empty($face)? $cfg_ml->fields['face'] : '/member/templets/images/'.$face.'.png';
?>

            <div class="btn-group">
                <a title="Ͷ��" class="contribute" href="<?php echo $cfg_memberurl; ?>/article_add.php">Ͷ��</a>
            </div>
            <div class="btn-group">
                <span class="lgn-user-face"><img width="24px" border="0" height="24px" src="<?php echo $facepic;?>"></span>
                <a title="�ҵ���ҳ" class="username" target="_blank" href="<?php echo $cfg_memberurl; ?>/index.php?uid=<?php echo $uid;?>"><?php echo $cfg_ml->M_UserName; ?></a>
            </div>
            <div class="btn-group">
                <a title="�ҵ��ղ�" href="<?php echo $cfg_memberurl; ?>/mystow.php"><i class="icon-star-empty"></i></a>
            </div>
            <div class="btn-group">
                <a title="�ҵ���Ϣ" data-toggle="dropdown" class="dropdown-toggle num" href=""><i class="icon-envelope"></i>       <?php
       $pms = $dsql->GetOne("SELECT COUNT(*) AS nums FROM #@__member_pms WHERE toid='{$cfg_ml->M_ID}' AND `hasview`=0 AND folder = 'inbox'");
		if($pms['nums'] > 0)
		{
			echo "<sup>{$pms['nums']}</sup>";
		}
		elseif($pms['nums']==0)
		{
			echo "";
		}
       ?></a>
                <ul aria-labelledby="dLabel" role="menu" class="dropdown-menu num-dropdown">
                    <li><a href="<?php echo $cfg_memberurl; ?>/pm.php">�ҵ�˽��</a></li>
                                        <li><a href="<?php echo $cfg_memberurl; ?>/guestbook_admin.php">�ҵ�����</a></li>
                                    </ul>
            </div>
            <div class="btn-group">
                <a title="�ҵ�����" data-toggle="dropdown" class="dropdown-toggle num" href="javascript:void(0);"><i class="icon-cog"></i></a>
                <ul aria-labelledby="dLabel" role="menu" class="dropdown-menu num-dropdown">
                    <li><a href="<?php echo $cfg_memberurl; ?>/index.php?uid=<?php echo $uid;?>">�ҵĿռ�</a></li>
                    <li><a href="<?php echo $cfg_memberurl; ?>/index.php?uid=<?php echo $uid;?>&action=archives">�ҵ�����</a></li>
                    <li><a href="<?php echo $cfg_memberurl; ?>/edit_fullinfo.php">�ҵ�����</a></li>
                    <li><a href="<?php echo $cfg_memberurl; ?>/index_do.php?fmdo=login&dopost=exit">ע����¼</a> </li>
                </ul>
            </div>
            
            <div class="btn-group">
                <a title="RSS" href="/rss.php"><i class="icon-rss"></i></a>
            </div>
<!-- /userinfo -->