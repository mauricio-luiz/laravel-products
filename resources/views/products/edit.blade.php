@extends('master-pages.app')

@section('content')
	<div class="row">
		<div class="col-xs-8 col-sm-4 col-md-2" >
			{!! Form::model($data, array('route' => ['product_update', $data['product']->product_id], 'role' => 'form', 'method' => 'PATCH')) !!}
			  	<div class="form-group">
				    <label for="InputNomeCategoria">Nome do Produto</label>
				    <input type="text" name="nome_do_produto" class="form-control" id="InputNomeCategoria" placeholder="Nome do Produto" value="{{$data['product']->name}}">
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
				    			<option value="{{$category->category_id}}" {{$category->category_id == $data['product']->category_id ? "selected=selected" : ''}}>{{$category->name}}</option>
				    		@endforeach
				    	@endif
				    </select>
			  	</div>
			  	@if($errors->has("categoria"))
           			<div class="alert alert-danger" role="alert">{{$errors->first('categoria')}}</div>
        		@endif
			  	<div class="form-group">
				    <label for="InputPreco">Preço</label>
				    <input type="text" name="preco" class="form-control money" id="InputPreco" placeholder="10,10" maxlength="8" value="{{$data['product']->price}}">
			  	</div>
			  	@if($errors->has("preco"))
           			<div class="alert alert-danger" role="alert">{{$errors->first('preco')}}</div>
        		@endif
        		<div>
			  		<input type="hidden" name="product" value="{{$data['product']->product_id}}" >
			  	</div>
			  	<button type="submit" class="btn btn-default">Salvar</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop