<?php
return array(
	//路由配置
	'PAGE_NUM'=>20,
	'URL_ROUTE_RULES'=>array(
		/*用户类*/
		'User/create_user/:user_nickname/:user_mail/:user_pwd'=>'User/create_user',
   		 'User/updata_user_info/:user_mail/:login/:user_nickname'=> 'User/updata_user_info',//更新用户信息
   		 'User/login/:user_mail/:user_pwd'=>'User/login',//登陆
   		 'User/retrieve_password/:user_id/:auth_code/:new_pwd'=>'User/retrieve_password',//找回密码(修改)
   		 'User/modify_password/:user_id/:auth_code'=>'User/modify_password',//找回密码(修改)
   		 'User/get_retrieve_password/:user_mail'=>'User/get_retrieve_password',//获取找回密码验证码
   		 /**文章类*/
   		 'Message/add_message/:user_id/:login/:lable_name/:notepad_endtime/:notepad'=>'Message/add_message',
   		 'Message/alter_message/:user_id/:login/:notepad_id/:lable_name/:notepad_endtime/:notepad'=>'Message/alter_message',
   		  'Message/del_message/:user_id/:login/:notepad_id'=>'Message/del_message',
   		  'Message/get_message_list/:user_id/:login/:page/:state'=>'Message/get_message_list',
   		 /*标签*/
   		 'Lable/add_lable/:user_id/:login/:lable_name/:lable_pwd'=>'Lable/add_lable',
   		 'Lable/del_lable/:user_id/:login/:lable_name'=>'Lable/del_lable',
   		 'Lable/change_lable_pwd/:user_id/:login/:lable_name/:new_pwd'=>'Lable/change_lable_pwd',
   		 'Lable/get_all_lable_by_id/:user_id/:login'=>'Lable/get_all_lable_by_id',
   		 /**订阅*/
   		 'Order/order_lable/:user_id/:login/:lable_name/:lable_pwd'=>'Order/order_lable',
   		  'Order/del_order/:user_id/:login/:lable_name'=>'Order/del_order',
   		  'Order/get_all_lable_by_userid/:user_id/:login'=>'Order/get_all_lable_by_userid',
   		  /*评论*/
   		  'Comments/add_comments/:user_id/:login/:notepad_id/:comment'=>'Comments/add_comments',
   		  'Comments/get_comments_by_id/:user_id/:login/:notepad_id/:page'=>'Comments/get_comments_by_id',


	),
	
);