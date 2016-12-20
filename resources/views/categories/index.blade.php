@extends('master-pages.app')

@section('content')
	<div class="row">
		@if(Session::has("success"))
           	<div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
        @endif
		<div class="col-md-2" >
			<a class="btn btn-primary" href="{{ URL::route('category_create') }}">Nova categoria</a>
		</div>
	</div>
	<div class="row top10">
		<div class="col-md-12" >
			@if(isset($data['categories']) && $data['categories']->count() > 0)
				<table class="table table-bordered table-hover">
					<thead>
						<th>ID</th>
						<th>Categoria</th>
						<th>Editar</th>
						<th>Excluir</th>
						<th>Criado em</th>
					</thead>
					<tbody>
						@foreach($data['categories'] as $category)
							<tr>
								<td>{{ $category->category_id ? $category->category_id : 'error' }}</td>
								<td>{{ $category->name ? $category->name : 'null' }}</td>
								<td align="center" ><a href="{!! URL::route('category_edit', [$category->category_id]) !!}" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
								<td align="center" ><a href="{!! URL::route('category_destroy', [$category->category_id]) !!}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
								<td>{{ $category->created_at ? $category->created_at : 'null' }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
                @if(isset($data['categories']) && $data['categories'] && method_exists($data['categories'], 'render') )
					<div class="pagination col-md-10" >
			           	{!! $data['categories']->render() !!}
				        <div class="place-right" >
				            Mostrando {!! $data['categories']->currentPage() !!} de {!! $data['categories']->lastPage() !!}
				        </div>
			       </div>
		       @endif
			@else
				<div class="alert alert-warning" role="alert">Não há categorias cadastradas.</div>
			@endif
		</div>
	</div>
@stop