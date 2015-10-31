<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
	/*订阅标签*/
    public function order_lable(){
    	$Order=M('Order');
   	if(check_login(I('user_id'),I('login'))){
		$lable_id = get_lable_id(I('lable_name'));
		if ($lable_id) {
			$map['user_id']=I('user_id');
			$map['lable_id']=$lable_id;
			$data=$Order->where($map)->find();
			if ($data) {
				$this->ajaxReturn('您已经订阅了标签了哦!');
			}else{
				if ($Order->create($map,1)) {
					$result = $Order->add();
					$this->ajaxReturn($result);
				}else{
					exit($Lable->getError());	
				}
			}
		}else{
			$this->ajaxReturn(0);
		}


	}else{
		$this->ajaxReturn(0);
	}
    }
    /*取消订阅标签*/
    function del_order(){
    	if(check_login(I('user_id'),I('login'))){
		 $id=get_lable_id(I('get.lable_name'));
		$Order=M('Order');
		$map['user_id']=I('user_id');
		$map['lable_id']=$id;
		$ans=$Order->where($map)->delete();
		$this->ajaxReturn($ans);
	}else{
		$this->ajaxReturn(0);
	}
    }
    /*请阅的所有标签*/
    function get_all_lable_by_userid(){
 	if(check_login(I('user_id'),I('login'))){
		$Order=M('Order');
		$Model = new \Think\Model() ;
		//$map['l.lable_id']='o.lable_id';
		//$map['o.user_id']=I('user_id');
		$ans=$Model->query("SELECT * FROM `order` `o`,`lable` `l` WHERE o.lable_id=l.lable_id and o.user_id = ".I('user_id'));
		//$Model->table(array('order'=>'o','lable'=>'l'))->where($map)->select();
		//var_dump($ans);
		$this->ajaxReturn($ans);
	}else{
		$this->ajaxReturn(0);
	}
    }
}