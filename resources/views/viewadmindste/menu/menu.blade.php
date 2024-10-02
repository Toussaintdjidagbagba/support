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
                Menu
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Listes des menus

                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">Ajouter</button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Libelle menu</th>
                                        <th data-priority="1">Titre Page</th>
                                        <th data-priority="3">Rubrique</th>
                                        <th data-priority="3">Route</th>
                                        <th data-priority="3">Icon</th>
                                        <th data-priority="3">Position</th>
                                        <th data-priority="3">Action Utilisateur</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $men)
                                        <tr>
                                            <th><span class="co-name">{{ $men->libelleMenu }}</span></th>
                                            <td>{{ $men->titre_page }}</td>
                                            <td>
                                                @if ($men->element_menu == 600)
                                                    Paramètres
                                                @endif
                                                @if ($men->element_menu == 500)
                                                    Principal
                                                @endif
                                            </td>
                                            <td>{{ $men->route }}</td>
                                            <td>{{ $men->iconee }}</td>
                                            <td>{{ $men->num_ordre }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleUser($men->user_action) }}
                                            </td>
                                            <td>
                                                @if (in_array('update_menu', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <a href="{{ url('modif-menu-') }}{{ $men->idMenu }}"
                                                            style="color:white;"> <i
                                                                class="material-icons">system_update_alt</i></a>

                                                    </button>
                                                @endif

                                                @if (in_array('delete_menu', session('auto_action')))
                                                    <button type="button" title="Supprimer" style="color:white;"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $men->idMenu }}"
                                                        onclick="Delete(event, '{{ route('DM') }}','{{ $men->libelleMenu }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </button>
                                                @endif

                                                @if (in_array('action_menu', session('auto_action')))
                                                    <button type="button" title="Action des menus"
                                                        class="btn btn-warning btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a
                                                            href="{{ url('action-menu-') }}{{ $men->idMenu }}"
                                                            style="color:white;"> <i
                                                                class="material-icons">bookmark_add</i></a></button>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <center>Pas d'utilisateur enregistrer!!!</center>
                                            </td>
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
    <script type="text/javascript">
        async function Delete(event, url, libelle) {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";
            const {
                isConfirmed
            } = await Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer le menu <span class="text-danger">' +
                    libelle +
                    '</span> ?',
                text: "Cette action est irréversible!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Oui, supprimer",
                cancelButtonText: "Annuler",
                customClass: {
                    confirmButton: 'bg-confirm',
                    cancelButton: 'bg-cancel'
                }
            });

            if (isConfirmed) {
                try {
                    dat = {
                        _token: token,
                        id: iddelete,
                    };
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(dat)
                    });

                    if (response.status == 200) {
                        data = await response.text();
                        Swal.fire("Succès", data, "success").then(() => {
                            window.location.reload();
                        });
                    } else {
                        throw new Error('Erreur lors de la suppression');
                    }
                } catch (error) {
                    Swal.fire("Erreur", "La suppression a échouée" + error);
                }
            }
        }
    </script>
@endsection

@section('model')
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un menu : </h4>
                </div>
                <form method="post" action="{{ route('Menu_add') }}">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="libelle">Libellé menu :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelle" name="lib" class="form-control"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="titre">Titre page :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="titre" name="titre" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="routes">Route :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="routes" name="rout" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="icone">Icon :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="icone" name="icon" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="pose">Position :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="pose" name="pos" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="menn">Menu parent :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="menn" name="parent"
                                            class="form-control show-tick" placeholder="">
                                            <option value="0">Sélectionner un élément</option>
                                            @foreach ($list as $par)
                                                @if ($par->Topmenu_id == 0)
                                                    <option value="{{ $par->idMenu }}">{{ $par->libelleMenu }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="rubrique">Rubrique :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="rubrique" name="element"
                                            class="form-control show-tick" placeholder="">
                                            <option value="500">Principal</option>
                                            <option value="600">Paramètres</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                            data-dismiss="modal">FERMER</button>
                        <button type="submit" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
