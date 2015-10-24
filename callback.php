<?php
//http://www.jb51.net/callback.php
$appid = "wx47180ba69fa68387";
$secret = "QOqy71o3DC0IcC-l4MayHt13AFhABoPTIcKt23vbJydL2D-1nMyMcPQhF74XAS9VK3kh2NYIVNP1cxsPZ0K_HrNev41SRNjZ5Bq-TNwN9JM";
$code = $_GET["code"];
$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$get_token_url);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$res = curl_exec($ch);
curl_close($ch);
$json_obj = json_decode($res,true);
//根据openid和access_token查询用户信息 
$access_token = $json_obj['access_token'];
$openid = $json_obj['openid'];
$get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$get_user_info_url);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$res = curl_exec($ch);
curl_close($ch);

//解析json 
$user_obj = json_decode($res,true);
$_SESSION['user'] = $user_obj;
print_r($user_obj);
?>