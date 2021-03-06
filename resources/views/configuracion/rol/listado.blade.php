@extends('layouts.app')

@section('script_cabecera')


@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestionar Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Listado de roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado de Roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <a href="{{route($variable.'.create')}}" class="btn btn-xs btn-success"><span class="fas fa-plus"></span> Nueva Entrada</a>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        @include('mensajes.successful')
                    </div>
                </div>
                <br>
                <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Editar</th>

                                        <th>Eliminar</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $rol)
                                    <tr class="">
                                        <td>{{$rol->rol_descripcion}}</td>
                                        <td align="center"><a href="{{route($variable.'.edit',$rol->id)}}" class="btn btn-sm btn-primary"><span class="fas fa-edit"></span></a></td>
                                        <td align="center"><a href="{{route($variable.'.show',$rol->id)}}" class="btn btn-sm btn-danger"><span class="fas fa-trash-alt"></span></a></td>

                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>


              </div>

            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>

        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection

@section('script_pie')


@endsection