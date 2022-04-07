@extends('plantilla')

@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Agregar a: {{$sucursal->nombre}}</h1>
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
                                    
                <form method="post" action="{{route('agregar-comics',['sucursal'=>$sucursal->id])}}">
                  @csrf
                  <div class="form-group">
                    @foreach($comics['data']['results']  as $comic)
                    
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="idComic[]" value="{{ 
                          $comic['id']."@".
                          $comic['thumbnail']['path']."/clean.".$comic['thumbnail']['extension']."@".
                          $comic['title']."@".
                          $comic['issueNumber']
                         }}">
                        <label>{{ $comic['title'] }}</label>
                      </div>
                    
                    @endforeach
                  </div>
                  <br>

                  <button type="submit" class="btn btn-success btn-lg">Agregar</button>

                </form>

                {{-- <table class="table table-bordered table-hover table-striped">

                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Fecha</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($comics['data']['results']  as $comic)
                      <tr>
                        <td>{{ $comic['title'] }}</td>
                        <td>{{ $comic['dates']['date'] }}</td>
                        <td>
                          <input type="checkbox" name="idComic[]" value="{{ $comic['title'] }}"> <label>{{ $comic['title'] }}</label>

                        </td>
                        <td>
                          <div class="row">
                            <a href="{{url('comics/'.$comic['id'])}}">
                              <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>
                            </a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  
                </table> --}}
        			</div>
        			
        		</div>

        	</div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection