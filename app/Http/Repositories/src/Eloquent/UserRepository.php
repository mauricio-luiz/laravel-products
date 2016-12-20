<?php namespace ZarbTest\Repositories;

use ZarbTest\Repositories\Contracts\RepositoryInterface;
use ZarbTest\Repositories\Eloquent\Repository;
use ZarbTest\User;
use DB;

class UserRepository extends Repository{

	protected $model;

	function model(){
		return "ZarbTest\User";
	}

}