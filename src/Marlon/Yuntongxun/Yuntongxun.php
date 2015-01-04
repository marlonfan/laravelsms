<?php namespace Marlon\Yuntongxun;
use Illuminate\Support\Facades\Config;
class Yuntongxun
{

    static function sendAc($to, $datas, $tempId)
    {
        $accountSid = Config::get('Yuntongxun::config.accountSid');

        //主帐号Token
        $accountToken = Config::get('Yuntongxun::config.accountToken');

        //应用Id
        $appId =Config::get('Yuntongxun::config.appId');

        //请求地址，格式如下，不需要写https://
        $serverIP = Config::get('Yuntongxun::config.serverIP');

        //请求端口 
        $serverPort = '8883';

        //REST版本号
        $softVersion = '2013-12-26';

        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);
        
        // 发送模板短信
        echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            echo "result error!";
            break;
        }
        if($result->statusCode!=0) {
            echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";
             //TODO 添加错误处理逻辑
        }else{
            echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            $smsmessage = $result->TemplateSMS;
            echo "dateCreated:".$smsmessage->dateCreated."<br/>";
            echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            //TODO 添加成功处理逻辑
        }
    }
    
    static function send($data, $str, $num)
    {
        self::sendAc($data, $str, $num);
    }

}