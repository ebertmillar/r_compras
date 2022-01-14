@extends('dash-layouts.app')

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
	    		<th>Supermercado</th>
	    		<th>Editar</th>
	    		<th>Borrar</th>
	    	</tr>
	    </thead>
	    <tbody class="bg-white">
	    	@foreach($markets as $market)
	    	<tr>
	    		<td>{{$market->id}}</td>
	    		<td>{{$market->supermarket}}</td>
	    		<td><a href="{{route('supermercado.edit',$market->id)}}" class="btn btn-primary">editar</a></td>
	    		<td><a href="#" class="btn btn-danger">eliminar</a></td>
	    	</tr>
	    	@endforeach
	    </tbody>
	  </table>
	</div>
</div>


@endsection