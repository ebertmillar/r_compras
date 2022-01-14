<form action="{{ route('in_shopping_carts.destroy',$product->id) }}" method="POST">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger" type="submit" id="eliminar"> 
		<i class="fas fa-thumbs-up mr-1"></i>Borrar
	</button>
</form>