@extends('master-pages.app')

@section('content')
	<div class="row">
		@if(count($data['categories']) == 0)
			<div class="alert alert-warning" role="alert">É necessário cadastro de categorias antes de prosseguir!</div>
		@endif
		<div class="col-xs-8 col-sm-4 col-md-2" >
			{!! Form::open(array('action' => 'Products\ProductsController@store', 'class' => 'form'))  !!}
			  	<div class="form-group">
				    <label for="InputNomeCategoria">Nome do Produto</label>
				    <input type="text" name="nome_do_produto" class="form-control" id="InputNomeCategoria" placeholder="Nome do Produto">
			  	</div>
			  	@if($errors->has("nome_do_produto"))
           			<div class="alert alert-danger" role="alert">{{$errors->first('nome_do_produto')}}</div>
        		@endif
			  	<div class="form-group">
				    <label for="InputCategoriaProduto">Categoria do Produto</label>
				    <select name="categoria"  class="form-control">
				    	@if($data['categories'])
				    		<option value="">-- Selecione --</option>
				    		@foreach($data['categories'] as $category)
				    			<option value="{{$category->category_id}}">{{$category->name}}</option>
				    		@endforeach
				    	@endif
				    </select>
			  	</div>
			  	@if($errors->has("categoria"))
           			<div class="alert alert-danger" role="alert">{{$errors->first('categoria')}}</div>
        		@endif
			  	<div class="form-group">
				    <label for="InputPreco">Preço</label>
				    <input type="text" name="preco" class="form-control money" id="InputPreco" placeholder="10,10" maxlength="8">
			  	</div>
			  	@if($errors->has("preco"))
           			<div class="alert alert-danger" role="alert">{{$errors->first('preco')}}</div>
        		@endif
			  	<button type="submit" class="btn btn-default">Criar</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop