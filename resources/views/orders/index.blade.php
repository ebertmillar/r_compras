@extends('dash-layouts.app')

@section('container-fluid')

<div class="container">
	<div class="card">
		<div class="card-header bg-primary text-white">
			<h2 class="m-0">Egresos</h2>
		</div>
		<div class="card-body">
			<h3>Estadisticas</h3>
			<div class="row mt-2 pt-2">
				<div class="col-xs-4 col-md-3 col-lg-4 d-block text-center"> 
					<span class="text-primary"><h2>{{$totalMonth}} EUR</h2></span>
					<p>Gastos del mes</p>
				</div> 
				<div class="border-left col-xs-4 col-md-3 col-lg-3 d-block text-center"> 
					<span class="text-primary"><h2>{{$totalMonthCount}}</h2></span>
					<p>Número de compras</p>
				</div>
			</div>
			<h3>Compras</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>ID. compra</td>
						<td>Comprador</td>
						<td>Total</td>
						<td>Fecha de compra</td>
						<td>Ver tu compra</td>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr>
						<td>{{$order->id}}</td>
						<td>{{$order->email}}</td>
						<td>{{$order->total}} €</td>
						</td>
						<td>{{$order->created_at->format("d-m-Y")}}</td>
						<td><a href="{{url('compras/'.$order->shopping_cart->customid)}}">Ver tu compra</a></td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection