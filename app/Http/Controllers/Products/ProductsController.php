<?php

namespace ZarbTest\Http\Controllers\Products;

use Illuminate\Http\Request;
use ZarbTest\Http\Controllers\Controller;

use ZarbTest\Repositories\CategoryRepository;
use ZarbTest\Repositories\ProductRepository;

use ZarbTest\Http\Requests\ProductPostRequest;
use DB;

class ProductsController extends Controller
{
    private static $__title_index    = 'Produtos';

	private static $__title_create   = 'Novo Produto';

	private static $__title_edit     = 'Editar Produto';

	private static $__success 		= 'Ação concluída com sucesso';

	private static $__error          = 'Ocorreu um erro ao salvar!';

	private static $__paginate       = 10;

	private $__category_repository;

	private $__product_repository;

    public function __construct(CategoryRepository $category_repository, ProductRepository $product_repository){
		$this->__category_repository = $category_repository;
		$this->__product_repository  = $product_repository;
    }

    public function create(){

    	$categories = $this->__category_repository->all();

    	$data = [
			'title'      => SELF::$__title_create,
			'categories' => $categories
    	];

    	return view('products.create', ['data' => $data]);
    }

    public function store(ProductPostRequest $request){

    	$data = [
			'category_id' => $request->input('categoria'),
			'name'        => $request->input('nome_do_produto'),
			'price'       => $request->input('preco')
    	];

    	try{
    		$this->__product_repository->create($data);
    		return redirect()->route('dashboard')->with('success', SELF::$__success);
    	}catch(\Exception $e){
    		DB::rollBack();
            return redirect()->back()->with('error', SELF::$__error);
    	}
    }

    public function edit($product_id){

    	if(!$product_id)
    		return response('Bad Request', 400);

    	$product = $this->__product_repository->find($product_id);

    	if(!$product)
    		abort(404);

    	$categories = $this->__category_repository->all();

    	$data = [
			'title'      => SELF::$__title_edit,
			'product'    => $product,
			'categories' => $categories
    	];

    	return view('products.edit', ['data' => $data]);
    }

    public function update(ProductPostRequest $request){

    	try{
    		$product = $this->__product_repository->find($request->input('product'));

			$product->name        = $request->input('nome_do_produto');
			$product->category_id = $request->input('categoria');
			$product->price       = $request->input('preco');

    		$product->update();

    		return redirect()->route('dashboard')->with('success', SELF::$__success);
    	}catch(\Exception $e){
    	 	DB::rollBack();
            return redirect()->back()->with('error', SELF::$__error);
    	}
    }

    public function destroy($product_id){
    	if(!$product_id)
    		return response('Bad Request', 400);

    	try{
    		$product = $this->__product_repository->delete($product_id);
    		return redirect()->route('dashboard')->with('success', SELF::$__success);
    	}catch(\Exception $e){
    		DB::rollBack();
    		return redirect()->back()->with('error', SELF::$__error);
    	}
    }
}
