<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	//数据验证
	protected $_validate = array(
		array('user_id','number','非法数据'),
	 	array('user_mail','email','请输入正确的邮箱地址！'),
		array('user_mail','','邮箱已经存在！',0,'unique',1),
		array('user_nickname','require','请输入用户名'),
		array('user_pwd','6,15','密码长度在6-15之间哦！',1,'length',3),
		//array('user_new_pwd','6,15','密码长度在6-15之间哦5！',2,'length',2),
	);
	//自动完成
	  protected $_auto = array ( 
       		  array('user_pwd','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
       		   array('user_new_pwd','md5',3,'function') ,
    	 );
}
?>