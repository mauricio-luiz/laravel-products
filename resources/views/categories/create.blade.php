@extends('master-pages.app')

@section('content')
	<div class="row">
		@if($errors->has("nome_da_categoria"))
           	<div class="alert alert-danger" role="alert">{{$errors->first('nome_da_categoria')}}</div>
        @endif
		<div class="col-xs-8 col-sm-4 col-md-2" >
			{!! Form::open(array('action' => 'Categories\CategoriesController@store', 'class' => 'form'))  !!}
			  	<div class="form-group">
				    <label for="InputNomeCategoria">Nome da Categoria</label>
				    <input type="text" name="nome_da_categoria" class="form-control" id="InputNomeCategoria" placeholder="Nome da Categoria">
			  	</div>
			  	<button type="submit" class="btn btn-default">Criar</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop