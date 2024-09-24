
@extends('templatedste._temp')

@section('css')

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

<div class="container-fluid">
	<div class="block-header">
		<h2>
			Menu
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Attribuer menu


					</h2>
				</div>
				<div class="body">

					<form class="form-horizontal" method="post" action="{{ route('MenuAttr') }}" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />

						<div class="form-group">
							<div class="col-sm-6">
								<label for="inp-type-1" style="vertical-align:middle; margin-top: 1%;" class="col-sm-6  ">Rôle : </label>
								<div class="col-sm-6">
									<input type="hidden" name="role" value="{{ $role->idRole }}" />
									<input type="text" class="form-control" id="inp-type-1" value="{{ $role->libelle }}"  name="libelle">
								</div>
							</div>			
						</div>

						<div class="row clearfix">
							<div class="col-sm-12">
								<label for="inp-type-1" style="vertical-align:middle; margin-top: 1%;" class="col-sm-12  ">Attribuer un menu : </label>

								@foreach($allmenu as $menu)

								<div class="col-sm-6">

									<div class="col-sm-12"> 
										
										@if(count($auto_menu) != 0)
										@if(in_array(strval($menu->idMenu), $auto_menu))
										<center>
											<input  type="checkbox" id="men{{$menu->idMenu}}" name="menu[]" value="{{$menu->idMenu}}" style="height: 25px; width: 25px;background-color: #0000ff;" checked>
											<label for="men{{$menu->idMenu}}" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12  ">{{$menu->libelleMenu}} </label>
										</center>
										@else
										<center>
											<input type="checkbox" id="men{{$menu->idMenu}}" name="menu[]" value="{{$menu->idMenu}}" style="height: 25px; width: 25px;background-color: #0000ff;">
											<label for="men{{$menu->idMenu}}" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12  ">{{$menu->libelleMenu}} </label>
										</center>
										@endif
										@else
										<center>
											<input  type="checkbox" id="men{{$menu->idMenu}}" name="menu[]" value="{{$menu->idMenu}}" style="height: 25px; width: 25px;background-color: #0000ff;">
											<label for="men{{$menu->idMenu}}" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12  ">{{$menu->libelleMenu}} </label>
										</center>
										@endif

									</div>
									<div class="col-sm-10">

										<?php $allaction_this = App\Providers\InterfaceServiceProvider::actionMenu($menu->idMenu);
										?>

										@foreach($allaction_this as $action)
										<div class="col-sm-12">
											<div class="col-sm-12">
												@if(count($auto_action) != 0) 
												<?php
												$array = array();
												foreach($auto_action as $all){
													if($all->Menu == $menu->idMenu)
														array_push($array, $all->ActionMenu);
												}
												?>
												@if(in_array(strval($action->id), $array))
												<center><input 
													type="checkbox" id="act{{$action->id}}" 
													name="action[]" value="{{$action->id}}" style="height: 25px; width: 25px;background-color: #0000ff;" checked>
													<label for="act{{$action->id}}" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12">{{$action->action}} </label>
												</center>
												@else
												<center>
													<input type="checkbox" id="act{{$action->id}}" name="action[]" value="{{$action->id}}" style="height: 25px; width: 25px;background-color: #0000ff;">
													<label for="act{{$action->id}}" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12">{{$action->action}} </label>
												</center>
												@endif
												@else
												<center>
													<input type="checkbox" id="act{{$action->id}}" name="action[]" value="{{$action->id}}" style="height: 25px; width: 25px;background-color: #0000ff;">
													<label for="act{{$action->id}}" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12">{{$action->action}} </label>
												</center>
												@endif

											</div>
										</div>
										@endforeach
									</div>
								</div>

								@endforeach

							</div>
							<div class="col-sm-12">
								<button type="submit" data-color="deep-orange" class="bg-deep-orange waves-effect waves-light" style="float:right;">Attribuer
								</button>
							</div>	
						</div>	
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
</div>

@endsection
