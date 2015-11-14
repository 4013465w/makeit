<?php
namespace Home\Controller;
use Think\Controller;
/**
* 用户类
*/
class UserController extends Controller
{
	 
	/*
	*新增用户
	*/
	public function create_user(){
		 $User = D("User");
		 $data['user_nickname'] = I('get.user_nickname');
		$data['user_mail'] = I('get.user_mail');
		$data['user_pwd']= I('get.user_pwd');
		if(!$User->create($data,1)){
			exit($User->getError());
		}else{
			$datas = $User->add();
			if($datas){
				$login=md5(time().$data['user_mail'] );//标记登陆状态
				$map['user_id']=$datas;
				$User->where($map)->setField('login',$login);
				$back['user_id']=$datas;
				$back['login']=$login;
				$this->ajaxReturn($back);
			}else{
				$this->ajaxReturn($datas);
			}
		}
	}
	/*
	*登陆
	*/
	public function login(){
		$User=M('User');
		//echo I('get.user_mail') ;
		$login=md5(time().I('get.user_mail') );//标记登陆状态
		$User->login=$login;
		$map['user_mail']=I("get.user_mail");
		$map['user_pwd']=md5(I('get.user_pwd'));
		$User->create();
		$data = $User->where($map)->save();
		$data1 = $User->where($map)->find();
		if($data){
			$back['user_id']=$data1['user_id'];
			$back['login']=$login;
			$this->ajaxReturn($back);
		}else{
			$this->ajaxReturn(0);
		}
	}
	/*
	*获取用户信息
	*/
	public function get_user_info_by_mail($user_mail){
		$User = D("User"); // 实例化User对象
		$map['user_mail']=$user_mail;
		$data=$User->where($map)->select(); 
		$this->ajaxReturn($data);
	}
	/*修改用户密码*/
	public function updata_pwd($user_mail,$user_pwd,$user_new_pwd){
		 $User = D("User");	
		 $map['user_pwd']=md5($user_pwd);
		$map['user_mail']=$user_mail;
		 $data=$User->where($map)->setField('user_pwd',$user_new_pwd);
		 $this->ajaxReturn($data);

	}
	/*更新用户信息*/
	public function updata_user_info(){
		$User=M('User');
		$map['user_mail']=I('get.user_mail');
		$map['login']=I('get.login');
		$User->user_nickname=I('get.user_nickname');
		$User->create();
		$data = $User->where($map)->save();
		$this->ajaxReturn($data);
	}
	/**
	*发送找回密码验证码
	**/
	public function get_retrieve_password(){
		$User=M('User');
		 $map['user_mail']=$_GET['user_mail'].'.com';//必须在后面加一个.com
		 $data = $User->field('user_id,user_pwd')->where($map)->find();
		
		if(!$data){
			$this->ajaxReturn(0);
			exit();
		}
		
		$to = $map['user_mail'];
		$subject = "找回密码";
		$yz=rand(100000,1000000);//随机数生成
		$url='/retrieve_password/'.$data['user_id'].'/'.$yz;//构造生产地址
		 $message = "点击链接修改密码（有效期30分钟）: ".U($url) ;
		//session(array('name'=>'rp'.$data['user_id'],'expire'=>1));
		 session('rp'.$data['user_id'],$yz);
		$data = SendMail($to,$subject ,$message);
		$this->ajaxReturn($data);
	}
	/*
	*验证修改密码权限
	*/
	public function modify_password(){
		 $user_id='rp'.I('get.user_id');
		if(I('get.auth_code') == session($user_id)){
			$this->ajaxReturn(1);
		}else{
			$this->ajaxReturn(0);
		}
	}
	public function retrieve_password(){
		$User=M('User');
		 $user_id=I('get.user_id');
		if(I('get.auth_code') == session('rp'.$user_id)){
			$User->user_id=$user_id;
			$User->user_pwd=md5(I('new_pwd'));
			$back = $User->where('user_id='.$user_id)->save();
			if ($back) {
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}

		}else{
			$this->ajaxReturn(0);
		}
	}
/**session过期时间大概为30分钟***/
}
?>