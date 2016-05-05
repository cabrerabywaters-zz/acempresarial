<div class="tab-pane" id="tab_3">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Detalle de Formularios 22 presentados</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					@forelse($cte->f22s as $f22) 
					<div class="box-group" id="F22accordion">
						<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
						<div class="panel box box-primary">
							<a data-toggle="collapse" data-parent="#F22accordion" href="#F22collapse{{$f22->id}}" aria-expanded="false" class="collapsed">
								<div class="box-header with-border">
									<h4 class="box-title">
									
									Formulario Año {{$f22->tax_year->format('Y')}}
									
									</h4>
								</div>
							</a>
							<div id="F22collapse{{$f22->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								
								<div class="box-body no-padding">
									<table class="table table-striped">
										<thead>
											<th class="col-md-3"></th>
											<th class="col-md-3"></th>
											<th class="col-md-3"></th>
											<th class="col-md-3"></th>
										</thead>
										<tbody>
											<input type="hidden" name="f22[id][]" value="{{$f22->id}}">
											
											@foreach(array_chunk($f22->toArray(),4,true) as $chunckedF22)
											<tr>
												@foreach($chunckedF22 as $field => $value)
												<td style="vertical-align: middle !important;" >
													<label>{{trans("f22.$field")}}</label>
													<input type="text" class="form-control"
													name="F22[$field][]" placeholder="RUT" value="{{$value}}">
													
												</td>
												
												@endforeach
											</tr>
											
											@endforeach
											
											
										</tbody></table>
									</div>
								</div>
								
							</div>
							
						</div>
						@empty
						@endforelse
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			
		</div>
		
	</div>