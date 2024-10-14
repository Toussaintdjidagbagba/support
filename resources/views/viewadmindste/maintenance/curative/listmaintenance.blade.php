@extends('templatedste._temp')

@section('css')
    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="cssdste/css/jquery.signature.css" rel="stylesheet" />
    <style type="text/css">
        #sig canvas {
            width: 100% !important;
            height: auto;
        }

        .kbw-signature {
            width: 400px;
            height: 200px;
        }
    </style>
@endsection

@section('js')
    <script src="cssdste/js/jquery.signature.min.js"></script>
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
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="header" style="padding: 0; border-radius: 0;" role="tab" id="headingOne">
                            <div role="button" class="filter-toggle" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="filter-content">
                                    <i class="material-icons">folder_open</i>
                                    <span class="filter-text">Filtre</span>
                                </div>
                                <i class="material-icons chevron-icon">expand_more</i>
                            </div>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="body">
                                <form role="form">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <label for="periodedebut_r">Du :</label>
                                                <div class="form-line">
                                                    <input type="date" name="periodedebut_r" id="periodedebut_r"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="technicien_r">Technicien :</label>
                                                <div class="form-line">
                                                    <input type="search" name="technicien_r" id="technicien_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="cause_r">Cause :</label>
                                                <div class="form-line">
                                                    <input type="search" name="cause_r" id="cause_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <label for="avisinf_r">Avis Technicien :</label>
                                                <div class="form-line">
                                                    <input type="search" name="avisinf_r" id="avisinf_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <label for="periodefin_r"> à :</label>
                                                <div class="form-line">
                                                    <input type="time" name="periodefin_r" id="periodefin_r"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="etat_r">Etat :</label>
                                                <div class="form-line">
                                                    <input type="search" name="etat_r" id="etat_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="outil_r">Outils :</label>
                                                <div class="form-line">
                                                    <input type="search" name="outil_r" id="outil_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <label for="avis_r">Avis utilisateur :</label>
                                                <div class="form-line">
                                                    <input type="search" name="avis_r" id="avis_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button onclick="searchButton(event)"
                                                class="btn btn-info btn-md">Rechercher</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button type="button" class="btn btn-danger"
                                            style="margin-left: 25px; margin-bottom: 0px;"
                                            onclick="paramrech('pdf')">PDF</button>
                                        <button type="button" class="btn btn-success"
                                            style="margin-left: 25px; margin-bottom: 0px;"
                                            onclick="paramrech('xlsx')">XLSX</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Maintenance curatives
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Période</th>
                                        <th data-priority="1">Outils</th>
                                        <th data-priority="1">Obs. Utilisateur</th>
                                        <th data-priority="1">Avis</th>
                                        <th data-priority="1">Technicien</th>
                                        <th data-priority="1">Etat</th>
                                        <th data-priority="1">Obs. Inf.</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyMC">

                                </tbody>

                                {{-- <tbody>
                                    @forelse($list as $maint)
                                        <tr>
                                            <td>{{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}
                                            </td>
                                            <td>{{ $maint->commentaireuser }}</td>
                                            <td>{{ $maint->avisuser }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleUser($maint->action) }}
                                            </td>
                                            <td>{{ $maint->etat }}</td>
                                            <td>{{ $maint->commentaireinf }}</td>
                                            <td>
                                                @if (in_array('detail_maint_user', session('auto_action')))
                                                    <button type="button" title="Signature"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#signature"
                                                        onclick="setdetailmaintenance('{{ $maint->detailjson }}')">
                                                        <i class="material-icons">book</i></a>
                                                    </button>
                                                @endif

                                                @if (in_array('print_maint_pdf', session('auto_action')))
                                                    <button onclick="getmaintgcur(event,'pdf')"
                                                        data-Id="{{ $maint->gestion_id }}" type="button" title="PDF"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.
                                                                            171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2
                                                                            0-.33.018-.407.036v2.61c.077.018.201
                                                                            .018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z" />
                                                            <path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0
                                                                            2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0
                                                                            1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106
                                                                            1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807
                                                                            1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947
                                                                            7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0
                                                                            .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.
                                                                            604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                                @if (in_array('detail_maint_user', session('auto_action')))
                                                    <button type="button" title="Détails"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#detail"
                                                        onclick="setdetailmaintenance(event,
                                                        '{{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }}',
                                                        '{{ App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil) }}',
                                                        '{{ $maint->action_effectuer }}',
                                                        '{{ $maint->commentaireinf }}',
                                                        '{{ $maint->avisinf }}')">
                                                        >
                                                        <i class="material-icons">book</i></a>
                                                    </button>
                                                @endif
                                                @if (in_array('comment_maint_user', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#avis"
                                                        onclick="getid({{ $maint->gestion_id }})">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <center>Pas de maintenance enregistrer!!!</center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody> --}}
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="cssdste/js/jquery.signature.min.js"></script>
    <script type="text/javascript">
        const sessionDetailMaint = "{{ in_array('detail_maint_user', session('auto_action')) }}";
        const sessionPdfMaint = "{{ in_array('print_maint_pdf', session('auto_action')) }}";
        const sessionCommtMaint = "{{ in_array('comment_maint_user', session('auto_action')) }}";

        function setdetailmaintenance(event, periode, outil, action, avisinf) {
            event.preventDefault();
                      document.getElementById('dates').innerHTML = periode;
            document.getElementById('outild').innerHTML = outil;
            document.getElementById('aviinf').innerHTML = avisinf;
            document.getElementById('actn').innerHTML = action;
        }

        function getid(id) {            
            document.getElementById("anoid").value = id;
        }

        function ouisuggestion() {
            sug = document.getElementsByName('sug');
            test = "";
            for (i = 0; i < sug.length; i++) {
                if (sug[i].checked)
                    test = sug[i].value;
            }
            if (test == "OUI") {
                document.getElementById("ouisug").style.display = "block";
            }
            if (test == "NON") {
                document.getElementById("ouisug").style.display = "none";
            }
        }

        async function validavis() {
            token = document.getElementById("_token").value;
            anormalieid = document.getElementById("anoid").value;
            avis = document.getElementsByName('avis');
            libsub = "";
            if (document.getElementById("libsub") == null)
                libsub = "";
            else
                libsub = document.getElementById("libsub").value;
            lib = "";
            for (i = 0; i < avis.length; i++) {
                if (avis[i].checked)
                    lib = avis[i].value;
            }

            try {
                let response = await fetch("{{ route('CMU') }}?_token=" + token + "&anormalieid=" + anormalieid +
                    "&avis=" + lib + "&libsub=" + libsub, {
                        method: 'GET',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                    });
                let html = "";
                if (response.status == 200) {
                    data = await response.text();
                    suc = JSON.parse(data).success;
                    infos = JSON.parse(data).data;

                    if (suc == true) {
                        html +=
                            '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                            infos + '</strong></div>';
                        document.getElementById("datacomment").innerHTML = html;
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    } else {
                        html +=
                            '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                            infos + '</strong></div>';
                        document.getElementById("datacomment").innerHTML = html;
                    }
                } else {
                    document.getElementById("datacomment").innerHTML =
                        '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong> Une erreur est survenir. Actualiser la page et revenir. </strong></div>';
                }
            } catch (error) {
                document.getElementById("datacomment").innerHTML =
                    '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong> Une erreur est survenir. Veuillez connectez le service informatique. </strong></div>';
            }
        }

        // var sig = document.getElementById('sig').signature();

        // $('#clear').click(function() {
        //     sig.signature('clear');
        // });

        function getmaintgcur(event, format) {
            event.preventDefault();
            var dataT = event.currentTarget;

            var idmcur = dataT.getAttribute('data-Id') ?? "";
            console.log(idmcur);

            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('export.maintecur') }}';

            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'idmcur';
            inputId.value = idmcur;
            form.appendChild(inputId);

            var inputFormat = document.createElement('input');
            inputFormat.type = 'hidden';
            inputFormat.name = 'format';
            inputFormat.value = format;
            form.appendChild(inputFormat);

            document.body.appendChild(form);
            form.submit();
        }

        window.onload = function() {
            recupListMC();
        };

        async function recupListMC() {
            console.log("Toutes les ressources de la page sont chargées, la fonction est exécutée.");

            try {
                let response = await fetch("{{ route('LMCDATA') }}", {
                    method: 'GET',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });

                if (response.status == 200) {
                    if (!response.ok) {
                        throw new Error("Erreur lors de la récupération des données: " + response.status);
                    }

                    data = await response.json();
                    afficherDonnees(data.list);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
        }

        function afficherDonnees(list) {
            const tbody = document.getElementById('tbodyMC');
            tbody.innerHTML = '';

            if (list.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9"><center>Pas de maintenance enregistrer!!!</center></td></tr>`;
                return;
            }

            list.forEach((currentline, index, arry) => {
                const contenu = '<tr>' +
                    '<th><span class="co-name">' + currentline["periode"] + '</span></th>' +
                    '<td>' + currentline["nameoutils"] + '</td>' +
                    '<td>' + currentline["commentaireuser"] + '</td>' +
                    '<td>' + currentline["avisuser"] + '</td>' +
                    '<td>' + currentline["usersL"] + '</td>' +
                    '<td>' + currentline["etat"] + '</td>' +
                    '<td>' + currentline["commentaireinf"] + '</td>' +
                    '<td class="d-flex justify-content-between align-items-center">' +
                    (sessionDetailMaint ?
                        '<button type="button" title="Signature" data-toggle="modal" data-target="#signature" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        'onClick="setdetailmaintenance(event,\'' + currentline["gestion_id"] + '\')">' +
                        '<i class="material-icons">book</i>' +
                        '</button>' :
                        '') +
                    (sessionDetailMaint ?
                        '<button type="button" title="Détails" data-toggle="modal" data-target="#detail" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        'onClick="setdetailmaintenance(event, \'' + currentline["periode"] + '\', \'' + currentline["nameoutils"] + '\', \'' + currentline["action_effectuer"] + '\', \'' + currentline["avisinf"] + '\')">' +
                        '<i class="material-icons">book</i>' +
                        '</button>' :
                        '') + 
                    (sessionCommtMaint ?
                        '<button type="button" title="Modifier" data-toggle="modal" data-target="#avis" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        'onClick="getid(\'' + currentline["gestion_id"] + '\')">' +
                        '<i class="material-icons">system_update_alt</i>' +
                        '</button>' :
                        '') +
                    (sessionPdfMaint ?
                        '<button type="button" title="PDF" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        'onclick="getmaintgcur(event, \'pdf\')" data-Id="' + currentline["gestion_id"] + '">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">' +
                        '<path fill="currentColor" d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z" />' +
                        '<path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z" />' +
                        '</svg>' +
                        '</button>' :
                        '') +
                    '</td>' +
                    '</tr>';
                tbody.innerHTML += contenu;
            });
        }

        async function searchButton(event) {
            event.preventDefault();
            const periodedebut = document.getElementById('periodedebut_r').value;
            const periodefin = document.getElementById('periodefin_r').value;
            const technicien = document.getElementById('technicien_r').value;
            const outil = document.getElementById('outil_r').value;
            const avisinf = document.getElementById('avisinf_r').value;
            const cause = document.getElementById('cause_r').value;
            const avis = document.getElementById('avis_r').value;

            const params = new URLSearchParams({
                periodedebut: periodedebut,
                technicien: technicien,
                outil: outil,
                periodefin: periodefin,
                etat: etat,
                cause: cause,
                avisinf: avisinf,
                avis: avis,
            }).toString();

            try {
                let response = await fetch("{{ route('GMCDATA') }}?" + params, {
                    method: 'GET',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });

                if (response.status == 200) {
                    if (!response.ok) {
                        throw new Error("Erreur lors de la récupération des données: " + response.status);
                    }
                    let data = await response.json();
                    Gliste = data.list;
                    afficherDonnees(data.list);
                } else {
                    throw new Error("Erreur lors de la récupération des données: " + response.status);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
        }
    </script>
@endsection

@section('model')
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

    <div class="modal fade" id="avis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Comment avez-vous trouvé la maintenance ? </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="anoid" id="anoid" value="" />
                    <div class="row clearfix">
                        <div class="col-md-12" id="datacomment">
                        </div>
                        <div class="col-md-12">
                            <label for="mod">AVIS : </label>
                            <div class="form-group">
                                <input type="radio" name="avis" id="excellent" value="Excellent" class="with-gap">
                                <label for="excellent">Excellent</label>

                                <input type="radio" name="avis" id="bien" value="Bien" class="with-gap">
                                <label for="bien" class="m-l-20">Bien</label>

                                <input type="radio" name="avis" id="passable" value="Passable" class="with-gap">
                                <label for="passable" class="m-l-20">Passable</label>

                                <input type="radio" name="avis" id="mediocre" value="Médiocre" class="with-gap">
                                <label for="mediocre" class="m-l-20">Médiocre</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="sb">Avez-vous des suggestions ou besoins ? </label>
                            <div class="form-group">
                                <input type="radio" onclick="ouisuggestion()" name="sug" id="oui"
                                    value="OUI" class="with-gap">
                                <label for="oui">OUI</label>

                                <input type="radio" onclick="ouisuggestion()" name="sug" id="non"
                                    value="NON" class="with-gap">
                                <label for="non" class="m-l-20">NON</label>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix" id="ouisug" style="display:none">
                        <div class="col-md-12">
                            <label for="sub">Suggestions ou besoins : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" id="libsub" name="libsub" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <a onclick="validavis()" class="btn bg-deep-orange waves-effect">VALIDER</a>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Signature : </h4>
                </div>

                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <br />
                            <div id="sig" style="width:100%; height: 100px;"></div>
                            <br />
                            <button id="clear">Effacer Signature</button>
                            <textarea class="form-control" id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <a onclick="validavis()" class="btn bg-deep-orange waves-effect">VALIDER</a>
                </div>
            </div>
        </div>
    </div>
@endsection
