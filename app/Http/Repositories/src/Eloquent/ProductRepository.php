<?php namespace ZarbTest\Repositories;

use ZarbTest\Repositories\Contracts\RepositoryInterface;
use ZarbTest\Repositories\Eloquent\Repository;
use ZarbTest\Models\Products;
use DB;

class ProductRepository extends Repository{

	protected $model;

	function model(){
		return "ZarbTest\Models\Products";
	}

}