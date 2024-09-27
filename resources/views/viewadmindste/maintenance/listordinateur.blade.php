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
                <a href="{{ route('GMPC') }}"> Maintenances </a> \ Exécution
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Exécution de la maintenance préventive
                            @if ($existe == 0)
                                <button type="button"
                                    style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                    class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                    data-target="#add">Exécuter</button>
                            @endif
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Période</th>
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
                                                {{ App\Providers\InterfaceServiceProvider::periodeMaintenance($maint->maintenance) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::getUserOutil($maint->outil) }}
                                            </td>
                                            <td>{{ $maint->commentaireuser }}</td>
                                            <td>{{ $maint->avisuser }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleUser($maint->action) }}
                                            </td>
                                            <td>{{ $maint->etat }}</td>
                                            <td>{{ $maint->commentaireinf }}</td>
                                            <td class="d-flex justify-content-between align-items-center">

                                                @if (in_array('print_maint_admin_pdf', session('auto_action')))
                                                    <a href="{{ route('GEMP', $maint->id) }}" onClick="" type="button"
                                                        title="PDF"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z" />
                                                            <path fill="currentColor"
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                @if (in_array('detail_maint_admin', session('auto_action')))
                                                    <button type="button" title="Détails"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#detail"
                                                        onclick="setdetailmaintenance('{{ $maint->detailjson }}')">
                                                        <i class="material-icons">book</i></a>
                                                    </button>
                                                @endif
                                                @if (in_array('update_maint_admin', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#update"
                                                        onclick="setupdatemaintenance({{ $maint->id }}, '{{ $maint->detailjson }}', '{{ App\Providers\InterfaceServiceProvider::periodeMaintenance($maint->maintenance) }}', '{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}', '{{ $maint->etat }}', '{{ $maint->commentaireinf }}')">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </button>
                                                @endif

                                                @if (in_array('delete_maint_admin', session('auto_action')))
                                                    <button type="button" title="Supprimer"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $maint->id }}"
                                                        onclick="Delete(event, '{{ route('DMU') }}','{{ App\Providers\InterfaceServiceProvider::periodeMaintenance($maint->maintenance) }} au {{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <i class="material-icons">delete_sweep</i></a> </button>
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

            document.getElementById('infomaintenance').innerHTML = "";

            maint = "";

            chks = document.getElementsByName('maint');
            for (var checkbox of chks) {
                if (checkbox.checked) {
                    maint += "|" + checkbox.value;
                }
            }

            if (periode == 0 || ordinateur == 0)
                if (periode == 0) {
                    document.getElementById('infomaintenance').innerHTML +=
                        "<div class='alert alert-danger alert-block'>Veuillez sélectionner la période de maintenance.. </div>";
                }
            if (ordinateur == 0) {
                document.getElementById('infomaintenance').innerHTML +=
                    "<div class='alert alert-danger alert-block'>Veuillez sélectionner l'ordinateur pour lequel la maintenance sera effectuée.. </div>";
            } else {
                dat = {
                    _token: token,
                    periode: periode,
                    ordinateur: ordinateur,
                    etat: etat,
                    maint: maint,
                    obs: obs
                };

                document.getElementById("infomaintenance").innerHTML =
                    '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

                // En cours d'envoie
                try {
                    let response = await fetch("{{ route('SMU') }}", {
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

        async function setdeletemaintenance(id, periode, outil) {
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer " + outil +
                " de la période " + periode + " ?";
            document.getElementById('iddelete').value = id;
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
                let response = await fetch("{{ route('DMU') }}", {
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
                    document.getElementById("infodelete").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                } else {
                    document.getElementById("infodelete").innerHTML =
                        '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                document.getElementById("infodelete").innerHTML = error;
            }
        }

        function setdetailmaintenance(maint) {
            tab = maint.split("|");
            if (tab.includes("sft"))
                document.getElementById("dsft").checked = true;
            if (tab.includes("mjw"))
                document.getElementById("dmjw").checked = true;
            if (tab.includes("dfg"))
                document.getElementById("ddfg").checked = true;
            if (tab.includes("rdd"))
                document.getElementById("drdd").checked = true;
            if (tab.includes("edd"))
                document.getElementById("dedd").checked = true;
            if (tab.includes("epdd"))
                document.getElementById("depdd").checked = true;
            if (tab.includes("atv"))
                document.getElementById("datv").checked = true;
            if (tab.includes("duc"))
                document.getElementById("dduc").checked = true;
            if (tab.includes("dram"))
                document.getElementById("ddram").checked = true;
            if (tab.includes("dcs"))
                document.getElementById("ddcs").checked = true;
            if (tab.includes("decr"))
                document.getElementById("ddecr").checked = true;
            if (tab.includes("bkpi"))
                document.getElementById("dbkpi").checked = true;
            if (tab.includes("bkpe"))
                document.getElementById("dbkpe").checked = true;
        }

        async function setupdatemaintenance(id, maint, periode, outil, etat, commentaire) {
            document.getElementById('idupdate').value = id;
            document.getElementById('uobs').value = commentaire;
            tab = maint.split("|");
            if (tab.includes("sft"))
                document.getElementById("usft").checked = true;
            if (tab.includes("mjw"))
                document.getElementById("umjw").checked = true;
            if (tab.includes("dfg"))
                document.getElementById("udfg").checked = true;
            if (tab.includes("rdd"))
                document.getElementById("urdd").checked = true;
            if (tab.includes("edd"))
                document.getElementById("uedd").checked = true;
            if (tab.includes("epdd"))
                document.getElementById("uepdd").checked = true;
            if (tab.includes("atv"))
                document.getElementById("uatv").checked = true;
            if (tab.includes("duc"))
                document.getElementById("uduc").checked = true;
            if (tab.includes("dram"))
                document.getElementById("udram").checked = true;
            if (tab.includes("dcs"))
                document.getElementById("udcs").checked = true;
            if (tab.includes("decr"))
                document.getElementById("udecr").checked = true;
            if (tab.includes("bkpi"))
                document.getElementById("ubkpi").checked = true;
            if (tab.includes("bkpe"))
                document.getElementById("ubkpe").checked = true;

            document.getElementById('uperiode').innerHTML = 'Période : ' + periode;

            document.getElementById('uordinateur').innerHTML = 'Ordinateur : ' + outil;

            document.getElementById('uetat').innerHTML =
                '<select type="text" id="uuetat" name="etat" class="form-control"> <option> ' + etat +
                ' </option> <option> Excellent </option><option> Bien </option><option> Passable </option> <option> Médiocre </option> </select>';
        }

        async function valideupdatemaintenance() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            etat = document.getElementById("uuetat").value;
            obs = document.getElementById("uobs").value;
            id = document.getElementById("idupdate").value;

            maint = "";

            chks = document.getElementsByName('umaint');
            for (var checkbox of chks) {
                if (checkbox.checked) {
                    maint += "|" + checkbox.value;
                }
            }

            dat = {
                _token: token,
                id: id,
                etat: etat,
                maint: maint,
                obs: obs
            };

            document.getElementById("infoupdate").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('SUMU') }}", {
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
            console.log(token + iddelete);

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

        async function selecteOutils(event,params) {
            event.preventDefault();
            var selectedOutilsId = params;
            console.log(selectedOutilsId);
            
            // Masquer toutes les listes d'actions
            document.querySelectorAll('.actions-list').forEach(function(list) {
                list.classList.add('hidden');
            });
            
            // Afficher la liste d'actions correspondant a l'outils sélectionné
            var selectedActionsList = document.querySelector('.actions-list[data-outils-id="' + selectedOutilsId +
            '"]');
            if (selectedActionsList) {
                console.log(selectedActionsList);
                selectedActionsList.classList.remove('hidden');
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
                    <h4 class="modal-title" id="myModalLabel">Exécution de le maintenance du :
                        <span class="text-primary font-bold">
                            {{ App\Providers\InterfaceServiceProvider::periodeMaintenance($periode) }}
                        </span>
                    </h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infomaintenance"></label>
                    <div class="row clearfix" id="other">
                        <div class="col-md-6">
                            <label for="periode">Période :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $allperiode = App\Providers\InterfaceServiceProvider::getallperiode();
                                    @endphp
                                    <select type="text" id="periode" name="periode" class="form-control">
                                        @forelse ($allperiode as $itemPeriode)
                                            <option value="{{ $itemPeriode->id }}"
                                                @if ($itemPeriode->id == $periode) @selected(true) @else @disabled(true) @endif>
                                                {{ App\Providers\InterfaceServiceProvider::periodeMaintenance($itemPeriode->id) }}
                                            </option>
                                        @empty
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
                                    <select id="ordinateur" onchange="selecteOutils(event,this.value)" name="ordinateur"
                                        class="form-control">
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
                                    <select type="text" id="etat" name="etat" class="form-control">
                                        <option> Excellent </option>
                                        <option> Bien </option>
                                        <option> Passable </option>
                                        <option> Médiocre </option>
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
                    </div>
                    <!-- Affichage des actions basées sur l'outils sélectionné -->
                    <div class="row clearfix">
                        @php
                            $allordinateur = App\Providers\InterfaceServiceProvider::getordinateur();
                        @endphp
                        <div class="col-md-6 actions-list hidden" data-outils-id="6">
                            
                        </div>
                        <div class="col-md-6 actions-list hidden" data-outils-id="2">
                            <input type="checkbox" id="duc" name="maint" value="duc"
                                class="filled-in chk-col-brown" />
                            <label for="duc">Dépoussièrer Unité Centrale</label> <br>
                            <input type="checkbox" id="dram" name="maint" value="dram"
                                class="filled-in chk-col-brown" />
                            <label for="dram">Dépoussièrer RAM</label> <br>
                            <input type="checkbox" id="dcs" value="dcs" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="dcs">Dépoussièrer Clavier/Souris</label> <br>
                            <input type="checkbox" id="decr" value="decr" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="decr">Dépoussièrer Ecran</label> <br>
                            <input type="checkbox" id="bkpi" value="bkpi" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="bkpi">Backup interne </label> <br>
                            <input type="checkbox" id="bkpe" value="bkpe" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="bkpe">Backup externe </label> <br>
                        </div>
                    </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Détails : </h4>
                </div>

                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <input type="checkbox" id="dsft" name="maint" value="dsft"
                                class="filled-in chk-col-brown" />
                            <label for="dsft">Suppression des fichiers temporaire</label> <br>
                            <input type="checkbox" id="dmjw" name="maint" value="dmjw"
                                class="filled-in chk-col-brown" />
                            <label for="dmjw">Mise à jour Windows</label> <br>
                            <input type="checkbox" id="ddfg" name="maint" value="ddfg"
                                class="filled-in chk-col-brown" />
                            <label for="ddfg">Défragmentation</label> <br>
                            <input type="checkbox" id="drdd" name="maint" value="drdd"
                                class="filled-in chk-col-brown" />
                            <label for="drdd">Réparation des disques</label> <br>
                            <input type="checkbox" id="dedd" name="maint" value="dedd"
                                class="filled-in chk-col-brown" />
                            <label for="dedd">Etat de disque</label> <br>
                            <input type="checkbox" id="depdd" name="maint" value="depdd"
                                class="filled-in chk-col-brown" />
                            <label for="depdd">Espace de disque</label> <br>
                            <input type="checkbox" id="datv" value="datv" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="datv">Antivirus</label> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="checkbox" id="dduc" name="maint" value="dduc"
                                class="filled-in chk-col-brown" />
                            <label for="dduc">Dépoussièrer Unité Centrale</label> <br>
                            <input type="checkbox" id="ddram" name="maint" value="ddram"
                                class="filled-in chk-col-brown" />
                            <label for="ddram">Dépoussièrer RAM</label> <br>
                            <input type="checkbox" id="ddcs" value="ddcs" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="ddcs">Dépoussièrer Clavier/Souris</label> <br>
                            <input type="checkbox" id="ddecr" value="ddecr" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="ddecr">Dépoussièrer Ecran</label> <br>
                            <input type="checkbox" id="dbkpi" value="dbkpi" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="dbkpi">Backup interne </label> <br>
                            <input type="checkbox" id="dbkpe" value="dbkpe" name="maint"
                                class="filled-in chk-col-brown" />
                            <label for="dbkpe">Backup externe </label> <br>
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
                    <input type="hidden" id="idupdate" name="idupdate" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix" id="other">
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
                                    <input type="text" id="uobs" name="obs" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <input type="checkbox" id="usft" name="umaint" value="sft"
                                class="filled-in chk-col-brown" />
                            <label for="usft">Suppression des fichiers temporaire</label> <br>
                            <input type="checkbox" id="umjw" name="umaint" value="mjw"
                                class="filled-in chk-col-brown" />
                            <label for="umjw">Mise à jour Windows</label> <br>
                            <input type="checkbox" id="udfg" name="umaint" value="dfg"
                                class="filled-in chk-col-brown" />
                            <label for="udfg">Défragmentation</label> <br>
                            <input type="checkbox" id="urdd" name="umaint" value="rdd"
                                class="filled-in chk-col-brown" />
                            <label for="urdd">Réparation des disques</label> <br>
                            <input type="checkbox" id="uedd" name="umaint" value="edd"
                                class="filled-in chk-col-brown" />
                            <label for="uedd">Etat de disque</label> <br>
                            <input type="checkbox" id="uepdd" name="umaint" value="epdd"
                                class="filled-in chk-col-brown" />
                            <label for="uepdd">Espace de disque</label> <br>
                            <input type="checkbox" id="uatv" value="atv" name="umaint"
                                class="filled-in chk-col-brown" />
                            <label for="uatv">Antivirus</label> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="checkbox" id="uduc" name="umaint" value="duc"
                                class="filled-in chk-col-brown" />
                            <label for="uduc">Dépoussièrer Unité Centrale</label> <br>
                            <input type="checkbox" id="udram" name="umaint" value="dram"
                                class="filled-in chk-col-brown" />
                            <label for="udram">Dépoussièrer RAM</label> <br>
                            <input type="checkbox" id="udcs" value="dcs" name="umaint"
                                class="filled-in chk-col-brown" />
                            <label for="udcs">Dépoussièrer Clavier/Souris</label> <br>
                            <input type="checkbox" id="udecr" value="decr" name="umaint"
                                class="filled-in chk-col-brown" />
                            <label for="udecr">Dépoussièrer Ecran</label> <br>
                            <input type="checkbox" id="ubkpi" value="bkpi" name="umaint"
                                class="filled-in chk-col-brown" />
                            <label for="ubkpi">Backup interne </label> <br>
                            <input type="checkbox" id="ubkpe" value="bkpe" name="umaint"
                                class="filled-in chk-col-brown" />
                            <label for="ubkpe">Backup externe </label> <br>
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
