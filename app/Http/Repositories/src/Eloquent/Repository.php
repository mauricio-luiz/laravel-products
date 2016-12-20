<?php namespace ZarbTest\Repositories\Eloquent;

use ZarbTest\Repositories\Contracts\RepositoryInterface;
use ZarbTest\Repositories\Exceptions\RepositoryExceptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Request;

abstract class Repository implements RepositoryInterface{

	private $app;

	protected $model;

	public function __construct(App $app){
		$this->app = $app;
		$this->makeModel();
	}

	abstract function model();

	public function all($columns = array('*')){
		return $this->model->get($columns);
	}

	public function paginate($per_page = 10, $columns = array('*')){
		return $this->model->paginate($per_page, $columns);
	}

	public function create(array $data){
		return $this->model->create($data);
	}

	public function update(array $data, $id, $attribute = 'id'){
		return $this->model->where($attribute, "=", $id)->update($data);
	}

	public function delete($id){
		return $this->model->destroy($id);
	}

	public function find($id, $columns = array('*')){
		return $this->model->find($id, $columns);
	}

	public function findBy($attribute, $value, $columns = array('*')){
		return $this->model->where($attribute, '=', $value)->first($columns);
	}

	public function firstOrCreate(array $data){
        return $this->model->firstOrCreate($data);
    }

    public function firstOrNew(array $data){
        return $this->model->firstOrNew($data);
    }

    public function getMultipleRowsParams($attribute, $value, $order_value = 'created_at', $order = 'DESC', $columns = array('*')){
    	return $this->model->where($attribute, '=', $value)->orderBy($order_value, $order)->get($columns);
    }

    public function deleteMultiples($ids = array()){
		$primary_key = $this->model['primaryKey'];
		return $this->model->whereIn($primary_key, $ids)->delete();
	}

	public function makeModel(){

		$model = $this->app->make($this->model());

		if(!$model instanceof Model){
			throw new RepositoryExceptions("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
		}

		return $this->model = $model;
	}
}
