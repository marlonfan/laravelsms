# laravelsms
==========

####一个依赖于云通讯的laravel短信扩展包

## 使用方法
* 在composer中引入"marlon/yuntongxun": "dev-master"
* 在laravel的``app/config/app.php``中添加以下内容
 1. providers数组中添加``'Marlon\Yuntongxun\YuntongxunServiceProvider'``
 2. aliases数组中添加``'Sms' 				=> 'Marlon\Yuntongxun\Yuntongxun'``
* 根据情况执行``composer install``命令或者``composer update``命令

## 示例代码
```php
<?php
Sms::send($mobile, $info, $id)
//$mobile 为发送的手机号,为字符串,多个手机号用逗号分隔
//$info 为发送的验证码以及有效时间,为数组
//$id 为要发送的模板id
```


**后续会添加错误返回处理功能**

##END
