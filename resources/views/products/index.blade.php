@extends('dash-layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

@section('buscador')
	@include('search.search-admin')
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
	    		<th>editar</th>
	    		<th>eliminar</th>
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
                    
	    		<td><a href="{{route('productos.edit',$product->id)}}" class="btn btn-outline-primary">editar</a></td>
	    		<td><a href="#" class="btn btn-outline-danger">eliminar</a></td>
	    	</tr>
	    	@endforeach
	    </tbody>
	  </table>
	</div>
</div>


@endsection