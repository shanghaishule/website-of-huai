<?php
define("DE_ItemEcode",'Shop_De_');//ʶ���ﳵCookieǰ׺,�ǿ�����Ա�벻Ҫ�������!
/**
 * ���ﳵ��
 *
 * @version        $Id: shopcar.class.php 2 20:58 2010��7��7��Z tianya $
 * @package        DedeCMS.Libraries
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
 // ------------------------------------------------------------------------
 /**
 * ��Ա���ﳵ��
 *
 * @package          MemberShops
 * @subpackage       DedeCMS.Libraries
 * @link             http://www.dedecms.com
 */
class MemberShops
{
    var $OrdersId;
    var $productsId;

    function __construct()
    {
        $this->OrdersId = $this->getCookie("OrdersId");
        if(empty($this->OrdersId))
        {
            $this->OrdersId = $this->MakeOrders();
        }
    }

    function MemberShops()
    {
        $this->__construct();
    }

    /**
     *  ����һ��ר�ж������
     *
     * @return    string
     */
    function MakeOrders()
    {
        $this->OrdersId = 'S-P'.time().'RN'.mt_rand(100,999);
        $this->deCrypt($this->saveCookie("OrdersId",$this->OrdersId));
        return $this->OrdersId;
    }

    /**
     *  ����һ����Ʒ��ż���Ϣ
     *
     * @param     string  $id  ���ﳵID
     * @param     string  $value  ֵ
     * @return    void
     */
    function addItem($id, $value)
    {
        $this->productsId = DE_ItemEcode.$id;
        $this->saveCookie($this->productsId,$value);
    }

    /**
     *  ɾȥһ������ŵ���Ʒ
     *
     * @param     string  $id  ���ﳵID
     * @return    void
     */
    function delItem($id)
    {
        $this->productsId = DE_ItemEcode.$id;
        setcookie($this->productsId, "", time()-3600000,"/");
    }

    /**
     *  ��չ��ﳵ��Ʒ
     *
     * @return    string
     */
    function clearItem()
    {
        foreach($_COOKIE as $key => $vals)
        {
            if(preg_match('/'.DE_ItemEcode.'/', $key))
            {
                setcookie($key, "", time()-3600000,"/");
            }
        }
        return 1;
    }

    /**
     *  �õ�������¼
     *
     * @return    array
     */
    function getItems()
    {
        $Products = array();
        foreach($_COOKIE as $key => $vals)
        {
            if(preg_match("#".DE_ItemEcode."#", $key) && preg_match("#[^_0-9a-z]#", $key))
            {
                parse_str($this->deCrypt($vals), $arrays);
                $values = @array_values($arrays);
                if(!empty($values))
                {
                    $arrays['price'] = sprintf("%01.2f", $arrays['price']);
                    if($arrays['buynum'] < 1)
                    {
                        $arrays['buynum'] = 0;
                    }
                    $Products[$key] = $arrays;
                }
            }
        }
        unset($key,$vals,$values,$arrays);
        return $Products;
    }

    /**
     *  �õ�ָ����Ʒ��Ϣ
     *
     * @param     string  $id  ���ﳵID
     * @return    array
     */
    function getOneItem($id)
    {
        $key = DE_ItemEcode.$id;
        if(!isset($_COOKIE[$key]) && empty($_COOKIE[$key]))
        {
            return '';
        }
        $itemValue = $_COOKIE[$key];
        parse_str($this->deCrypt($itemValue), $Products);
        unset($key,$itemValue);
        return $Products;
    }

    /**
     *  ��ù��ﳵ�е���Ʒ��
     *
     * @return    int
     */
    function cartCount()
    {
        $Products = $this->getItems();
        $itemsCount = count($Products);
        $i = 0;
        if($itemsCount > 0)
        {
            foreach($Products as $val)
            {
                $i = $i+$val['buynum'];
            }
        }
        unset($Products,$val,$itemsCount);
        return $i;
    }

    /**
     *  ��ù��ﳵ�е��ܽ��
     *
     * @return    string
     */
    function priceCount()
    {
        $price = 0.00;
        foreach($_COOKIE as $key => $vals)
        {
            if(preg_match("/".DE_ItemEcode."/", $key))
            {
                $Products = $this->getOneItem(str_replace(DE_ItemEcode,"",$key));
                if($Products['buynum'] > 0 && $Products['price'] > 0)
                {
                    $price = $price + ($Products['price']*$Products['buynum']);
                }
            }
        }
        unset($key,$vals,$Products);
        return sprintf("%01.2f", $price);
    }

    //���ܽӿ��ַ�
    function enCrypt($txt)
    {
        srand((double)microtime() * 1000000);
        $encrypt_key = md5(rand(0, 32000));
        $ctr = 0;
        $tmp = '';
        for($i = 0; $i < strlen($txt); $i++)
        {
            $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
            $tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
        }
        return base64_encode($this->setKey($tmp));
    }

    //���ܽӿ��ַ���
    function deCrypt($txt)
    {
        $txt = $this->setKey(base64_decode($txt));
        $tmp = '';
        for ($i = 0; $i < strlen($txt); $i++)
        {
            $tmp .= $txt[$i] ^ $txt[++$i];
        }
        return $tmp;
    }

    //������������
    function setKey($txt)
    {
        global $cfg_cookie_encode;
        $encrypt_key = md5(strtolower($cfg_cookie_encode));
        $ctr = 0;
        $tmp = '';
        for($i = 0; $i < strlen($txt); $i++)
        {
            $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
            $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
        }
        return $tmp;
    }

    //���л�����
    function enCode($array)
    {
        $arrayenc = array();
        foreach($array as $key => $val)
        {
            $arrayenc[] = $key.'='.urlencode($val);
        }
        return implode('&', $arrayenc);
    }

    //�������ܵ�_cookie
    function saveCookie($key,$value)
    {
        if(is_array($value))
        {
            $value = $this->enCrypt($this->enCode($value));
        }
        else
        {
            $value = $this->enCrypt($value);
        }
        setcookie($key,$value,time()+36000,'/');
    }

    //��ý��ܵ�_cookie
    function getCookie($key)
    {
        if(isset($_COOKIE[$key]) && !empty($_COOKIE[$key]))
        {
            return $this->deCrypt($_COOKIE[$key]);
        }
    }
}