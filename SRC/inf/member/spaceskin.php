<?php
/**
 * �ռ�Ƥ��
 * 
 * @version        $Id: spaceskin.php 1 8:38 2010��7��9��Z tianya $
 * @package        DedeCMS.Member
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/config.php");
CheckRank(0,0);
$menutype = 'config';
if($cfg_mb_lit=='Y')
{
    ShowMsg("����ϵͳ�����˾�����Ա�ռ䣬����ʵĹ��ܲ����ã�","-1");
    exit();
}
if(empty($dopost)) $dopost = '';


if($dopost=="use")
{
    AjaxHead();
    $t = preg_replace("#[^a-z0-9-]#i", "", $t);
    $dsql->ExecuteNoneQuery("UPDATE `#@__member_space` SET spacestyle='$t' WHERE mid='".$cfg_ml->M_ID."';");
    ShowMsg('�ɹ����¿ռ���ʽ��', 'spaceskin.php');
}
//Ĭ�Ͻ���
else
{
    $userrow = $dsql->GetOne("SELECT spacestyle FROM `#@__member_space` WHERE mid='".$cfg_ml->M_ID."' ");
    require_once(dirname(__FILE__)."/templets/spaceskin.htm");
    exit();
}

/**
 *  �����ʽ�Ƿ�ʹ��
 *
 * @access    public
 * @param     string  $type  ��ʽ����
 * @return    string
 */
function checkuse($type)
{
    global $cfg_ml, $userrow;
    if($userrow['spacestyle'] == $type)
    {
        return '<a href="#"><font color=red>ʹ����...</font></a>';
    }
    else
    {
        return '<a href="spaceskin.php?t='.$type.'&dopost=use" title="ʹ�ô˷��">ʹ��</a>';
    }
}

/**
 *  ��ȡԤ��Сͼ
 *
 * @access    public
 * @param     string  $dir  Ŀ¼
 * @param     string  $dirname  Ŀ¼����
 * @return    string
 */
function showdemopic($dir, $dirname)
{
    if (file_exists("$dir/$dirname/demo.png")) {
        $demopic = "$dir/$dirname/demo.png";
    } else if (file_exists("$dir/$dirname/demo.jpg")) {
        $demopic = "$dir/$dirname/demo.jpg";
    } else if (file_exists("$dir/$dirname/demo.jpeg")) {
        $demopic = "$dir/$dirname/demo.jpeg";
    } else if (file_exists("$dir/$dirname/demo.gif")) {
        $demopic = "$dir/$dirname/demo.gif";
    }
    return $demopic;
}

/**
 *  �г����Ŀ¼
 *
 * @access    public
 * @param     string
 * @return    string
 */
function ListSkin()
{
    global $cfg_ml;
    $dir = 'space';
    $allskins = array();
    //��ȡ�ļ���
    if(file_exists($dir.'/skinlist.inc'))
    {
        $ds = file($dir.'/skinlist.inc');
        foreach($ds as $d)
        {
            $d = trim($d);
            if(empty($d) || substr($d, 0, 2)=='//') continue;
            if(!is_dir($dir.'/'.$d)) continue;
            $dirs[] = $d;
        }
    }
    else
    {
        $fp = opendir($dir);
        while ($sysname = readdir($fp))
        {
            $dirs[] = $sysname;
        }
        closedir($dh);
    }
    //���ģ��ժҪ��Ϣ
    foreach($dirs as $sysname)
    {
            if ($sysname=='.' || $sysname=='..' || $sysname=='CVS'
             || !file_exists("$dir/$sysname/info.txt"))
            {
                continue;
            }
            $demopic = showdemopic($dir, $sysname);
            $date = MyDate('Y-m-d', filemtime("$dir/$sysname"));
            $listdb = array(
                'sign' => $sysname,
                'demo' => $demopic,
                'name' => '',
                'author' => 'Unkown',
                'date' => ''
            );
            $infodatas = file("$dir/$sysname/info.txt");
            foreach($infodatas as $d)
            {
                $d = trim($d);
                if(empty($d)) continue;
                $ds = explode(':', $d);
                $listdb[trim($ds[0])] = trim($ds[1]);
            }
            if($listdb['type'] != 'default' && $listdb['type'] != $cfg_ml->M_MbType)
            {
                continue;
            }
            $allskins[] = $listdb;
    }
    //���ģ���б�
    $num = 0;
    print '<tr class="head" height="25"><td colspan="2">&nbsp; &nbsp;<b></b></td></tr>';
    foreach ($allskins as $value)
    {
        if($num==0) { print '<tr height="20">'; }
        $num++;
        print '<td class="b"><img src="'.$value['demo'].'" width="150" height="150" border="0" /><br />';
        print '������ƣ�'.$value['name']."({$value['sign']})".'<br />';
        print '������ߣ�'.$value['author'].'<br />';
        //print '����ʱ�䣺'.$value['date'].'<br />';
        print '������'.checkuse($value['sign']).'';
        if($num==4)
        {
            $num=0;
            print '</tr>';
        }
    }
    if($num != 0)
    {
        for($i=$num; $num < 4; $num++)
        {
            print' <td class="b">&nbsp;</td>';
        }
        print '</tr>';
    }
    print '</td>';
}