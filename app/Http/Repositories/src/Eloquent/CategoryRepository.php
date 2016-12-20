<?php namespace ZarbTest\Repositories;

use ZarbTest\Repositories\Contracts\RepositoryInterface;
use ZarbTest\Repositories\Eloquent\Repository;
use ZarbTest\Models\Categories;
use DB;

class CategoryRepository extends Repository{

	protected $model;

	function model(){
		return "ZarbTest\Models\Categories";
	}

}