<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015/10/21
 * Time: 21:33
 */
include "wx_sample.php";
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}
?>