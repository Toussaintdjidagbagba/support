@extends('templatedste._temp')
@section('css')

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection
@section('content')

<div class="container-fluid">
	<div class="block-header">
		@include('flash::message')
		<h2>
			Incidents
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Modifier un incident 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="{{ route('MTIS') }}" enctype="multipart/form-data" >
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
		                        <div class="col-md-3">
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
		                        <div class="col-md-3">
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
		                             	<label for="piece">Pièce jointe : <a href="{{ $info->piece }}">{{ $info->piece }}</a></label>
		                                <div class="form-group">
		                                <div class="form-line">
		                                    <input type="file" id="piece"  name="piece" accept=".pdf" class="form-control" placeholder="">
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row clearfix">
		                        <div class="col-md-12">
		                                <label for="desc">Description</label>
		                                <div class="form-group">
		                                <div class="form-line">
		                                    <textarea type="text" id="desc" name="desc" class="form-control">{{ $info->description }}</textarea>
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