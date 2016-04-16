@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    
    <h1>
    Carpetas Subidas
    <small>Carpetas entregadas para la generación de informe</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Carpeta Tributaria</a></li>
        <li class="active">Subir</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Carpetas Subidas</span>
                    <span class="info-box-number">{{count($ctes)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresas</span>
                    <span class="info-box-number">{{$ctes->unique('company_id')->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-balance-scale" aria-hidden="true"></i></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">F29</span>
                    <span class="info-box-number">{{$f29_count}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                    <span class="progress-description">
                       Declaración Impuestos
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">F22</span>
                    <span class="info-box-number">{{$f22_count}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                    <span class="progress-description">
                        Declaración de Renta
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
  
            
            
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Últimas Carpetas Subidas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="lastCTE" class="table table-bordered table-striped dataTable">
                        <thead>
                            <th>Empresa</th>
                            <th>Fecha Generación de la Carpeta</th>
                            <th>Fecha de Subida</th>
                            <th>Ver Carpeta</th>
                            <th>Ver Informe</th>
                            
                        </thead>
                        
                        <tbody>
                            @forelse($ctes as $cte)
                            <tr>
                                <td>{{$cte->company->name}}</td>
                                <td>{{$cte->folder_issue_date}}</td>
                                <td>{{$cte->created_at}}</td>
                                <td>
                                    <a href="/cte/{{$cte->id}}" type="button" class="btn btn-block btn-success btn-flat">
                                        <i class="fa fa-folder-o fa-5" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="" type="button" class="btn btn-block btn-primary btn-flat">
                                        <i class="fa fa-list-alt fa-5" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            
                            @empty
                            frefrefre
                            @endforelse
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            
        </section>
        <!-- /.content -->
        @endsection
        @section('footer_scripts')
        <script type="text/javascript">
        $(document).ready(function(){
        $('#lastCTE').DataTable({
        language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ resultados",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando _START_ al _END_ de un total de _TOTAL_ resultados",
        "sInfoEmpty":      "Sin resultados",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ resultados)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
        });
        });
        </script>
        @endsection