@extends('plantilla')

@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestor de usuarios</h1>
            <a href="{{url('/crear-usuarios')}}">
              
              <button class="btn btn-primary">Crear Usuario</button>

            </a>
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
        				
                <table class="table table-bordered table-hover table-striped">

                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach($usuarios as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <form method="post" action="{{url('usuarios/'.$user->id)}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  
                </table>

        			</div>
        			
        		</div>

        	</div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection