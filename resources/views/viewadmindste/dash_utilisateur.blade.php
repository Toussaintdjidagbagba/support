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
                Utilisateurs
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Liste des utilisateurs

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
                                        <th data-priority="3">Image</th>
                                        <th>Identifiant</th>
                                        <th data-priority="1">Nom</th>
                                        <th data-priority="3">Prénom(s)</th>
                                        <th data-priority="1">Téléphone</th>
                                        <th data-priority="3">Profession</th>
                                        <th data-priority="3">Service</th>
                                        <th data-priority="3">Rôle</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $user)
                                        <tr>
                                            <td>
                                                @if ($user->image != '')
                                                    <img src="{{ asset('images/' . $user->image) }}" alt="Image de profil"
                                                        width="45" height="55" style="border-radius: 50%">
                                                @else
                                                    <span>Image non disponible</span>
                                                @endif
                                            </td>
                                            <th><span class="co-name">{{ $user->login }}</span></th>
                                            <td>{{ $user->nom }}</td>
                                            <td>{{ $user->prenom }}</td>
                                            <td>{{ $user->tel }}</td>
                                            <td>{{ $user->other }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleService($user->Service) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleRole($user->Role) }}</td>
                                            <td>
                                                @if (in_array('update_user', session('auto_action')))
                                                    <button type="button" onclick="updateuser({{ $user->idUser }})"
                                                        title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-5 waves-effect waves-light">
                                                        <i class="material-icons">system_update_alt</i>

                                                    </button>
                                                @endif

                                                @if (in_array('delete_user', session('auto_action')))
                                                    <button type="button" title="Supprimer" style="color:white;"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $user->idUser }}"
                                                        onclick="Delete(event, '{{ route('DU') }}','{{ $user->nom . ' ' . $user->prenom }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-5 waves-effect waves-light"><i
                                                            class="material-icons">delete_sweep</i>
                                                    </button>
                                                @endif

                                                @if (in_array('reset_user', session('auto_action')))
                                                    <button type="button" title="Réinitialiser"
                                                        class="btn btn-warning btn-circle btn-xs  margin-bottom-5 waves-effect waves-light"><a
                                                            href="{{ url('reinitialiser-utilisateur-') }}{{ $user->idUser }}"
                                                            style="color:white;"> <i
                                                                class="material-icons">restore</i></a></button>
                                                @endif

                                                @if (in_array('status_user', session('auto_action')))
                                                    @if ($user->statut == '0')
                                                        <button type="button" title="Désactivé ?"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-5 waves-effect waves-light"><a
                                                                href=" {{ url('desactivé-utilisateur-') }}{{ $user->idUser }}"
                                                                style="color:white;"> <i
                                                                    class="material-icons">toggle_on</i></a></button>
                                                    @endif
                                                    @if ($user->statut == '1')
                                                        <button type="button" title="Activé ?"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-5 waves-effect waves-light"
                                                            style="background-color:grey"><a
                                                                href="{{ url('activé-utilisateur-') }}{{ $user->idUser }}"
                                                                style="color:white;"> <i
                                                                    class="material-icons">toggle_off</i></a></button>
                                                    @endif
                                                @endif

                                                @if (in_array('status_user', session('auto_action')))
                                                    @if ($user->activereceiveincident == 0)
                                                        <button type="button"
                                                            title="Voulez-vous désactivé l'utilisateur à recevoir les mails d'incident ?"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-5 waves-effect waves-light"><a
                                                                href=" {{ route('DSUM', $user->idUser) }}"
                                                                style="color:white;"> <i
                                                                    class="material-icons">contact_mail</i></a></button>
                                                    @endif
                                                    @if ($user->activereceiveincident == 1)
                                                        <button type="button"
                                                            title="Voulez-vous activé l'utilisateur à recevoir les mails d'incident ?"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-5 waves-effect waves-light"
                                                            style="background-color:grey"><a
                                                                href="{{ route('ATUM', $user->idUser) }}"
                                                                style="color:white;"> <i
                                                                    class="material-icons">mail_outline</i></a></button>
                                                    @endif
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <center>Pas d'utilisateur enregistrer!!!</center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $list->links() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        function updateuser(id) {
            window.location.href = "{{ route('MTU') }}?id=" + id;
        }

        async function Delete(event, url, libelle) {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";
            const {
                isConfirmed
            } = await Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer <span class="text-danger">' + libelle +
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
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un utilisateur : </h4>
                </div>
                <form method="post" action="{{ route('setuser') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="identifiant">Identifiant :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="identifiant" name="login" class="form-control"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="email">Email :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="email" name="mail" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="nom">Nom :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nom" name="nom" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="prenom">Prénom :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="prenom" name="prenom" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="tel">Téléphone :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tel" name="tel" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="adr">Adresse :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="adr" name="adress" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="sexe">Sexe :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe"
                                            class="form-control show-tick" placeholder="">
                                            <option value="F">Féminin</option>
                                            <option value="M">Masculin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="role">Rôle :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @php
                                            $roles = App\Providers\InterfaceServiceProvider::AllRole();
                                        @endphp
                                        <select type="text" id="role" name="role"
                                            class="form-control show-tick" placeholder="">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->idRole }}">{{ $role->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="autres">Profession :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="autres" name="autres" class="form-control"
                                            placeholder="">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="autres">Service :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @php
                                            $services = App\Providers\InterfaceServiceProvider::AllService();
                                        @endphp
                                        <select type="text" id="autres" name="serv" class="form-control"
                                            placeholder="">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="image">Image :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="image" name="image"
                                            onchange="loadImage(event)">
                                    </div>

                                    <script>
                                        var loadImage = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <img id="output" src="user.png"
                                        style="width: 70px; height: 70px; border-radius: 50%;" />
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
