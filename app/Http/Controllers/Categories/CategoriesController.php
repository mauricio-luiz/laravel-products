<?php

namespace ZarbTest\Http\Controllers\Categories;

use Illuminate\Http\Request;
use ZarbTest\Http\Controllers\Controller;

use ZarbTest\Http\Requests\CategoryPostRequest;
use ZarbTest\Repositories\CategoryRepository;
use DB;

class CategoriesController extends Controller
{
	private static $__title_index    = 'Categorias';

	private static $__title_create   = 'Novas Categorias';

	private static $__title_edit     = 'Editar Categoria';

	private static $__success 		= 'Ação concluída com sucesso';

	private static $__error          = 'Ocorreu um erro ao salvar!';

	private static $__paginate       = 10;

	private $__category_repository;

    public function __construct(CategoryRepository $category_repository){
    	$this->__category_repository = $category_repository;
    }

    public function index(){

    	$categories = $this->__category_repository->paginate(SELF::$__paginate);

    	$data = [
			'title'      => SELF::$__title_index,
			'categories' => $categories
    	];

    	return view('categories.index', ['data' => $data]);
    }

    public function create(){

    	$data = [
    		'title' => SELF::$__title_create
    	];

    	return view('categories.create', ['data' => $data]);
    }

    public function store(CategoryPostRequest $request){

    	$data = [
    		'name' => $request->input('nome_da_categoria')
    	];

    	try{
    		$this->__category_repository->create($data);
    		return redirect()->route('categories')->with('success', SELF::$__success);
    	 }catch(\Exception $e){
    	 	DB::rollBack();
            return redirect()->back()->with('error', SELF::$__error);
    	 }
    }

    public function edit($category_id){

    	if(!$category_id)
    		return response('Bad Request', 400);

    	$category = $this->__category_repository->find($category_id);

    	if(!$category)
    		abort(404);

    	$data = [
			'title'    => SELF::$__title_edit,
			'category' => $category
    	];

    	return view('categories.edit', ['data' => $data]);
    }

    public function update(CategoryPostRequest $request){

    	try{
    		$category = $this->__category_repository->find($request->input('category'));
    		$category->name = $request->input('nome_da_categoria');

    		$category->update();

    		return redirect()->route('categories')->with('success', SELF::$__success);
    	}catch(\Exception $e){
    	 	DB::rollBack();
            return redirect()->back()->with('error', SELF::$__error);
    	}
    }

    public function destroy($category_id){
    	if(!$category_id)
    		return response('Bad Request', 400);

    	try{
    		$category = $this->__category_repository->delete($category_id);
    		return redirect()->route('categories')->with('success', SELF::$__success);
    	}catch(\Exception $e){
    		DB::rollBack();
    		return redirect()->back()->with('error', SELF::$__error);
    	}
    }
}
