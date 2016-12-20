@extends('master-pages.app')

@section('content')
	<div class="row">
		@if($errors->has("nome_da_categoria"))
           	<div class="alert alert-danger" role="alert">{{$errors->first('nome_da_categoria')}}</div>
        @endif
		<div class="col-xs-8 col-sm-4 col-md-2" >
			{!! Form::model($data, array('route' => ['category_update', $data['category']->category_id], 'role' => 'form', 'method' => 'PATCH')) !!}
			  	<div class="form-group">
				    <label for="InputNomeCategoria">Nome da Categoria</label>
				    <input type="text" name="nome_da_categoria" class="form-control" id="InputNomeCategoria" placeholder="Nome da Categoria" value="{{$data['category']->name ? $data['category']->name : 'null' }}">
			  	</div>
			  	<div>
			  		<input type="hidden" name="category" value="{{$data['category']->category_id}}" >
			  	</div>
			  	<button type="submit" class="btn btn-default">Salvar</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop