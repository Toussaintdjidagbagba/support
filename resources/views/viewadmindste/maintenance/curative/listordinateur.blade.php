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
                <a href="{{ route('GMC') }}"> Maintenances Curative</a> \ Exécution
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Exécution de la maintenance curative

                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">Exécuter</button>

                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Date d'exécution</th>
                                        <th data-priority="1">Outil</th>
                                        <th data-priority="1">Utilisateur</th>
                                        <th data-priority="1">Obs. Util.</th>
                                        <th data-priority="1">Avis Util.</th>
                                        <th data-priority="1">Technicien</th>
                                        <th data-priority="1">Etat</th>
                                        <th data-priority="1">Obs. Inf.</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $maint)
                                        <tr>
                                            <td>
                                                {{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::getUserOutil($maint->outil) }}
                                            </td>
                                            <td>{{ $maint->commentaireuser }}</td>
                                            <td>{{ $maint->avisuser }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleTechCurative($maint->maintenance) }}
                                            </td>
                                            <td>{{ $maint->etat }}</td>
                                            <td>{{ $maint->commentaireinf }}</td>
                                            <td class="d-flex justify-content-between align-items-center">

                                                @if (in_array('detail_maint_admin', session('auto_action')))
                                                    <button type="button" title="Détails"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#detail"
                                                        onclick="setdetailmaintenance(event,
                                                        '{{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }}',
                                                        '{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}',
                                                        '{{ $maint->action_effectuer }}',
                                                        '{{ $maint->commentaireinf }}',
                                                        '{{ $maint->avisinf }}')">
                                                        <i class="material-icons">book</i></a>
                                                    </button>
                                                @endif
                                                @if (in_array('update_maint_admin', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#update"
                                                        onclick="setupdatemaintenances(event,{{ $maint->id }}, '{{ $maint->action_effectuer }}', '{{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }}', '{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}', '{{ $maint->etat }}', '{{ $maint->commentaireinf }}')">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </button>
                                                @endif

                                                @if (in_array('delete_maint_admin', session('auto_action')))
                                                    <button type="button" title="Supprimer"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $maint->id }}"
                                                        onclick="Delete(event, '{{ route('DGMC') }}','{{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }} au {{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <i class="material-icons">delete_sweep</i></a>
                                                    </button>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">
                                                <center>Pas de maintenance enregistrer!!!</center>
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
        async function validemaintenance() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            periode = document.getElementById("periode").value;
            ordinateur = document.getElementById("ordinateur").value;
            etat = document.getElementById("etat").value;
            obs = document.getElementById("obs").value;
            maint = document.getElementById("acteff").value;
            id = document.getElementById("idMC").value;

            document.getElementById('infomaintenance').innerHTML = "";

            if (periode == 0 || ordinateur == 0)
                if (periode == 0) {
                    document.getElementById('infomaintenance').innerHTML +=
                        "<div class='alert alert-danger alert-block'>Veuillez sélectionner la période de maintenance.. </div>";
                }
            if (ordinateur == 0) {
                document.getElementById('infomaintenance').innerHTML +=
                    "<div class='alert alert-danger alert-block'>Veuillez sélectionner l'outils pour lequel la maintenance sera effectuée.. </div>";
            } else {
                console.log(ordinateur);

                dat = {
                    _token: token,
                    periode: periode,
                    id: id,
                    ordinateur: ordinateur,
                    etat: etat,
                    maint: maint,
                    obs: obs
                };

                document.getElementById("infomaintenance").innerHTML =
                    '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

                // En cours d'envoie
                try {
                    let response = await fetch("{{ route('TMC') }}", {
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
                        document.getElementById("infomaintenance").innerHTML =
                            '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                            data + '</strong></div>';
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    } else {
                        document.getElementById("infomaintenance").innerHTML =
                            '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                    }
                } catch (error) {
                    document.getElementById("infomaintenance").innerHTML = error;
                }
            }
        }

        function setdetailmaintenance(event, periode, outil, action, avisinf) {
            event.preventDefault();
            document.getElementById('dates').innerHTML = periode;
            document.getElementById('outild').innerHTML = outil;
            document.getElementById('aviinf').innerHTML = avisinf;
            document.getElementById('actn').innerHTML = action;
        }

        function setupdatemaintenances(event, id, maint, periode, outil, etat, commentaire) {
            document.getElementById('idupdates').value = id;
            document.getElementById('uobs').value = commentaire;
            document.getElementById('uacteff').value = maint;

            document.getElementById('uperiode').innerHTML = 'Période : ' + periode;

            document.getElementById('uordinateur').innerHTML = 'Outils : ' + outil;

            document.getElementById('uetat').innerHTML =
                '<select id="uuetat" name="etat" class="form-control">' +
                '<option value="Excellent" ' + (etat === 'Excellent' ? 'selected' : '') + '>Excellent</option>' +
                '<option value="Bien" ' + (etat === 'Bien' ? 'selected' : '') + '>Bien</option>' +
                '<option value="Défaillant" ' + (etat === 'Défaillant' ? 'selected' : '') + '>Défaillant</option>' +
                '<option value="Très Bien" ' + (etat === 'Très Bien' ? 'selected' : '') + '>Très Bien</option>' +
                '<option value="Passable" ' + (etat === 'Passable' ? 'selected' : '') + '>Passable</option>' +
                '<option value="Médiocre" ' + (etat === 'Médiocre' ? 'selected' : '') + '>Médiocre</option>' +
                '<option value="Autres" ' + (etat === 'Autres' ? 'selected' : '') + '>Autres</option>' +
                '</select>';
        }

        async function valideupdatemaintenance() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            etat = document.getElementById("uuetat").value;
            obs = document.getElementById("uobs").value;
            maint = document.getElementById("uacteff").value;
            id = document.getElementById("idupdates").value;

            dat = {
                _token: token,
                id: id,
                etat: etat,
                maint: maint,
                obs: obs,
            };

            document.getElementById("infoupdate").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('SUMUC') }}", {
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
                    document.getElementById("infoupdate").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                } else {
                    document.getElementById("infoupdate").innerHTML =
                        '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                document.getElementById("infoupdate").innerHTML = error;
            }
        }

        async function Delete(event, url, periode) {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";

            const {
                isConfirmed
            } = await Swal.fire({
                title: "Êtes-vous sûr de vouloir supprimer la maintenace du " + periode + "?",
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
                        Swal.fire("Succès", data, "success")
                            .then(
                                () => {
                                    window.location.reload();
                                });

                    } else {
                        throw new Error('Erreur lors de la suppression');
                    }
                } catch (error) {
                    Swal.fire("Erreur", "La suppression a échoué" + error);
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
                    <h4 class="modal-title" id="myModalLabel">Exécution de la maintenance curative du :
                        <span class="text-primary font-bold">
                            {{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($periode) }}
                        </span>
                    </h4>
                </div>

                <div class="modal-body">
                    <form role="form" method="post">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" id="idMC" name="idMC" value="{{ $periode }}" />
                        <label id="infomaintenance"></label>
                        <div class="row clearfix" id="other">
                            <div class="col-md-6">
                                <label for="periode">Période :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @php
                                            $allperiode = App\Providers\InterfaceServiceProvider::getallmaintenacecurative();
                                        @endphp
                                        <select type="text" id="periode" name="periode" class="form-control">
                                            @forelse ($allperiode as $itemPeriode)
                                                <option value="{{ $itemPeriode->id }}"
                                                    @if ($itemPeriode->id == $periode) @selected(true) @else @disabled(true) @endif>
                                                    {{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($itemPeriode->id) }}
                                                </option>
                                            @empty
                                                <option disabled>Aucune option n'est disponible</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="ordinateur">Outils :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @php
                                            $allordinateur = App\Providers\InterfaceServiceProvider::getordinateur();
                                        @endphp
                                        <select id="ordinateur" name="ordinateur" class="form-control">
                                            <option value="0">Sélectionner un outil</option>
                                            @foreach ($allordinateur as $ordinateur)
                                                <option value="{{ $ordinateur->id }}"> {{ $ordinateur->nameoutils }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="etat">Etat :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id="etat" name="etat" class="form-control">
                                            <option value="Excellent" {{ $etat === 'Excellent' ? 'selected' : '' }}>
                                                Excellent
                                            </option>
                                            <option value="Bien" {{ $etat === 'Bien' ? 'selected' : '' }}>Bien</option>
                                            <option value="Défaillant" {{ $etat === 'Défaillant' ? 'selected' : '' }}>
                                                Défaillant</option>
                                            <option value="Très Bien" {{ $etat === 'Très Bien' ? 'selected' : '' }}>Très
                                                Bien
                                            </option>
                                            <option value="Passable" {{ $etat === 'Passable' ? 'selected' : '' }}>Passable
                                            </option>
                                            <option value="Médiocre" {{ $etat === 'Médiocre' ? 'selected' : '' }}>Médiocre
                                            </option>
                                            <option value="Autres" {{ $etat === 'Autres' ? 'selected' : '' }}>Autres
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="obs">Observation :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="obs" name="obs" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="acteff">Action effectuer :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="acteff" name="acteff" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="validemaintenance()" class="btn bg-deep-orange waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletemaintenance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Suppression : </h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="iddelete" name="iddelete" />
                    <label id="infodelete"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="validedeletemaintenance()" class="btn bg-deep-red waves-effect">SUPPRIMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Détails :</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Date d'exécution :</strong></label>
                                <p id="dates"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Outil :</strong></label>
                                <p id="outild"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Action effectuer :</strong></label>
                                <p id="actn"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Avis Technicien :</strong></label>
                                <p id="aviinf"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification : </h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idupdates" name="idupdates" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label id="uperiode"></label>
                        </div>
                        <div class="col-md-6">
                            <label id="uordinateur"></label>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="uuetat">Etat :</label>
                            <div class="form-group">
                                <div class="form-line" id="uetat">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="uobs">Observation :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="uobs" name="uobs" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="uacteff">Action effectuer :</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="uacteff" name="uacteff" class="form-control"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideupdatemaintenance()" class="btn bg-deep-orange waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>
@endsection
