<?php
namespace index\controller;
use index\controller\BaseController;
use index\model\UserModel;
use csl\framework\VerifyCode;

class UserController extends BaseController
{
	protected $user;
	public function _init()
	{
		$this->user = new UserModel();
	}
	public function register()
	{
		$this->display();
	}
	public function doRegister()
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		//var_dump($_POST);
		if(empty($username)){
			$this->error('用户名不能为空');
			die;
		}
		if(strlen($username)<4 || strlen($username)>10){
			$this->error('用户名长度在4-10之间,请重新输入');
			die;
		}
		if($this->user->usernameRepeat($username)){
			$this->error('用户名重复,请重新输入');
			die;
		}
		$patten = '/^1[34578]\d{9}/';
		if (empty(preg_match($patten,$phone,$match))) {
			$this->error('电话号码不正确,请重新输入');
			die;
		}
		if(empty($password) || empty($password1)){
			$this->error('密码不能为空,请重新输入');
			die;
		}
		if(strcmp($password,$password1)){
			$this->error('两次输入的密码不一致,请重新输入');
			die;
		}
		$patten = '/^\d+$/';
		if(preg_match($patten,$password)){
			$this->error('密码不能全部是数字');
			die;
		}
		$patten = '/^(\w+)@(\w+\.)+(com|cn|net|org|edu)/';
		if(empty(preg_match($patten,$email,$match))){
			$this->error('邮箱错误，请重新输入');
			die;
		}
		if($username == 'admin'){

			$type = 1;
		} else{
			$type = 0;
		}
		//var_dump($username,$email);
		$password = MD5($_POST['password']);

		//var_dump($this->user->zhuceyonghu($username,$email,$phone,$password,$type));
		if($this->user->zhuceyonghu($username,$email,$phone,$password,$type))
		{
			//echo 1007;
			$this->success('注册成功','index.php');
		}
	}
	public function login()
	{
		$this->display();
	}
	public function yzm()
	{
		$vc = new VerifyCode();
		$vc ->outputImage();
		$_SESSION['code'] = $vc->getCode();
	}
	public function doLogin()
	{
		/*if($_SESSION['allowlogin'] == 1){
			$this->error('该用户被锁定,请自行解决','index.php');
			die;
		}*/
		$username = $_POST['account'];
		$password = $_POST['password'];
		$code = $_POST['code'];
		$data = $this->user->checkLogin($username,$password)[0];
		if($data['allowlogin'] == 1){
			$this->error('该用户被锁定,请自行解决','index.php');
			die;
		}
		if($data && count($data)>0){
			if($code == $_SESSION['code']){
				unset($_SESSION['code']);
				$_SESSION['username'] = $username;
				$_SESSION['type'] = $data['type'];
				$this->success('登陆成功','index.php?m=index&c=index&a=index');
			} else {
				$this->error('验证码不正确');
			}
		} else {
			$this->error('登陆失败');
		}
	}
	public function logout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['type']);
		$this->success('退出成功','index.php');
	}
}