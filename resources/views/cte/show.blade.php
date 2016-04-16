@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    
    <h1>
    Detalle Carpeta Tributaria
    <small>Datos recolectados  a partir de la CTE subida</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Carpeta Tributaria</a></li>
        <li class="active">{{$cte->id}}</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Información de la Empresa</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Formularios 29</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Formularios 22</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    @include('cte.show._primary')

                    @include('cte.show._f29')

                    @include('cte.show._f22')
                    
                   
                 
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    
    
</section>
<!-- /.content -->
@endsection