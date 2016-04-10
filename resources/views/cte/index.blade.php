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
      
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Últimas Carpetas Subidas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="lastCTE" class="table table-bordered table-striped dataTable">
                    <thead>
                        <th>Empresa</th>
                        <th>Fecha</th>
                        <th>Número de Páginas</th>
                        
                    </thead>
                    
                    <tbody>
                    <tr>
                        <td>Alguien</td>
                        <td>Alguien</td>
                        <td>Alguien</td>
                    </tr>                   

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