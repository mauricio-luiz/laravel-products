<?php

namespace ZarbTest\Http\Controllers\Reports;

use Illuminate\Http\Request;
use ZarbTest\Http\Controllers\Controller;

use ZarbTest\Repositories\ProductRepository;
use PDF;

class ReportsController extends Controller
{
    private $__product_repository;

    private static $__not_found = 'Não há produtos cadastrados';

    public function __construct(ProductRepository $product_repository){
		$this->__product_repository  = $product_repository;
    }

    public function generate(){

    	$products = $this->__product_repository->all();

    	if(count($products) == 0){
    		return redirect()->back()->with('not_found', SELF::$__not_found);
    	}

    	$pdf = PDF::loadView('reports.index', ['data' => $products]);
		return $pdf->download('produtos.pdf');
    }
}
