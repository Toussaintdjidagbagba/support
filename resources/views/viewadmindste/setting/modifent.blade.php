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
			Services
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Modifier l'Entête et le Footer
					</h2>
				</div>
				<div class="body">
					<div class="row">
                        <form method="post" style="padding : 20px"  action="{{ route('UME') }}" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="{{ $ent->id }}" />
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="libelle">Logo :</label>
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="piece" name="piece" value="{{ $ent->logo }}"
                                                accept=".jpg, .jpeg, .png" onchange="loadImage(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="libelle">Titre :</label>
                                            <div class="form-line">
                                                <input type="text" id="titre" name="titre" class="form-control" value="{{ $ent->titre }}"
                                                    placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="libelle">Contenu :</label>
                                            <input type="text" id="libelle" name="lib" class="form-control" value="{{ $ent->contenu_entete }}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="alignement">Alignement Entête :</label>
                                        <select id="alignement_entete" name="alignement_entete" class="form-control">
                                            <option value="left" {{ $ent->alignement_entete == 'left' ? 'selected' : '' }}>Aligner à gauche</option>
                                            <option value="center" {{ $ent->alignement_entete == 'center' ? 'selected' : '' }}>Aligner au centre</option>
                                            <option value="right" {{ $ent->alignement_entete == 'right' ? 'selected' : '' }}>Aligner à droite</option>
                                            <option value="justify" {{ $ent->alignement_entete == 'justify' ? 'selected' : '' }}>Justifié</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label for="piece">Aperçu</label>
                                    <div class="form-group">
                                        @if($ent->logo)
                                            <img src="{{ asset('documents/entete/' . $ent->logo) }}" style="width: 70px; height: 70px; border-radius: 50%;" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <!-- Contenu du footer (2 colonnes) -->
                                <div class="col-lg-4 col-md-4 col-sm-4">
    
                                    <label for="contenu_footer_col">Footer Contenu 1 :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="contenu_footer_col" name="contenu_footer_col" class="form-control">{{ $ent->contenu_footer_col }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label for="contenu_footer_col2">Footer Contenu 2 :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="contenu_footer_col2" name="contenu_footer_col2" class="form-control">{{ $ent->contenu_footer_col2 }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Alignement du footer -->
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="alignement">Alignement Footer :</label>
                                        <select id="alignement_footer" name="alignement_footer" class="form-control">
                                            <option value="left" {{ $ent->alignement_footer == 'left' ? 'selected' : '' }}>Aligner à gauche</option>
                                            <option value="center" {{ $ent->alignement_footer == 'center' ? 'selected' : '' }}>Aligner au centre</option>
                                            <option value="right" {{ $ent->alignement_footer == 'right' ? 'selected' : '' }}>Aligner à droite</option>
                                            <option value="justify" {{ $ent->alignement_footer == 'justify' ? 'selected' : '' }}>Justifié</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-group" style="display: block;" >
								<div class="col-sm-12">
									<button type="submit" class="btn bg-deep-orange waves-effect" 
                                    style="float:right; margin-top: 20px; margin-left: 15px; width: 25%;">
                                    Mettre à jour
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