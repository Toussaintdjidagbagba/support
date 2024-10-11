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
                Catégories d'outils
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Liste des catégories

                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-toggle="modal"
                                data-target="#add">Ajouter</button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Libelle</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $cat)
                                        <tr>
                                            <td>
                                                {{ $cat->libelle }}
                                                <p style="text-align: right; font-size: 11px; color: #111111">Enregistré par
                                                    {{ App\Providers\InterfaceServiceProvider::LibelleUser($cat->action) }}
                                                </p>
                                            </td>
                                            <td>
                                                @if (in_array('update_cat_outil', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        onclick="avisupdate({{ $cat->id }}, '{{ $cat->libelle }}')"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#update">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </button>
                                                @endif

                                                @if (in_array('delete_cat_outil', session('auto_action')))
                                                    <button type="button" title="Supprimer"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $cat->id }}"
                                                        onclick="Delete(event, '{{ route('DCO') }}','{{ $cat->libelle }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        style="color:white;"><i
                                                            class="material-icons">delete_sweep</i></button>
                                                @endif

                                                @if (in_array('define_champ_cat_outil', session('auto_action')))
                                                    <button type="button" title="Définition"
                                                        onclick="avischamp({{ $cat->id }}, '{{ $cat->libelle }}')"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#carac">
                                                        <i class="material-icons">bookmark_add</i>
                                                    </button>
                                                @endif

                                                @if (in_array('define_champ_cat_outil', session('auto_action')))
                                                    <button type="button" title="Ajouter action"
                                                        data-id="{{ $cat->id }}" onclick="addactions(this)"
                                                        data-libelle="{{ $cat->libelle }}"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#addaction"> <i
                                                            class="material-icons">add</i></a>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <center>Pas de catégorie enregistrer!!!</center>
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
                title: 'Êtes-vous sûr de vouloir supprimer la catégorie <span class="text-danger">' + libelle +
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
        
        function avisupdate(ident, lib) {
            document.getElementById('infolib').value = lib;
            document.getElementById('idupdate').value = ident;
        }

        async function confirmeupdate() {
            token = document.getElementById("_token").value;
            infolib = document.getElementById("infolib").value;
            id = document.getElementById("idupdate").value;

            document.getElementById("infoupdate").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            try {
                let response = await fetch("{{ route('SCLO') }}?_token=" + token + "&id=" + id + "&lib=" + infolib, {
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                let html = "";
                if (response.status == 200) {
                    html = "";
                    data = await response.text();
                    document.getElementById("infoupdate").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);

                } else {
                    document.getElementById("infoupdate").innerHTML =
                        '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {

                html += "";
                console.log(error);
                document.getElementById("infoupdate").innerHTML = html;
            }

        }

        function avischamp(ident, lib) {
            document.getElementById('catcarac').innerHTML = lib;
            document.getElementById('idcarac').value = ident;
            getchampincategorie(ident);
        }

        async function confirmechamp() {
            token = document.getElementById("_token").value;
            caraclib = document.getElementById("caraclib").value;
            id = document.getElementById("idcarac").value;
            caractype = document.getElementById("caractype").value;

            // récupération des données 
            dat = {
                _token: token,
                id: id,
                lib: caraclib,
                type: caractype,
            };

            document.getElementById("infocarac").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('SCCLO') }}", {
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
                    document.getElementById("infocarac").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                    document.getElementById("caraclib").value = "";
                    getchampincategorie(id);
                } else {
                    document.getElementById("infocarac").innerHTML =
                        '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                console.log(error);
                document.getElementById("infocarac").innerHTML = error;
            }

        }

        async function getchampincategorie(id) {
            try {
                let response = await fetch("{{ route('GACIC') }}?champ=" + id, {
                    method: 'get',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                if (response.status == 200) {
                    data = await response.text();
                    contenu = "";
                    list = JSON.parse(data).data;
                    list.forEach(function(currentline, index, arry) {
                        contenu +=
                            '<label style="float:left; margin:10px; padding:10px; background:#c1cdcd; border-radius :10%; color:black;">';
                        contenu += currentline["libelle"];
                        contenu += '<br> <i style="color:blue" class="material-icons">system_update_alt</i>';
                        contenu += '<i  style="color:red; float:right" class="material-icons">delete_sweep</i>';
                        contenu += '</label>';
                    });

                    document.getElementById('allchampincategorie').innerHTML = contenu;
                } else {
                    return "";
                }
            } catch (error) {
                console.log(error);
                return "";
            }
        }

        function addactions(dvalue) {
            document.getElementById('infoaction').innerHTML = "";
            const outils = dvalue.getAttribute('data-libelle');
            const id = dvalue.getAttribute('data-id');
            document.getElementById('idcatoutils').value = id;
            document.getElementById('titleotil').innerHTML = outils;
            listaction(id);
        }

        async function listaction(id) {
            try {
                const response = await fetch(`{{ route('LCAO') }}?id=${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Access-Control-Allow-Credentials': true
                    }
                });
                const data = await response.json();

                if (data.length > 0) {
                    let lists = '<div class="row">';

                    data.forEach(function(currentline) {
                        lists += `
                        <span style="float:left; margin:10px; padding:10px; background:#c1cdcd; border-radius :10%; color:black; font-weight: bold; display: block;">
                    ${currentline.libelle ?? 'Aucune liste disponible'}
                </span>`;
                    });

                    lists += '</div>';

                    const selectedActionsList = document.getElementById('listsaction');
                    if (selectedActionsList) {
                        selectedActionsList.innerHTML = lists;
                    }
                } else {
                    const selectedActionsList = document.getElementById('listsaction');
                    if (selectedActionsList) {
                        selectedActionsList.innerHTML = `
            <span class="pull-left ml-2">
                Aucune action disponible pour cet outil.
            </span>`;
                    }
                }

            } catch (error) {

            }
        }

        async function valideaction(event) {
            event.preventDefault();

            let infoAction = document.getElementById('infoaction');
            var token = document.getElementById("_token").value;
            let idCatOutils = document.getElementById('idcatoutils').value;
            let lib = document.getElementById('libelleaction').value;
            let code = document.getElementById('codeaction').value;

            let erreurs = "";
            if (lib === "") {
                erreurs += "Veillez renseigner le champs  Libelle Action !\n";
            }
            if (code === "") {
                erreurs += "Veillez renseigner le champs Code Action\n !";
            }

            if (erreurs !== "") {
                infoAction.innerHTML =
                    "<div class='alert alert-danger alert-block'>" + erreurs + ".. \n</div>";
            } else {
                infoAction.innerHTML = "";

                try {

                    data = {
                        _token: token,
                        idCatOutils: idCatOutils,
                        libelleaction: lib,
                        codeaction: code,
                    };
                    const response = await fetch("{{ route('AAO') }}", {
                        method: 'POST',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(data)
                    });

                    if (response.status == 200) {
                        message = await response.text();
                        infoAction.innerHTML =
                            '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                            message + '</strong></div>';
                        listaction(idCatOutils);
                    } else {
                        throw new Error('Erreur lors de l\'ajout de l\'action : ' + data['libelleaction']);
                    }
                } catch (error) {
                    infoAction.innerHTML =
                        "<div class='alert alert-danger alert-block'>" + error + ".. \n</div>";
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
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un catégorie : </h4>
                </div>
                <form method="post" action="{{ route('ACO') }}">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <label for="lib">Libelle</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="lib" name="lib" class="form-control"
                                            placeholder="">
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

    {{-- <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Suppression de catégorie : </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="iddel" value="" />
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label id="infosdel"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="confirmesuppression()"
                        class="btn btn-danger waves-effect waves-light">SUPPRIMER</button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification de catégorie : </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idupdate" value="" />
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label id="infoupdate"></label> <br>
                            <label for="infolib">Libellé :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="infolib" name="infolib" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="confirmeupdate()" class="btn btn-warning waves-effect waves-light">MODIFIER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="carac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Définitions des champs caractéristiques de la catégorie <i
                            id="catcarac"> </i> : </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idcarac" value="" />
                    <div class="row clearfix">
                        <label id="infocarac"></label> <br>
                        <div class="col-md-6">
                            <label for="caraclib">Libellé :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="caraclib" name="caraclib" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="caractype">Type :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="caractype" name="caractype" class="form-control">
                                        <option value="text">Chaine de caractères</option>
                                        <option value="number">Nombre</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12" id="allchampincategorie">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="confirmechamp()" class="btn btn-warning waves-effect waves-light">VALIDER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajout
                        d'action a l'outils :
                        <span id="titleotil" class="modal-title"></span>
                    </h4>
                </div>
                <div class="modal-body">

                    <label id="infoaction"></label>
                    <form method="post" role="form" id="formaction">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="idcatoutils" id="idcatoutils">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="libelleaction">Libellé
                                    action</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelleaction" name="libelleaction"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="codeaction">Code
                                    action </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="codeaction" name="codeaction" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            Les actions de l'outils actuel
                            <div class="col-md-12" id="listsaction">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideaction(event)" data-Id=""
                        class="btn bg-deep-orange waves-effect">AJOUTER</button>
                </div>
            </div>
        </div>
    </div>
@endsection
