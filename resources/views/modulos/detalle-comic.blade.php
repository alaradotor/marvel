@extends('plantilla')

@section('content')

{{-- @dd($personajes) --}}
@php
 $url_img = $comic['data']['results'][0]['thumbnail']['path']."/clean.".$comic['data']['results'][0]['thumbnail']['extension'];
@endphp
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$comic['data']['results'][0]['title']}}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-thumbnail w-50" alt="image" 
                    @if(@fopen($url_img,"r"))
                      src="{{$url_img}}"
                    @else
                      src="{{url('dist/img/dummy.jpg')}}" 
                    @endif
                  >
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Volumen</b> <a class="float-right">{{$comic['data']['results'][0]['issueNumber']}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha</b> <a class="float-right">{{$comic['data']['results'][0]['dates'][0]['date']}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Páginas</b> <a class="float-right">{{$comic['data']['results'][0]['pageCount']}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#descripcion" data-toggle="tab">Descripción</a></li>
                  <li class="nav-item"><a class="nav-link" href="#sucursales" data-toggle="tab">Sucursales</a></li>
                  <li class="nav-item"><a class="nav-link" href="#personajes" data-toggle="tab">Personajes</a></li>
                  <li class="nav-item"><a class="nav-link" href="#imagen" data-toggle="tab">Imagen</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="descripcion">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" alt="image" 
                          @if(@fopen($url_img,"r"))
                            src="{{$url_img}}"
                          @else
                            src="{{url('dist/img/dummy.jpg')}}" 
                          @endif
                        >
                        <span class="username">
                          <a href="#">{{$comic['data']['results'][0]['title']}}</a>
                        </span>
                        
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{$comic['data']['results'][0]['description']}}
                      </p>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="sucursales">
                    <h3>Disponible en:</h3>
                    <!-- Post -->
                    <div class="post">
                      <ul>
                        @foreach($sucursales as $sucursal)
                          <li>{{$sucursal->nombre}}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="personajes">
                    <!-- Post -->
                    <div class="post">
                      @foreach($personajes['data']['results'] as $personaje)
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" alt="image" 
                          @if(@fopen($personaje['thumbnail']['path']."/clean.".$personaje['thumbnail']['extension'],"r"))
                            src="{{$personaje['thumbnail']['path']."/clean.".$personaje['thumbnail']['extension']}}"
                          @else
                            src="{{url('dist/img/dummy.jpg')}}" 
                          @endif
                        >
                        <span class="username">
                          <a href="#">{{$personaje['name']}}</a>
                        </span>
                        
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="imagen">
                    <img class="w-75 p-3" alt="image" 
                      @if(@fopen($url_img,"r"))
                        src="{{$url_img}}"
                      @else
                        src="{{url('dist/img/dummy.jpg')}}" 
                      @endif
                    >
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection