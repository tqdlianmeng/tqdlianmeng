<?php
return array(
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'test', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DEFAULT_CONTROLLER' => 'News', // 默认控制器名称
	'DEFAULT_ACTION' => 'index', // 默认操作名称

	'THINK_EMAIL' => array(
    'SMTP_HOST' => 'smtp.qiye.163.com', //SMTP服务器
    'SMTP_PORT' => '25', //SMTP服务器端口
    'SMTP_USER' => 'itf@itfchina.com', //SMTP服务器用户名
    'SMTP_PASS' => 'Itfchina2016', //SMTP服务器密码
    'FROM_EMAIL' => 'itf@itfchina.com', //发件人EMAIL
    'FROM_NAME' => 'itfchina', //发件人名称
    'REPLY_EMAIL' => 'itf@itfchina.com', //回复EMAIL（留空则为发件人EMAIL）
    'REPLY_NAME' => 'itfchina', //回复名称（留空则为发件人名称）

	), 
);