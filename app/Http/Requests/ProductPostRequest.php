<?php

namespace ZarbTest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostRequest extends FormRequest
{
    private $__rules;

    public function __construct(){
        $this->__rules = [
            'categoria'       => 'required',
            'nome_do_produto' => 'required|max:80',
            'preco'           => 'required'
        ];
    }

    public function authorize(){
        return true;
    }

    public function rules()
    {
        return $this->__rules;
    }
}
