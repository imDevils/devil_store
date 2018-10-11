<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
	//管理员登录
	public function login(){
		
          $username=$_POST['username'];
		  $password=$_POST['password'];
		  $user=$_POST['username'];
		  $m=M("user");
		  $arr['username']=$username;
		  $arr['password']=$password;
		  $q=$m->where($arr)->select();
		  $adminid=$q[0]['id'];
		  session('adminid',$adminid);
		  if($username=="" && $password==""){
            
			echo"<script>alert('内容不能为空');location.href='index.html';</script>";  
		  }else if($username=$q[0]["username"] && $password=$q[0]["password"]){
			    session('username',$user);
				
				$data=array(
				  'logintime'=>strtotime(),
				  'loginip'=>get_client_ip()
				  );
				  $m->where("id=$adminid")->save($data);
			  if($q[0]["qx"]==1){
				  $l="信息录入员";
				  session('identity',$l);
			      $this->redirect('Index/home',array('l'=>$l));
			  }else if($q[0]["qx"]==2){
				  $l="一般管理员";
				  session('identity',$l);
				  $this->redirect('Index/home',array('l'=>$l));
			  }
			  else if($q[0]["qx"]==3){
				  $l="超级管理员";
				  session('identity',$l);
				  $this->redirect('Index/home',array('l'=>$l));
			  }
			  }
		    else{
			  echo"<script>alert('登录失败');location.href='index.html';</script>";
		  }
    }
	//注销
	public function loginout(){
          $_SESSION = array(); //清除SESSION值.
          if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
            setcookie(session_name(),'',time()-1,'/');
            }
            session_destroy();  //清除服务器的sesion文件
            $this->display('Index/index');
    }
	public function home(){
		$user = session('username');
		$this->assign('username',$user);
        $this->display();
		
    }
	//左
	public function left(){
		$user = session('username');
		$iden = session('identity');
		$this->assign('username',$user);
		$this->assign('identity',$iden);
        $this->display();
		
    }
	//后台首页
	public function main(){
		$m=M("user");
		$main=$m->count("id");
		$this->assign('info',$main);
		$user = session('username');
		$iden = session('identity');
		$adminid=session('adminid');
		if($adminid!=""){
		  $ipdate=$m->where("id=$adminid")->select();
		}
		$this->assign('ipdate',$ipdate);
		$this->assign('identity',$iden);
		$this->assign('username',$user);
		$this->display();
        
    }
	//个人信息
	public function personal(){
		$m=M("user");
		$adminid=session('adminid');
		if($adminid!=""){
		$personal=$m->where("id=$adminid")->select();
		}else{
			$this->error("请登录！");
		}
		$this->assign('personal',$personal);
		$this->display();
	}
	//个人信息修改
	public function persave(){
		  $qx=$_POST['level'];
		  $email=$_POST['email'];
		  $password=$_POST['password'];
		  $password1=$_POST['password1'];
		  $data=array(
		  		  'qx'=>$qx,
		  		  'email'=>$email,
				  'password'=>$password
				  );
		$m=M("user");
		$adminid=session('adminid');
		$persave=$m->where("id=$adminid")->save($data);
		$this->success("修改成功");
		
	}
	//添加管理员
	public function rer(){
          $username=$_POST['username'];
		  $email=$_POST['email'];
		  $password=$_POST['password'];
		  $password1=$_POST['password1'];
		  $val=$_POST['level'];
		  
		  $m=M("user");
		  $data['username']=$username;
		  $data['password']=$password;
		  $data['email']=$email;
		  $data['qx']=$val;
		  $q=$m->where(username)->select();
		  if($username=="" || $password=="" || $email=="" || $password1==""){
			$this->error("内容不能为空！");  
		  }else{
			if($password!=$password1){
				  echo"<script>alert('两次输入密码不一致');location.href='main_info.html';</script>";
			}else{
			    if($username==$q[0]["username"]){
				  echo"<script>alert('用户已存在');location.href='main_info.html';</script>";
			    }else{
			  $a=$m->add($data);
			  if($a){
				  $this->display(index);
			  }else{
				  $this->display("注册失败","main_info.html");
			        }
			     }
			}
		  }
    }
	//管理员列表
	public function main_list(){
		$m=M("user");
		$sql=$m->select();
		$this->assign('info',$sql);
		$this->display();
	}
	//删除管理员
	function delete(){
		$id=$_GET['id'];
		$m=M("user");
		$del=$m->where("id=$id")->delete();
		$this->redirect('index/main_list');
	}
	//编辑管理员权限
	function admin_save(){
		
		
	}
	//留言列表
	public function main_message(){
		$m=M("message");
		$count = $m->where(id)->count();// 查询满足要求的总记录数

		$Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数

		$show = $Page->show();// 分页显示输出

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

		$list = $m->where(id)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('info',$list);// 赋值数据集

		$this->assign('page',$show);// 赋值分页输出
		
		
		$this->display();
	}
	//留言详情
	public function message_info(){
		$id=$_GET['id'];
		$m=M("message");
		$sql=$m->where("id=$id")->select();
		$this->assign('info',$sql);
		$this->display();
	}
	//留言删除
	public function message_del(){
		$id=$_GET['id'];
		$m=M("message");
		$sql=$m->where("id=$id")->delete();
		$this->redirect('index/main_message');
	}
	//轮播图片
	public function banner_list(){
		$m=M("banner");
		$b=$m->select();
		$b_count=$m->count("id");
		$this->assign('info1',$b_count);
		$this->assign('info',$b);
		$this->display();
	}
	//轮播图片删除
	public function banner_delete(){
		$id=$_GET['id'];
		$m=M("banner");
		$b_del=$m->where("id=$id")->delete();
		$this->redirect('index/banner_list');
	}
}