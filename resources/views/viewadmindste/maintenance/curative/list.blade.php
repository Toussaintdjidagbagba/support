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
                Maintenances
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Gestion de la maintenance curative
                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">ENREGISTRER</button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Période</th>
                                        <th data-priority="1">Technicien</th>
                                        <th data-priority="1">Etat</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $maint)
                                        <tr>
                                            <td>
                                                Du
                                                {{ App\Providers\InterfaceServiceProvider::Dateformat($maint->periodedebut) }}
                                                au
                                                {{ App\Providers\InterfaceServiceProvider::Dateformat($maint->periodefin) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleUser($maint->user) }}</td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                <span>{{ $maint->etat }}</span>
                                                @if (in_array('define_etat_maint', session('auto_action')))
                                                    <button type="button" title="Etat"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#etatmaintenance"
                                                        onclick="setetatmaintenance({{ $maint->id }}, '{{ $maint->periodedebut }} au {{ $maint->periodefin }}')">
                                                        <i class="material-icons">gps_fixed</i></a> </button>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">

                                                @if (in_array('etat_pdf_maint_global', session('auto_action')))
                                                    <button type="button" title="PDF"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z" />
                                                            <path fill="currentColor"
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                                @if (in_array('etat_excel_maint_global', session('auto_action')))
                                                    <button type="button" title="EXCEL"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        onClick="javascript:window.open('{{ route('EMPC') }}?id={{ $maint->id }}');">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6m1.8 18H14l-2-3.4l-2 3.4H8.2l2.9-4.5L8.2 11H10l2 3.4l2-3.4h1.8l-2.9 4.5l2.9 4.5M13 9V3.5L18.5 9H13Z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                                @if (in_array('see_detail_maint', session('auto_action')))
                                                    <button type="button" title="Liste"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        onClick="javascript:window.open('{{ route('GDMC') }}?id={{ $maint->id }}');">
                                                        <i class="material-icons">list</i></a>
                                                    </button>
                                                @endif
                                                @if (in_array('update_maint_prog', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#update"
                                                        onclick="setupdatemaintenance({{ $maint->id }}, '{{ $maint->resultat }}','{{ $maint->diagnostique }}','{{ $maint->cause }}','{{ $maint->periodedebut }}', '{{ $maint->periodefin }}', {{ $maint->user }}, '{{ App\Providers\InterfaceServiceProvider::LibelleUser($maint->user) }}')">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </button>
                                                @endif

                                                @if (in_array('delete_maint_prog', session('auto_action')))
                                                    <button type="button" title="Supprimer"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $maint->id }}"
                                                        onclick="Delete(event, '{{ route('DMCR') }}','{{ App\Providers\InterfaceServiceProvider::Dateformat($maint->periodedebut) }} au {{ App\Providers\InterfaceServiceProvider::Dateformat($maint->periodefin) }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <i class="material-icons">delete_sweep</i></a> </button>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
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
        async function validemaintenancecurative() {
            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            pdm = document.getElementById("pdm").value;
            pfm = document.getElementById("pfm").value;
            techm = document.getElementById("techm").value;
            dgnt = document.getElementById("dgnt").value;
            cse = document.getElementById("cse").value;
            rslt = document.getElementById("rslt").value;
            ucm = document.getElementById("ucm").value;
            cm = document.getElementById("cm").value;
            formData = document.getElementById("formData");

            console.log(ucm);
            
            let erreur = "";
            if (pdm === "") {
                erreur += "définir la temps de début pour gérer la maintenance.. \n";
            }
            if (pfm === "") {
                erreur += "définir la temps de de fin pour gérer la maintenance.. \n";
            }
            if (dgnt === "") {
                erreur += "renseigner le diagnostique pour la maintenance.. \n";
            }
            if (cse === "") {
                erreur += "renseigner la cause pour la maintenance.. \n";
            }
            if (rslt === "") {
                erreur += "renseigner le resultat pour la maintenance.. \n";
            }
            if (techm == 0) {
                erreur += "sélectionner un technicien pour gérer la maintenance.. .\n";
            }

            if (erreur !== "") {
                document.getElementById('infomaintenance').innerHTML =
                    "<div class='alert alert-danger alert-block'> Veuillez : " + erreur + "</div>";
            } else {
                dat = {
                    _token: token,
                    pdm: pdm,
                    pfm: pfm,
                    techm: techm,
                    ucm: ucm,
                    dgnt: dgnt,
                    cse: cse,
                    rslt: rslt,
                };
                document.getElementById("infomaintenance").innerHTML =
                    '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

                // En cours d'envoie
                try {
                    let response = await fetch("{{ route('ADDMC') }}", {
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
                        if (response.erreur) {
                            document.getElementById("infomaintenance").innerHTML =
                                '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                        } else {
                            document.getElementById("infomaintenance").innerHTML =
                                '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                                data + '</strong></div>';
                            setTimeout(function() {
                                window.location.href = "{{ route('GMC') }}";
                            }, 3000);
                        }

                    } else {
                        document.getElementById("infomaintenance").innerHTML =
                            '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                    }
                } catch (error) {
                    document.getElementById("infomaintenance").innerHTML = error;
                }
            }
        }

        function setetatmaintenance(id, periode) {
            document.getElementById('infoetat').innerHTML = "Modification de l'état de " + periode + " :";
            document.getElementById('idetat').value = id;
        }

        async function valideetatmaintenance() {
            token = document.getElementById("_token").value;
            idetat = document.getElementById("idetat").value;
            etatselect = document.getElementById("etatselect").value;
            commentmaintenance = document.getElementById("commentmaintenance").value;

            dat = {
                _token: token,
                id: idetat,
                etat: etatselect,
                commentaire: commentmaintenance,
            };
            document.getElementById("infoetat").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            try {
                let response = await fetch("{{ route('DEMC') }}", {
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
                    document.getElementById("infoetat").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                } else {
                    document.getElementById("infoetat").innerHTML =
                        '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                document.getElementById("infoetat").innerHTML = error;
            }
        }

        async function setdeletemaintenance(id, periode) {
            document.getElementById('infodelete').innerHTML =
                "Vous voulez vraiment supprimer la période de la maintenance suivant : " + periode + " ?";
            document.getElementById('iddelete').value = id;
        }

        async function setupdatemaintenance(id,resultat,diagnostique,cause, periodedebut, periodefin, user, nameuser) {
            document.getElementById('idupdate').value = id;
            document.getElementById('pdmu').value = periodedebut;
            document.getElementById('pfmu').value = periodefin;
            document.getElementById('udgnt').value = diagnostique;
            document.getElementById('ucse').value = cause;
            document.getElementById('urslt').value = resultat;
            document.getElementById('ucma').innerHTML =
                "Utilisateur en charge : <br> Voulez-vous changer l'utilisateur actuel `" + nameuser +
            "` ? Si oui choisissez..";
        }

        async function valideupdatemaintenance() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            idupdate = document.getElementById("idupdate").value;
            pdm = document.getElementById("pdmu").value;
            pfm = document.getElementById("pfmu").value;
            udgnt = document.getElementById("udgnt").value;
            ucse = document.getElementById("ucse").value;
            urslt = document.getElementById("urslt").value;
            ucm = document.getElementById("ucmu").value;

            dat = {
                _token: token,
                pdm: pdm,
                pfm: pfm,
                ucm: ucm,
                udgnt: udgnt,
                ucse: ucse,
                urslt: urslt,
                id: idupdate,
            };
            document.getElementById("infoupdate").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('SUMC') }}", {
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

        async function validedeletemaintenance() {
            token = document.getElementById("_token").value;
            iddelete = document.getElementById("iddelete").value;

            inputs = document.getElementsByClassName('outilupdate');
            dat = {
                _token: token,
                id: iddelete,
            };
            document.getElementById("infodelete").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('DPC') }}", {
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(dat),
                });
                if (response.status == 200) {
                    data = await response.text();
                    document.getElementById("infodelete").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                } else {
                    document.getElementById("infodelete").innerHTML =
                        '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                console.log(error);
                document.getElementById("infodelete").innerHTML = error;
            }
        }

        async function Delete(event, url, periode) {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";
            console.log(iddelete);

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
                    <h4 class="modal-title" id="myModalLabel">Programmer une maintenance : </h4>
                </div>

                <div class="modal-body" id="formData">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infomaintenance"></label>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="dgnt">Diagnostique :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="dgnt" name="dgnt" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="pdm">Temps de début :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="pdm" name="pdm" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pfm">Temps d'arrêt :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="pfm" name="pfm" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="other">
                        <div class="col-md-6">
                            <label for="techm">Technicien :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $allUser = App\Providers\InterfaceServiceProvider::alladminandsuperadmin();
                                    @endphp
                                    <select type="text" id="techm" name="techm" class="form-control">
                                        <option value="0" selected disabled>Sélectionner un technicien</option>
                                        @foreach ($allUser as $user)
                                            <option value="{{ $user->idUser }}"> {{ $user->nom }} {{ $user->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ucm">Utilisateurs concernés :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $allUser = App\Providers\InterfaceServiceProvider::allutilisateurs();
                                    @endphp
                                    <select type="text" id="ucm" name="ucm" class="form-control"
                                        multiple="true">
                                        <option value="0" disabled>Sélectionner un ou plusieurs utilisateurs
                                        </option>
                                        @foreach ($allUser as $user)
                                            <option value="{{ $user->idUser }}"> {{ $user->nom }} {{ $user->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="cse">Cause :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="cse" name="cse" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="rslt">Resultat :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="rslt" name="rslt" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="cm">Contenu mail :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" id="cm" name="cm" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="validemaintenancecurative()" class="btn bg-deep-orange waves-effect">VALIDER</button>
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
                    <input type="hidden" id="idupdate" name="idupdate" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="udgnt">Diagnostique :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="udgnt" name="udgnt" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="pdmu">Temps de début :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="pdmu" name="pdmu" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pfmu">Temps d'arrêt :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="pfmu" name="pfmu" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="ucse">Cause :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ucse" name="ucse" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="urslt">Resultat :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="urslt" name="urslt" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="other">
                        <div class="col-md-12">
                            <label for="ucmu" id="ucma"></label>
                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $allUser = App\Providers\InterfaceServiceProvider::allutilisateursadmin();
                                    @endphp
                                    <select type="text" id="ucmu" name="ucmu" class="form-control">
                                        <option value="0">Sélectionner un administrateur</option>
                                        @foreach ($allUser as $user)
                                            <option value="{{ $user->idUser }}"> {{ $user->nom }} {{ $user->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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

    <div class="modal fade" id="etatmaintenance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Définition de l'état : </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idetat" name="idetat" />
                    <label id="infoetat"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="etatselect">Etat :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="etatselect" name="etatselect" class="form-control">
                                        <option>TRES BON</option>
                                        <option>BON</option>
                                        <option>MAUVAISE</option>
                                        <option>DEFAILLANT</option>
                                        <option>Autres</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="commentmaintenance">Commentaire :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="commentmaintenance" name="commentmaintenance"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideetatmaintenance()" class="btn bg-deep-red waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>
@endsection
