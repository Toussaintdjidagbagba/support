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
			Incidents
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					@include('flash::message')
					<h2>
						Modifier un incident 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="{{ route('MTISA') }}" enctype="multipart/form-data" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" name="id" value="{{ $info->id }}" />
							<div class="row clearfix">
		                        <div class="col-md-3">
		                             	<label for="mod">Module</label>
		                                <div class="form-group">
		                                <div class="form-line">
		                                    <input type="text" id="mod" name="module" value="{{ $info->Module }}" class="form-control" placeholder="" required>
		                                </div>
		                                </div>
		                        </div>
		                        <div class="col-md-2">
		                             	<label for="cat">Catégorie</label>
		                                <div class="form-group">
		                                @php
		                                    $cats = App\Providers\InterfaceServiceProvider::AllCat();
		                                @endphp
		                                <div class="form-line">
		                                    <select type="text" id="cat" name="cat" class="form-control" required>
		                                        <option value="{{ $info->cat }}">
		                                        	@foreach($cats as $cat)
		                                        		@if($cat->id == $info->cat)
		                                            	{{ $cat->libelle }}
		                                            	@endif
		                                       		@endforeach
		                                        </option>
		                                        @foreach($cats as $cat)
		                                            <option value="{{ $cat->id }}">{{ $cat->libelle }}</option>
		                                        @endforeach
		                                    </select>
		                                </div>
		                            </div>
		                        </div>

		                        <div class="col-md-2">
		                        	<label for="hiera">Hiérarchisation</label>
		                           <div class="form-group">
		                            <div class="form-line">
		                                @php
		                                    $hies = App\Providers\InterfaceServiceProvider::AllHie();
		                                @endphp
		                                <select type="text" id="hiera" name="hiera" class="form-control" placeholder="" required>
		                                    <option value="{{ $info->hierarchie }}">
		                                    	@foreach($hies as $hie)
		                                        		@if($hie->id == $info->hierarchie)
		                                            	{{ $hie->libelle }}
		                                            	@endif
		                                       		@endforeach
		                                    </option>
		                                    @foreach($hies as $hie)
		                                        <option value="{{ $hie->id }}">{{ $hie->libelle }}</option>
		                                    @endforeach
		                                </select>
		                            </div>
		                           </div>
		                        </div>
								<div class="col-md-3">
									<label for="piece">Pièce jointe :</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" class="form-control" id="piece" name="piece" onchange="loadImage(event)">
										</div>
								
										<script>
											var loadImage = function(event) {
												var output = document.getElementById('output');
												// Vérifiez si un fichier est sélectionné
												if (event.target.files.length > 0) {
													output.src = URL.createObjectURL(event.target.files[0]);
													output.onload = function() {
														URL.revokeObjectURL(output.src); // Libérer la mémoire
													}
												}
											};
										</script>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<img id="output" src="{{ asset('documents/incident/' . ($info->piece)) }}" style="width: 70px; height: 70px; border-radius: 50%;" />
									</div>
								</div>								

		                    </div>

		                    <div class="row clearfix">
		                        <div class="col-md-6">
		                                <label for="desc">Description</label>
		                                <div class="form-group">
		                                <div class="form-line">
		                                    <textarea type="text" id="desc" name="desc" class="form-control">{{ $info->description }}</textarea>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                                <label for="resolve">Solution</label>
		                                <div class="form-group">
		                                <div class="form-line">
		                                    <textarea type="text" id="resolve" name="resolve" class="form-control">{{ $info->resolue }}</textarea>
		                                </div>
		                            </div>
		                        </div>
		                    </div>

							<div class="form-group" style="display: block;" >
								<div class="col-sm-12">
									<button type="submit" class="btn bg-deep-orange waves-effect" style="float:right; margin-top: 20px; margin-left: 15px; width: 25%;">Mettre à jour
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