<?php
namespace index\model;
use csl\framework\Model;
class CategoryModel extends Model
{
	public function category()
	{
		return $this->field('cid,classname')->select();
	}
}