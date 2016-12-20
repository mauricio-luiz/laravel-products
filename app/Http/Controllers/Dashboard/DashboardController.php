<?php

namespace ZarbTest\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use ZarbTest\Http\Controllers\Controller;

use ZarbTest\Repositories\ProductRepository;

class DashboardController extends Controller
{
	private $__product_repository;

	private static $__title = 'Dashboard';

    private static $__paginate = 10;

    public function __construct(ProductRepository $product_repository){
    	$this->__product_repository = $product_repository;
    }

    public function index(){

        $products = $this->__product_repository->paginate(SELF::$__paginate);

    	$data = [
            'title'    => SELF::$__title,
            'products' => $products
    	];

    	return view('dashboard.index', ['data' => $data]);
    }
}
