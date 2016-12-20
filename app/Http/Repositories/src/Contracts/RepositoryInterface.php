<?php namespace ZarbTest\Repositories\Contracts;

interface RepositoryInterface {

	public function all($columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));

    public function firstOrCreate(array $data);

    public function firstOrNew(array $data);

    public function getMultipleRowsParams($attribute, $value, $order_value, $order, $columns = array('*'));

    public function deleteMultiples($ids = array('*'));
}
