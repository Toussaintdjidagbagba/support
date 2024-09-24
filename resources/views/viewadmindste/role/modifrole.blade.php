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
						Modifier un rôle
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="{{ route('SRL') }}" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							
							<div class="row clearfix">
								<div class="col-sm-6">
									<label for="identifiant">Code</label>
									<input type="hidden" name="id" value="{{ $info->idRole }}">
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="identifiant" name="code" class="form-control" value="{{ $info->code }}"required>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label for="libelle">Libelle </label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="libelle" class="form-control" value="{{ $info->libelle }}" name="libelle" >
										</div>
									</div>			
								</div>
							</div>
							

							<div class="form-group" style="display: block;" >
								<div class="col-sm-12">
									<button type="submit" class="btn bg-deep-orange waves-effect" style="float:right; margin-top: 20px; margin-left: 15px; width: 25%;">Mettre 脿 jour
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