<div class="tab-pane active" id="tab_1">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Información General de la Empresa</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table table-striped">
        <thead>         
          <th class="col-md-4"></th>
          <th class="col-md-4"></th>
          <th class="col-md-4"></th>
        </thead>
        <tbody>
        <tr>
          
          <td style="vertical-align: middle !important;" >
            <label>RUT</label>
            <input type="text" class="form-control" placeholder="RUT" value="{{$cte->company->rut}}">
          </td>
         
          <td style="vertical-align: middle !important;">            
            <label>Nombre</label>
             <input type="text" class="form-control" placeholder="Nombre" name="F22[name][]" value="{{$cte->company->name}}">
          </td>          
        </tr>
         <tr>
          
          <td style="vertical-align: middle !important;">{{$cte->company->address}}</td>
          <td style="vertical-align: middle !important;"><h4>Categoría Tributaria:</h4</td>
          <td style="vertical-align: middle !important;">{{$cte->company->tax_category}}</td>          
        </tr>
           
          <td style="vertical-align: middle !important;" >{{$cte->evaluation}}</td>
          <td style="vertical-align: middle !important;"><h4>Nombre:</h4></td>
          <td style="vertical-align: middle !important;">{{$cte->company->name}}</td>
        <tr>
        </tr>
      </tbody></table>
    </div>
    <!-- /.box-body -->
  </div>
</div>