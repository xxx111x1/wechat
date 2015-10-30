<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015/10/30
 * Time: 19:47
 */
if(isset($_GET['code']))
{
    $req_str = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx47180ba69fa68387&secret=978a3e249a1980827fed107003227cdd&code=".$_GET['code']."&grant_type=authorization_code";
    $json = file_get_contents($req_str);
    $result=json_decode($json);
    echo $result->openid;
    $detail_request = "https://api.weixin.qq.com/sns/userinfo?access_token=".$result->access_token."&openid=".$result->openid;
    file_put_contents("/var/www/html/wechat/userlog.txt",$detail_request);
}