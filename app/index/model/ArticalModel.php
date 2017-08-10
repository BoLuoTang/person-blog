<?php
namespace index\model;
use csl\framework\Model;
use csl\framework\Page;
class ArticalModel extends Model
{
	public function articall()
	{
		//var_dump($_GET);
		$page = new Page($this->articalcount(),2);
		$limit = $page-> limit();
		//var_dump($limit);
		if(empty($_GET['cid'])){
			return $this->field('id,title,content,addtime')->limit("$limit")->where("type = 0")->order('addtime desc')->select();
		} else {
			$id = $_GET['cid'];
			//var_dump($this->field('id,title,content,addtime')->limit("$limit")->order('addtime desc')->where(["classid='$id'","type = 0"])->select());
			return $this->field('id,title,content,addtime')->limit("$limit")->order('addtime desc')->where(["classid='$id'","type = 0"])->select();
		}
	}
	public function articalcount()
	{
		//var_dump($_GET);
		if(empty($_GET['cid'])){
			return count($this->field('id,title,content,addtime')->where("type = 0")->select());
		} else {
			$id = $_GET['cid'];
			//var_dump($id);
			//var_dump(count($this->field('id,title,content,addtime')->where(["classid='$id'","type = 0"])->select()));
			return count($this->field('id,title,content,addtime')->where("type = 0")->where(["classid='$id'","type = 0"])->select());
		}
	}
	public function page1()
	{
		$page = new Page($this->articalcount(),2);
		return $page->allPage();
	}
	public function totalpage()
	{
		$page = $this->articalcount();
		//var_dump($page);
		//var_dump(ceil($page/2));
		return ceil($page/2);
	}
	public function fatie($title,$content,$classid,$addtime){
		return $this->insert(['title' => $title,'content'=>$content,'classid'=>$classid,'addtime'=>$addtime]);
	}

	public function yuantie()
	{
		$id = $_GET['id'];
		return $this->field('id,title,content')->where("id = $id")->select();
	}
	public function huitie($content,$tid,$type,$addtime,$title)
	{
		//var_dump($type);
		//var_dump($tid);
		$classid = $this->where("id = $tid")->select();
		$classid = $classid[0]['classid'];
		//var_dump($classid);
		return $this->insert(['content' => $content,'tid' => $tid,'type'=> $type ,'addtime' => $addtime,'classid'=>$classid,'title'=>$title]);
	}
	public function huifuzhanshi($id)
	{
		//$id = $_GET['id'];
		//var_dump($id);
		//var_dump($this->field('id,content,addtime')->where("tid = $id")->select());
		return $this->field('id,content,addtime')->where("tid = $id")->select();
		//return $this->field('id,content,addtime')->where("id = $id")->select();
	}
}