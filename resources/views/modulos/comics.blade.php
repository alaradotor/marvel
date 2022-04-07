@extends('plantilla')

@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ver Comics de: {{ $sucursal->nombre }}</h1>
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
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Volumen</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach($comics as $comic)
                      <tr>
                        <td class="col-md-3">
                          <img class="img-thumbnail w-50" alt="image" 
                          @if(@fopen($comic->imagen,"r"))
                            src="{{($comic->imagen)}}"
                          @else
                            src="{{url('dist/img/dummy.jpg')}}" 
                          @endif
                          >
                        </td>
                        <td class="col-md-5">{{$comic->titulo}}</td>
                        <td class="col-md-2">{{$comic->volumen}}</td>
                        <td class="col-md-2">
                          <div class="row">
                            {{-- <a data-toggle="modal" id="ajaxSubmit" data-target="#modal-xl"
                                data-attr="{{url('comics/'.$comic->id)}}">                              
                              <button class="btn btn-success"><i class="fa fa-info-circle"></i></button>
                            </a> --}}

                            <a href="{{url('comics/'.$comic->id)}}">                              
                              <button class="btn btn-success"><i class="fa fa-info-circle"></i></button>
                            </a>

                            <form method="post" action="{{url('comics/'.$comic->id).'/'.$sucursal->id}}" class="frm-del">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                          </div>
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
                      title: 'Seguro de quitar este comic?',
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