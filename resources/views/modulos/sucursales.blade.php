@extends('plantilla')

@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestor de Sucursales</h1>

            <br>
            <a href="{{url('/crear-sucursales')}}">
              
              <button class="btn btn-primary">Nueva sucursal</button>

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
                      <th>Dirección</th>
                      <th>Observaciones</th>
                      <th>Comics</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach($sucursales as $sucursal)
                      <tr>
                        <td>{{$sucursal->nombre}}</td>
                        <td>{{$sucursal->direccion}}</td>
                        <td>{{$sucursal->observaciones}}</td>
                        <td>
                          <a href="{{url('/ver-comics/'.$sucursal->id)}}">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-eye"></i></button>
                          </a>
                          <a href="{{url('/buscar-comics/'.$sucursal->id)}}">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                          </a>
                        </td>
                        <td>
                          <div class="row">
                            <a href="{{url('/sucursales/'.$sucursal->id.'/edit')}}">
                              <button class="btn btn-success" type="submit"><i class="fa fa-pen"></i></button>
                            </a>

                            <form method="post" action="{{url('/sucursales/'.$sucursal->id)}}" class="frm-del">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                            
                          </div>
                          {{-- 
                            <div class="col-3">
                              <form method="post" action="{{url('sucursales/'.$sucursal->id)}}" class="frm-upd">
                                @csrf
                                @method('put')
                                
                              </form>
                            </div>
                            <div class="col-3">
                              <form method="post" action="{{url('sucursales/'.$sucursal->id)}}" class="frm-del">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                              </form>
                            </div>                          
                           --}}
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
@section('js')
  <script>
    $('.frm-del').submit(function(e){
                    e.preventDefault();
                    Swal.fire({
                      title: 'Seguro de eliminar?',
                      text: "¡No podrás revertir esto!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Si, eliminar!'
                    }).then((result) => {
                      if (result.value) {
                        this.submit();
                      }
                    })
    });
  </script>
@endsection