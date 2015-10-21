<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015/10/21
 * Time: 21:33
 */
include "wx_sample.php";
echo "Hell World";
file_put_contents("log.txt", "accessed",FILE_APPEND);
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
file_put_contents("log.txt", "accessed",FILE_APPEND);
?>