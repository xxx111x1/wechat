<?php
if(isset($_SESSION['user'])){
    print_r($_SESSION['user']);
    exit;
}
$APPID='wx47180ba69fa68387';
$REDIRECT_URI='http://www.usays.ca/wechat/callback.php';
$scope='snsapi_base';
//$scope='snsapi_userinfo';//ÐèÒªÊÚÈ¨
$url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$APPID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$scope.'&state='.$state.'#wechat_redirect';
header("Location:".$url);
?>

