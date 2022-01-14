<form action="{{ route('in_shopping_carts.store') }}" method="POST" class="add-to-cart">
	@csrf

	<!-- Button trigger modal -->
	
	<input type="number" name="quantity" value="1">

	<input type="hidden" name="producto_id" value="{{$product->id}}">
	<input type="submit" class="btn btn-primary" value="Agregar al carrito">
	 
	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productQuantity">
	  Agregar al carrito
	</button> -->

	<!-- Modal -->
	<!-- <div class="modal fade" id="productQuantity" tabindex="-1" role="dialog" aria-labelledby="productQuantityTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Ingrese cantidad de productos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
		        <input class="form-control" type="
		        number" name="quantity" value="1" autofocus>      	

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" value="Agregar al carrito" class="btn btn-primary"></button>
	      </div>
	    </div>
	  </div>
	</div> -->
	
</form>