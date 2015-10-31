<?php
namespace Home\Controller;
use Think\Controller;
class LableController extends Controller {
    public function index(){
        $this->show('kong','utf-8');
    }
    	public function add_lable($value='')
	{
		$Lable=D('Lable');
		if(check_login(I('user_id'),I('login'))){
			if ($Lable->create(I('get.'),1)) {
				$data = $Lable->add();
				$this->ajaxReturn($data);
			}else{
				exit($Lable->getError());
			}
		}else{
			$this->ajaxReturn(0);
		}

	}
	public function del_lable(){
		$Lable=M('Lable');
		if(check_login(I('user_id'),I('login'))){
			$map['user_id']=I('user_id');
			$map['lable_name']=I('lable_name');
			$data = $Lable->where($map)->delete();
			$this->ajaxReturn($data);

		}else{
			$this->ajaxReturn(0);
		}

	}
	public function change_lable_pwd(){
		$Lable=M('Lable');
		if(check_login(I('user_id'),I('login'))){
			$map['user_id']=I('user_id');
			$map['lable_name']=I('lable_name');
			$pwd['lable_pwd']=I('new_pwd');
			$data = $Lable->where($map)->save($pwd);
			$this->ajaxReturn($data);

		}else{
			$this->ajaxReturn(0);
		}

	}
	public function get_all_lable_by_id(){
		$Lable=M('Lable');
		if(check_login(I('user_id'),I('login'))){
			$map['user_id']=I('user_id');
			//var_dump($map);
			$data = $Lable->where($map)->select();//应该分页展示
			$this->ajaxReturn($data);

		}else{
			$this->ajaxReturn(0);
		}		
	}
}