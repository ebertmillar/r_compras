@extends('dash-layouts.app')

@section('container-fluid')

<header class="p-3 mb-2 bg-primary text-center text-white">
    <h1>COMPRA COMPLETADA</h1>
</header>

<div class="container">
    <div class="card p-3">
        <h3>Tu compra fue registrada <span class="{{$order->status}}"></span></h3>
        <h5><p class="text-size-2">Detalles de tu compra</p></h5>


            <div class="row pt-2 pl-4">
                <div class="col">Usuario</div>
                <div class="col">{{$order->email}}</div>
            </div>
            <div class="row pt-2 pl-4">
                <div class="col">Fecha</div>
                <div class="col">{{$order->created_at->format("d-m-Y")}}</div>
            </div>
            <br> 
            <br> 
            <div class="row pt-2 pl-4">
                <div class="col">Productos </div>
                <div class="col">Monto</div>
            </div>
            <br>

            @foreach($products as $product)
                
            <div class="row pt-2 pl-4">
                <div class="col">{{$product->quantity}} {{$product->productsList->producto}}</div>
                <div class="col">{{number_format($product->quantity * $product->productsList->precio,2)}} €</div>
            </div>
            @endforeach
            <div class="row pt-2 pl-4">
                <div class="col"></div>
                <div class="col"><hr><strong> Total: <span class="ml-3">{{number_format($order->total,2)}} €</span></strong></div>
            </div>
            <br>
            <hr>   
            <div class="text-center">
                <a href="{{url('compras/'.$shopping_cart->customid)}}">Link permanente de tu compra</a>
            </div>
        </div>
    
    </div>
</div>

@endsection

