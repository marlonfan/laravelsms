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

        $status = [
            'to' => $to
        ];
        
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            $status['status'] = '未知错误';
        }
        if($result->statusCode!=0) {
            $status['status'] = $result->statusCode;
        }else{
            $smsmessage = $result->TemplateSMS;
            $status['status'] = 'success';
        }

        return $status;
    }
    
    static function send($data, $str, $num)
    {
        return self::sendAc($data, $str, $num);
    }

}