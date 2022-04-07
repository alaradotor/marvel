@extends('plantilla')

@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar sucursal: {{$sucursales->nombre}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">

        	<div class="col-12">
        		
        		<div class="card">

        			<div class="card-body">
              <form method="post" action=" {{route('actualizar-sucursal',['sucursales'=>$sucursales->id])}}">
                  @csrf
                  @method('put')

                  <h3>Nombre:</h3>
                  <input type="text" name="nombre" class="form-control  @error('nombre')is-invalid
                  @enderror" value="{{$sucursales->nombre}}">
                  @error('nombre')
                    <br>
                    <p class="alert alert-danger">Ingrese el nombre de la sucursal</p>
                  @enderror

                  <h3>Dirección:</h3>
                  <textarea name="direccion" class="form-control @error('direccion')is-invalid
                  @enderror">{{$sucursales->direccion}}</textarea>
                  
                  @error('direccion')
                    <br>
                    <p class="alert alert-danger">Ingrese la dirección de la sucursal</p>
                  @enderror

                  <h3>Observaciones:</h3>
                  <textarea name="observaciones" class="form-control">{{$sucursales->observaciones}}</textarea>
                  <br>

                  <button type="submit" class="btn btn-success btn-lg">Guardar</button>

                </form>
        			</div>
        			
        		</div>

        	</div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection