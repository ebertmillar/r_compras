@extends('dash-layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

@section('buscador')
	@include('search.search-buy')
@endsection

@section('container-fluid')
<div class="container h-75">
	<div class="table-responsive-sm ">
	  <table class="table">
	    <thead class="bg-primary text-white">
	    	<tr>
	    		<th>id</th>
	    		<th>producto</th>
	    		<th>precio</th>
	    		<th>Supermercado</th>
	    		<th>Detalle</th>
	    		<th>Unidades</th>
	    		<th></th>
	    		<th></th>
	    	</tr>
	    </thead>
	    <tbody class="bg-white">
	    	@foreach($products as $product)
	    	<tr>
	    		<td>{{$product->id}}</td>
	    		<td>{{$product->producto}}</td>
	    		<td>{{number_format($product->precio,2)}}</td>
	    		<td>{{$product->market->supermarket}}</td>
	    		<!-- <td>{{$product->market->supermarket}}</td> -->  
	    		<td><a href="{{route('productos.show',$product->id)}}" class="btn btn-outline-success">Ver</a></td>
	    		<form action="{{ route('in_shopping_carts.store') }}" method="POST" class="add-to-cart">
					@csrf
				<td><input type="number" class="form-control text-center p-0 m-0" style="width:50px;" name="quantity" value="1">
				<input type="hidden" name="producto_id" value="{{$product->id}}"></td>
				<td><input type="submit" class="btn btn-primary" value="Add"></td>
				
				</form>
	    		<td>
  	    							
				</td>
	    	</tr>
	    	@endforeach
	    </tbody>
	  </table>
	</div>
</div>

<script>
    $("input[type='number']").inputSpinner()
</script>

@endsection


