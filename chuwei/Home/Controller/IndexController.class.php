<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
		$m=M("banner");
		$b=$m->select();
		$this->assign('info',$b);
        $this->display();
    }
	//用户留言
	public function message_info(){
		$name=$_POST['name'];
		$tel=$_POST['tel'];
		$email=$_POST['email'];
		$message_bt=$_POST['message_bt'];
		$message=$_POST['message'];
		
		$data['name']=$name;
		$data['tel']=$tel;
		$data['email']=$email;
		$data['message_bt']=$message_bt;
		$data['message']=$message;
		
		$m=M("message");
		$ly=$m->add($data);
		echo"<script>alert('留言成功！');location.href='contact.html';</script>";
	}
}