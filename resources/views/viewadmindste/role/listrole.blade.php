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
                    R鬺es
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listes des r鬺es
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                       		</h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
									<thead>
									<tr>
										<th>Code</th>
										<th data-priority="1">Libelle</th>
										<th data-priority="3">Action Utilisateur</th>
										<th data-priority="6">Actions</th>
									</tr>
									</thead>
									<tbody>
                                        @forelse($list as $role)
                                        <tr>
                                            <th><span class="co-name">{{$role->code}}</span></th>
                                            <td>{{$role->libelle}}</td>
                                            <td>{{App\Providers\InterfaceServiceProvider::LibelleUser($role->user_action)}}</td>
                                            

                                            <td>
                                            @if(in_array("update_role", session("auto_action")))
                                            <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                <a href="{{ url('modif-roles-') }}{{$role->idRole}}" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                
                                            </button>
                                            @endif

                                            @if(in_array("delete_role", session("auto_action")))
                                            <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="{{ url('delete-roles-') }}{{$role->idRole}}" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                            @endif

                                            @if(in_array("menu_role", session("auto_action")))
                                            <button type="button" title="Menu"  class="btn btn-warning btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="{{ url('menu-roles-') }}{{$role->idRole}}" style="color:white;"> <i class="material-icons green-color">menu_book</i></a></button>
                                            @endif

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7"><center>Pas de rôle enregistrer!!!</center> </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
								</table>
                                {{$list->links()}}
							</div> 
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

@endsection

@section("model")

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Enregistrer un r么le : </h4>
			</div>
            <form method="post" action="{{route('AR')}}">
			<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="code">Code</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="code" name="code" class="form-control" placeholder="" required>
                                </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="lib">Libelle</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
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