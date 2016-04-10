@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    
    <h1>
    Subir Carpeta Tributaria
    <small>Para la preparación de Informe</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Carpeta Tributaria</a></li>
        <li class="active">Subir</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Haga click para subir un archivo o arrastre un PDF</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        
                        <form id="my-awesome-dropzone"
                            action="/users/{{Auth::user()->id}}/ctes" class="dropzone">
                            {{ csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection