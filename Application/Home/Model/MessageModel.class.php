<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model {
	//数据验证
 	protected $_validate = array(
		//array('lable_name','','标签已经存在！',0,'unique',1),
		//array('lable_name','30','标签名要小于30哦!！',1,'length',3),
		//array('lable_pwd','0,15','口令长度在0-15之间哦！',1,'length',3),
	);
  	protected $_auto = array ( 
       		//  array('notepad_time','time',3,'function'), // 对notepad_time字段在更新的时候写入当前时间戳
       		 // array('lable_pwd','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
     	);
}