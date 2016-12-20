<?php

namespace ZarbTest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPostRequest extends FormRequest
{
    private $__rules;

    public function __construct(){
        $this->__rules = [
            'nome_da_categoria' => 'required|unique:categories,name'
        ];
    }

    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->input('category')){
            $this->__rules['nome_da_categoria'] = 'required|unique:categories,name,' . $this->input('category') .',category_id';
        }
        return $this->__rules;
    }
}
