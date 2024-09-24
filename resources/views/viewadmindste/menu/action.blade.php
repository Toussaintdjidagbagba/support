@extends('templatedste._temp')
@section('css')

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection
@section('content')

<div class="container-fluid">
	<div class="block-header">
		@include('flash-message')
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
						Ajouter des actions au menu de {{config('app.name')}} 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="{{ route('Actionsave') }}" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" name="menu" value="{{ $idMenu }}">
							
							<div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="libelle">Action : </label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="libelle" name="actio" value="" class="form-control" placeholder="" required>
                                </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="titre">Action dev :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="titre" name="actiondev"  value="" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                             	<label for="routes">Les actions du menu actuel :</label>
                                <div class="form-group">
	                               @for ( $i = 0; $i < count($actions); $i++)
                            
                            			<label style="float:left; margin:10px; padding:10px; background:#c1cdcd; border-radius :10%; color:black;">
                            			{{ $actions[$i]->action }}
                            			</label>
                        			@endfor
                            	</div>
                        </div>
                    </div>
                    
							

							<div class="form-group" style="display: block;" >
								<div class="col-sm-12">
									<button type="submit" class="btn bg-deep-orange waves-effect" style="float:right; margin-top: 20px; margin-left: 15px; width: 25%;">Ajouter
									</button>
								</div>
							</div>
						</form>	
					</div>

				</div>
			</div>
		</div>
		
	</div>
</div>

@endsection

@section("js")
<script>
	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>
@endsection
