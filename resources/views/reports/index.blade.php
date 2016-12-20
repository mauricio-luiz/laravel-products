<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Produtos</title>
</head>
<body>

<div>
	<h1>Produtos</h1>
</div>
<div>
	<div>
		<ul>
			@foreach($data as $product)
				<li>
					{{isset($product->name) ? $product->name : ''}} -
					R$ {{isset($product->price) ? $product->price : ''}} reais
				</li>
			@endforeach
		</ul>
	</div>
		
</div>

</body>
</html>
