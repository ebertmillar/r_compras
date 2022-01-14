@extends('dash-layouts.app')


@section('container-fluid')

<div class="container h-75">
	<div class="row mt-5 h-75 d-flex justify-content-center align-items-center">
		<div class="card h-75 w-75" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title mt-2 p-3">Registrar Tienda</h5>
		    <form method="POST" action="{{route('supermercado.update',$market->id)}}">
		    	@csrf
		    	@method('PUT')
		    	<div class="form-group pl-3">
				    <label for="formGroupExampleInput">Nombre del Supermercado:</label>
				    <input type="text" class="form-control" id="formGroupExampleInput" name="supermercado" value="{{$market->supermarket}}">
			  	</div>
			  	<div class="row d-flex justify-content-center mt-4 pt-3">
				  	<button type="submit" class="btn btn-primary">Actualizar Tienda</button>
			  	</div>

		    </form>
		  </div>
		</div>
	</div>
</div>

@endsection