@extends('master-pages.app')

@section('content')
	<div class="row">
		@if(Session::has("success"))
           	<div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
        @endif
        @if(Session::has("not_found"))
           	<div class="alert alert-danger" role="alert">{{Session::get('not_found')}}</div>
        @endif

		<div class="col-md-12" >
			<a class="btn btn-primary" href="{{URL::route('product_create')}}">Novo Produto</a>
			<a class="btn btn-primary" href="{{URL::route('report_generate')}}">Gerar relatorio</a>
		</div>

	</div>
	<div class="row top10">
		<div class="col-md-12" >
			@if(isset($data['products']) && $data['products']->count() > 0)
				<table class="table table-bordered table-hover">
					<thead>
						<th>ID</th>
						<th>Categoria</th>
						<th>Produto</th>
						<th>Preço</th>
						<th>Editar</th>
						<th>Excluir</th>
						<th>Criado em</th>
					</thead>
					<tbody>
						@foreach($data['products'] as $product)
							<tr>
								<td>{{isset($product->product_id) ? $product->product_id : ''}}</td>
								<td>{{isset($product->categories->name) ? $product->categories->name : ''}}</td>
								<td>{{isset($product->name) ? $product->name : ''}}</td>
								<td>{{isset($product->price) ? $product->price : ''}}</td>
								<td align="center" ><a href="{!! URL::route('product_edit', [$product->product_id]) !!}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
								<td align="center" ><a href="{!! URL::route('product_destroy', [$product->product_id]) !!}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
								<td>{{isset($product->created_at) ? $product->created_at : ''}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				@if(isset($data['products']) && $data['products'] && method_exists($data['products'], 'render') )
					<div class="pagination col-md-10" >
			           	{!! $data['products']->render() !!}
				        <div class="place-right" >
				            Mostrando {!! $data['products']->currentPage() !!} de {!! $data['products']->lastPage() !!}
				        </div>
			       </div>
		       @endif
			@else
				<div class="alert alert-warning" role="alert">Não há produtos cadastradas.</div>
			@endif
		</div>
	</div>
@stop