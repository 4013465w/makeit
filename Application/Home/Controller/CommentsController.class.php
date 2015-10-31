<?php
namespace Home\Controller;
use Think\Controller;
class CommentsController extends Controller {
    public function add_comments(){
        $Comments = M('Comments');
  	if(check_login(I('user_id'),I('login'))){
  		if ($Comments->where(I('get.'))->find()) {
  			$this->ajaxReturn('不允许重复评论');
  		}
  		$Comments->create(I('get.'));
  		$ans = $Comments->add();
		$this->ajaxReturn($ans);
	}else{
		$this->ajaxReturn(0);
	}
    }
    public function get_comments_by_id(){
          $Comments = M('Comments');
  	if(check_login(I('user_id'),I('login'))){
  		$map=I('notepad_id');
  		$page = I('page') *C('PAGE_NUM');
		$ans=$Comments->page($page,C('PAGE_NUM'))->select();
		$this->ajaxReturn($ans);
	}else{
		$this->ajaxReturn(0);
	}
    }
}