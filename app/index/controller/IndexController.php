<?php
namespace index\controller;
use index\controller\BaseController;
use index\model\ArticalModel;
use index\model\CategoryModel;
class IndexController extends BaseController
{
	protected $artical;
	protected $category;
	public function _init()
	{
		//$this->page();
		$this->artical = new ArticalModel();
		$this->category = new CategoryModel();
		//$this->index();
	}
	public function index()
	{

		//var_dump($_GET['cid']);
		$data = $this->artical->articall();
		//var_dump($data);
		$dat = $this->category->category();
		//var_dump($dat);
		$count = $this->artical->articalcount();
		$page = $this->artical->page1();
		//var_dump($page);
		$totalpage = $this->artical->totalpage();
		//var_dump($totalpage);
		$this->assign('data',$data);
		$this->assign('dat',$dat);
		$this->assign('count',$count);
		$this->assign('page',$page);
		$this->assign('totalpage',$totalpage);
		$this->display();
	}
}