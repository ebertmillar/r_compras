<form action="{{ route('cart.store') }}" method="POST" class="inline-block submit-prevent-form">
	@csrf
	<button type="submit" class="text-center btn btn-primary text-white pl-3 pr-3 submit-prevent-button"> 
	<i class="pl-2 spinner fas fa-spinner fa-spin" style="display:none;"></i> Registra tu compra </button>
</div>
</form>
