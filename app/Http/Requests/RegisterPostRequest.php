<?php

namespace ZarbTest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
{
    protected $_rules;

    public function __construct(){
        $this->_rules = [
            'nome_completo'   => 'required|max:80',
            'email'           => 'required|email',
            'senha'           => 'required',
            'senha_novamente' => 'required|same:senha'
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->_rules;
    }
}
