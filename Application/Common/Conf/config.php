<?php
return array(
	//debug
	'SHOW_PAGE_TRACE'=>true, //开启页面Trace
	// 开启路由
	'URL_ROUTER_ON'   => true, 
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'zuo', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE,// 数据库调试模式 开启后可以记录SQL日志
	//邮件设置
	// 配置邮件发送服务器
    	'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称
   	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
   	'MAIL_USERNAME' =>'503241187@qq.com',//你的邮箱名
  	'MAIL_FROM' =>'503241187@qq.com',//发件人地址
  	'MAIL_FROMNAME'=>'做吧',//发件人姓名
 	'MAIL_PASSWORD' =>'',//邮箱密码
	'MAIL_CHARSET' =>'utf-8',//设置邮件编码
 	 'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

);