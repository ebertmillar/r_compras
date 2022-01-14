@extends('dash-layouts.app')

@section('buscador')
    @include('search.search-admin')
@endsection

@section('container-fluid')

<div class="container h-75 mb-4">
    <div class="row h-100">
        <div class="col-sm-4 p-0">
            <img src="https://www.pricing.cl/wp-content/uploads/2019/03/tipos-productos-1303.jpg" class="w-100 h-100" alt="Responsive image">     
        </div>
        <div class="col bg-white">
            <span class="text-center">
                <h4 class="mt-5 pb-2"><strong>Registro de Producto</strong></h4>
            </span>
            <div class="p-4">
                <form method="POST" action="{{route('productos.update', $product->id)}}">
                	@csrf
                    @method('PUT')
                    
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <div class="form-group">
                                <span>Supermercado:</span>
                            </div>
                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name ="supermercado">
                            <!-- <option value ="" disabled>Seleccione Supermercado</option> -->
                            @foreach($markets as $market)
                            <option value="{{$market->id}}" selected>{{$market->supermarket}}</option>
                            @endforeach
                          </select>
                          <div class="mb-3"> 
                            @if($errors->has('supermercado'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('supermercado') }}
                                </small>
                            @endif 
                          </div>        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProducto">Nombre del producto</label>
                        <input type="text" name="producto" class="form-control" id="exampleInputProduct" aria-describedby="productoHelp" value="{{old('producto', $product->producto)}}">

                        
                            @if ($errors->has('producto'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('producto') }}
                                </small>
                            @endif   
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" value="{{old('descripcion' ,$product->descripcion)}}">

                        @if ($errors->has('descripcion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('descripcion') }}
                            </small>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        <input type="text" name="precio" class="form-control" id="exampleInputPassword1" value="{{old('precio',$product->precio)}}">

                        @if ($errors->has('precio'))
                            <small class="form-text text-danger">
                                {{ $errors->first('precio') }}
                            </small>
                        @endif

                    </div>
                    <div class="d-flex justify-content-center mt-5 pt-1"> 
                        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection