# laravelsms
==========

####一个依赖于云通讯的laravel短信扩展包

## 使用方法
* 在composer中引入"marlon/yuntongxun": "0.1.0"
* 在laravel的``app/config/app.php``中添加以下内容
 - providers数组中添加``'Marlon\Yuntongxun\YuntongxunServiceProvider'``
 - aliases数组中添加``'Sms' 				=> 'Marlon\Yuntongxun\Yuntongxun'``
* 根据情况执行``composer install``命令或者``composer update``命令
* 在laravel根目录执行``php artisan config:publish marlon/yuntongxun``
* 在``app/config/package/yuntongxun/config/config.php``设置你的云通讯相关信息
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
