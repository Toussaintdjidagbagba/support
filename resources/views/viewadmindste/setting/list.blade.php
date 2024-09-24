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
                    Etats / Avis
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listes des avis
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#addavis">Ajouter</button>
                       		</h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
									<thead>
									<tr>
										<th>#</th>
                                        <th>Libelle</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
                                        @php($i=1)
                                        @forelse($list as $men)
                                        @if($men->type == "Avis")
                                        <tr>
                                            <th><span class="co-name">{{$i}}</span></th>
                                            <td>{{$men->libelle}}</td>
                                            <td>
                                                @if(in_array("update_menu", session("auto_action")))
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <i class="material-icons">system_update_alt</i>
                                                </button>
                                                @endif

                                                @if(in_array("delete_menu", session("auto_action")))
                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> </button>
                                                @endif 
                                            </td>
                                            @php($i++)
                                        </tr>
                                        @endif
                                        @empty
                                        <tr>
                                            <td colspan="3"><center>Pas d'avis enregistrer!!!</center> </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
								</table>
                                
							</div> 
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listes des états
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#addetat">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Libelle</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @forelse($list as $men)
                                        @if($men->type == "Etat")
                                        <tr>
                                            <th><span class="co-name">{{$i}}</span></th>
                                            <td>{{$men->libelle}}</td>
                                            <td>
                                                @if(in_array("update_menu", session("auto_action")))
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">system_update_alt</i> 
                                                </button>
                                                @endif

                                                @if(in_array("delete_menu", session("auto_action")))
                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i></button>
                                                @endif 
                                            </td>
                                            @php($i++)
                                        </tr>
                                        @endif
                                        @empty
                                        <tr>
                                            <td colspan="3"><center>Pas d'états enregistrer!!!</center> </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                
                            </div> 
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

@endsection

@section("model")

<div class="modal fade" id="addetat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Enregistrer un état : </h4>
			</div>
            <form method="post" action="{{ route('AETAT') }}">
             <div class="modal-body">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input type="hidden" name="type" value="Etat" />
               <div class="row clearfix">
                <div class="col-md-12">
                  <label for="libelle">Libellé :</label>
                  <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="libelle" name="lib" class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
        <button type="submit" class="btn bg-deep-orange waves-effect">AJOUTER</button>
    </div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="addavis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enregistrer un avis : </h4>
            </div>
            <form method="post" action="{{ route('AETAT') }}">
             <div class="modal-body">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input type="hidden" name="type" value="Avis" />
               <div class="row clearfix">
                <div class="col-md-12">
                  <label for="libelle">Libellé :</label>
                  <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="libelle" name="lib" class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
        <button type="submit" class="btn bg-deep-orange waves-effect">AJOUTER</button>
    </div>
</form>
</div>
</div>
</div>

@endsection