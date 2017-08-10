<?php
namespace admin\controller;
use admin\controller\BaseController;
use admin\model\UserModel;
class UserController extends BaseController
{
	protected $user;
	protected $shan;
	protected $gai;
	public function _init()
	{
		$this->user = new UserModel();
		$this->shan = new UserModel();
		$this->gai = new UserModel();
	}
	public function user()
	{
		$data = $this->user->user();
		$this->assign('data',$data);
		$this->display();
	}
	public function shanchu()
	{
		$id = $_POST['id'];
		$del = $this->shan->shan($id);
		if($del){
			echo  json_encode(['shanchu'=>1]);
		} else {
			echo  json_encode(['shanchu'=>0]);
		}
	}
	public function gai()
	{
		$uid = $_GET['cid'];
		$data = $this->gai->gai($uid);
		//var_dump($data);
		$allowlogin = $data[0]['allowlogin'];
		if($allowlogin == 0){
			$allowlogin = 1;
			$_SESSION['allowlogin'] = $allowlogin;
			if($this->gai->gai1($allowlogin,$uid)){
				$this->success('用户被锁定');
			}
		} else {
			$allowlogin =0;
			$_SESSION['allowlogin'] = $allowlogin;
			if($this->gai->gai1($allowlogin,$uid)){
				$this->success('用户已解锁');
			}
		}
	}
}