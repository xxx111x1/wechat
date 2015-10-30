<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015/10/24
 * Time: 22:41
 */
if(isset($_GET['msg']))
{
    $acc_token = refresh_access_token();
    $msg = urldecode($_GET['msg']);
    sendmsg('omiagw6HuwXD95DmvmpY27rs1y1c',$msg,$acc_token);
    sendmsg('omiagwzBMqBnpGLL5o6qAhUNOZlg',$msg,$acc_token);
}

function refresh_access_token()
{
    $APPID="wx47180ba69fa68387";
    $APPSECRET="978a3e249a1980827fed107003227cdd";
    $TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;
    $json=file_get_contents($TOKEN_URL);
    //$json=$this->http_get($TOKEN_URL);
    $result=json_decode($json);
    return $result->access_token;
}

function sendmsg($touser,$content, $acc_token){
    $data = '{
            "touser":"'.$touser.'",
            "msgtype":"text",
            "text":
            {
                 "content":"'.$content.'"
            }
        }';

    $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$acc_token;

    $result = https_post($url,$data);

    $final = json_decode($result);
    return $final;
}

function sendweixinmsg($touser,$content){

    //更换成自己的APPID和APPSECRET
    $APPID="wx47180ba69fa68387";
    $APPSECRET="QOqy71o3DC0IcC-l4MayHt13AFhABoPTIcKt23vbJydL2D-1nMyMcPQhF74XAS9VK3kh2NYIVNP1cxsPZ0K_HrNev41SRNjZ5Bq-TNwN9JM";

    $TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

    $json=file_get_contents($TOKEN_URL);
    $result=json_decode($json);

    $ACC_TOKEN=$result->access_token;

    $data = '{
        "touser":"'.$touser.'",
        "msgtype":"text",
        "text":
        {
             "content":"'.$content.'"
        }
    }';

    $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$ACC_TOKEN;

    $result = https_post($url,$data);
    $final = json_decode($result);
    return $final;
}

function https_post($url,$data)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if (curl_errno($curl)) {
        return 'Errno'.curl_error($curl);
    }
    curl_close($curl);
    return $result;
}

?>
