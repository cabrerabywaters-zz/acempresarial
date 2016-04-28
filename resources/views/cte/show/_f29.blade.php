<div class="tab-pane" id="tab_2">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Detalle de Formularios 29 presentados</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					@forelse($cte->f29s as $f29)
					<div class="box-group" id="accordion">
						<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
						<div class="panel box box-primary">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$f29->id}}" aria-expanded="false" class="collapsed">
								<div class="box-header with-border">
									<h4 class="box-title">
									
									{{$f29->C15}}
									
									</h4>
								</div>
							</a>
							<div id="collapse{{$f29->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								
								<div class="box-body no-padding">
									<table class="table table-striped">
										<thead>
											<th class="col-md-2"></th>
											<th class="col-md-4"></th>
											<th class="col-md-2"></th>
											<th class="col-md-4"></th>
										</thead>
										<tbody>
											
											@foreach(array_chunk($f29->toArray(),6,true) as $partialF29)
											<tr>
												@foreach($partialF29 as $field => $value)
												<td style="vertical-align: middle !important;" >
													<label>{{trans("f29.$field")}}</label>
													<input type="text" class="form-control" placeholder="RUT" value="{{$value}}">
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