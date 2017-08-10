<?php
namespace index\controller;
use index\controller\BaseController;
use index\model\ArticalModel;
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
class ArticalController extends BaseController
{
	protected $fatie;
	protected $huitie;
	protected $huifuzhanshi;
	public function _init()
	{
		//$this->page();
		$this->fatie = new ArticalModel();
		$this->huitie = new ArticalModel();
		$this->huifuzhanshi = new ArticalModel();
		//$this->reply();
		//$this->huifuzhanshi();
	}
	public function send()
	{
		$this->display();
	}
	public function doSend()
	{
		$title = $_POST['title'];
		$content = htmlspecialchars($_POST["test-editormd-markdown-doc"]);
		$classid = $_POST['name'];
		if(empty($title)||empty($content)){
			$this->error('标题或者内容不能为空');
		}
		$addtime = time();
		if($this->fatie->fatie($title,$content,$classid,$addtime))
		{
			$this->success('发表成功','index.php?m=index&c=index&a=index');
		}
	}
	public function reply()
	{
		$result = $this->fatie->yuantie();
		//var_dump($result);
		if(!empty($result)){
			$this->assign('result',$result);
		}
		$id = $_GET['id'];
		$res = $this->fatie->huifuzhanshi($id);
		if(!empty($res)){
			$this->assign('res',$res);
		}
		$this->display();
	}
	public function doReply()
	{
		$type = 1;
		$title = '';
		$tid = $_GET['tid'];
		//var_dump($tid);
		$content = $_POST['content'];
		$addtime = time();
		//var_dump($_POST);
		if($this->huitie->huitie($content,$tid,$type,$addtime,$title)){
		$this->success('回复成功');
		}
	}
}