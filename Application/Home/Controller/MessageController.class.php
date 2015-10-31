<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller {
    public function add_message(){
	$Message=D('Message');
	$lable_id = (int)get_lable_id(I('lable_name'));
	$map=I('get.');
	$map['lable_id']=$lable_id;
	if(check_login(I('user_id'),I('login'))){
		if ($Message->create($map,1)) {
			$data = $Message->add();
			$this->ajaxReturn($data);
			//echo time();
		}else{
			exit($Message->getError());
		}
	}else{
		$this->ajaxReturn(0);
	}       
    }
    public  function alter_message(){
    	if(check_login(I('user_id'),I('login'))){
		$lable_id = (int)get_lable_id(I('lable_name'));
		$map=I('get.');
		$map['lable_id']=$lable_id;
		$check['notepad_id']=$map['notepad_id'];
		$check['user_id']=$map['user_id'];
		//var_dump($check);
		$Message=M('Message');
		$back =$Message->where($check)->save($map);
		$this->ajaxReturn($back);
	}else{
		$this->ajaxReturn(0);
	}
    }
    public function del_message(){
     	if(check_login(I('user_id'),I('login'))){
		$map=I('get.');
		$check['notepad_id']=$map['notepad_id'];
		$check['user_id']=$map['user_id'];
		$Message=M('Message');
		$back =$Message->where($check)->delete();
		$this->ajaxReturn($back);
	}else{
		$this->ajaxReturn(0);
	}   	
    }
    public function get_message_list(){
       	if(check_login(I('user_id'),I('login'))){
		$Model = new \Think\Model() ;
		$time=time();
		if (I('state')) {
			$time='>='.$time;
		}else{
			$time='<='.$time;
		}
		$page = I('page') *C('PAGE_NUM');
		$sql="SELECT u.user_nickname,l.lable_name,m.notepad_id,m.user_id,m.notepad_time,m.notepad_endtime,m.notepad FROM `user_lable` `o`,`lable` `l` ,`message` `m`,`user` `u` WHERE o.lable_id=l.lable_id and m.lable_id=o.lable_id and o.user_id=u.user_id and  o.user_id = ".I('user_id').' and m.notepad_endtime'.$time.'  order by m.notepad_endtime limit '.$page.',20';
		//echo $sql;
		$sql1="SELECT count(*)/".C('PAGE_NUM')." a  FROM `order` `o`,`lable` `l` ,`message` `m`,`user` `u` WHERE o.lable_id=l.lable_id and m.lable_id=o.lable_id and o.user_id=u.user_id and o.user_id = ".I('user_id').' and m.notepad_endtime'.$time.'  order by m.notepad_endtime ';
		$ans=$Model->query($sql);
		$ans['page']=$Model->query($sql1);
		$this->ajaxReturn($ans);
	}else{
		$this->ajaxReturn(0);
	}   
    }
}