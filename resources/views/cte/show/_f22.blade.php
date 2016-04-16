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
					<div class="box-group" id="accordion">
						<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
						<div class="panel box box-primary">
							<a data-toggle="collapseF22" data-parent="#accordion" href="#collapseF22{{$f22->id}}" aria-expanded="false" class="collapsed">
								<div class="box-header with-border">
									<h4 class="box-title">
									
									{{
									
									$f22->tax_year->format('Y')
									}}
									
									</h4>
								</div>
							</a>
							<div id="collapseF22{{$f22->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								dewdewdw
								<div class="box-body no-padding">
									<table class="table table-striped">
										<thead>
											<th class="col-md-2">vfd</th>
											<th class="col-md-4"></th>
											<th class="col-md-2"></th>
											<th class="col-md-4"></th>
										</thead>
										<tbody>
											
											@foreach(array_chunk($f22->toArray(),2,true) as $partialF22)
											<tr>
												@foreach($partialF22 as $field => $value)
												<td ><h4>{{trans("f22.$field")}}</h4></td>
												<td style="vertical-align: middle !important;" >{{$value}}</td>
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