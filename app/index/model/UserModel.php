<?php

namespace index\model;
use csl\framework\Model;


class Usermodel extends Model
{
	public function usernameRepeat($username)
	{
		$data = $this->where("username = '$username'")->select();
		return !empty($data[0]);
	}
	public function zhuceyonghu($username,$email,$phone,$password,$type)
	{
		//echo $phone;
		return $this->insert(['username' => $username,'password'=>$password,'type'=>$type,'phone'=>$phone,'email'=>$email]);
	}
	public function checkLogin($username,$password)
	{
		$password = md5($password);
		return $this->where("username = '$username' and password = '$password'")->field('uid,type,username,allowlogin')->limit('1')->select();
	}
}

