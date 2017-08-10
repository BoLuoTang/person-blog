<?php
namespace admin\model;
use csl\framework\Model;
class UserModel extends Model
{
	public function user()
	{
		//var_dump($this->field('uid,username,password,type,phone,email')->select());
		return $this->field('uid,username,password,type,phone,email,allowlogin')->select();
	}
	public function shan($id)
	{
		//var_dump($this->where("uid=$id")->delete());

		return $this->where("uid=$id")->delete();
	}
	public function gai($uid)
	{
		return $this->where("uid=$uid")->select();
	}
	public function gai1($allowlogin,$uid)
	{
		//var_dump($allowlogin,$uid);
		//var_dump($this->where("uid = $uid")->update(['type' => $type]));
		return $this->where("uid = $uid")->update(['allowlogin' => $allowlogin]);

	}
}