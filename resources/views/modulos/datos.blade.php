@extends('plantilla')

@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mis datos</h1>
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
        				
                <form method="post" novalidate="">
                  @csrf

                  @method('put')

                  <h2>Nombre:</h2>
                  <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                  @error('name')
                    <p class="alert alert-danger">Debe colocar un usuario</p>
                  @enderror

                  <h2>Email:</h2>
                  <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                  @error('email')
                    <p class="alert alert-danger">El email y existe</p>
                  @enderror
                  
                  <h2>Cambiar clave:</h2>
                  <input type="password" class="form-control" name="password" value="">
                  @error('password')
                    <p class="alert alert-danger">La contraseña debe ser mayor a 5 caracteres</p>
                  @enderror
                  
                  <br>
                  <button type="submit" class="btn btn-success">Guardar</button>

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