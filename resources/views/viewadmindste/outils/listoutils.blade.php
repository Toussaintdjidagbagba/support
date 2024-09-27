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
                Outils
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Liste des outils
                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">Ajouter
                            </button>
                            <br>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" id="outilsexp" onclick="paramoutils('xlsx')">Exporter
                                            en Excel</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="paramoutils('pdf')">Exporter en PDF</a>
                                    </li>
                                </ul>
                            </li>
                        </ul><br><br>
                        <form action="{{ route('GO') }}" method="get" role="form">
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="search" name="q" id="searchForm" placeholder="Mot clé..."
                                        class="form-control">
                                </div>
                                <div class="input-group-addon">
                                    <button type="submit" class="btn btn-info btn-md"> Rechercher</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Référence</th>
                                        <th data-priority="1">Date d'acquisition</th>
                                        <th data-priority="1">Libelle</th>
                                        <th data-priority="1">Catégorie d'outil</th>
                                        <th data-priority="1">Utilisateur</th>
                                        <th data-priority="1">Etat</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $out)
                                        <tr class="text-center">
                                            <td>
                                                {{ $out->reference ?? '---' }}
                                            </td>
                                            <td>
                                                {{ $out->dateacquisition ?? '---' }}
                                            </td>
                                            <td>
                                                {{ $out->nameoutils ?? '---' }}
                                            </td>
                                            <td>
                                                {{ App\Providers\InterfaceServiceProvider::LibelleCategorie($out->categorie) ?? '---' }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleUser($out->user) ?? '---' }}
                                            </td>
                                            <td>
                                                @if (in_array('update_etat_outil', session('auto_action')))
                                                    <button type="button" title="Etat"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#etatoutil"
                                                        onclick="setetatoutils({{ $out->id }}, '{{ $out->nameoutils }}')">
                                                        <i class="material-icons">gps_fixed</i></a> </button>
                                                    {{ $out->etat }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($out->user == null || $out->user == '')
                                                    @if (in_array('affecte_outil', session('auto_action')))
                                                        <button type="button" title="Affecter"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                            data-toggle="modal" data-target="#affecter"
                                                            onclick="setutilisateurinoutils({{ $out->id }}, '{{ $out->nameoutils }}')">
                                                            <i class="material-icons">account_circle</i>
                                                        </button>
                                                    @endif
                                                @else
                                                    @if (in_array('reaffecte_outil', session('auto_action')))
                                                        <button type="button" title="Reaffecter"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                            data-toggle="modal" data-target="#reaffecter"
                                                            onclick="updateuserinoutils({{ $out->id }}, '{{ $out->nameoutils }}', {{ $out->user }}, '{{ App\Providers\InterfaceServiceProvider::LibelleUser($out->user) }}')">
                                                            <i class="material-icons">account_circle</i>
                                                        </button>
                                                    @endif
                                                @endif
                                                @if (in_array('hist_outil', session('auto_action')))
                                                    <button type="button" title="Historique"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#historique"
                                                        onclick="gethistorique({{ $out->id }}, '{{ $out->nameoutils }}')">
                                                        <i class="material-icons">assessment</i>
                                                    </button>
                                                @endif
                                                @if (in_array('caract_outil', session('auto_action')))
                                                    <button type="button" title="Détails"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#details"
                                                        onclick="getdetail({{ $out->id }}, '{{ $out->nameoutils }}', '{{ $out->otherjson }}', {{ $out->categorie }})">
                                                        <i class="material-icons">book</i></a>
                                                    </button>
                                                @endif
                                                @if (in_array('update_caract_outil', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        data-toggle="modal" data-target="#update"
                                                        onclick="setupdateoutils({{ $out->id }}, '{{ $out->nameoutils }}', '{{ $out->otherjson }}', {{ $out->categorie }})">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </button>
                                                @endif

                                                @if (in_array('delete_outil', session('auto_action')))
                                                    <button type="button" title="Supprimer",
                                                        onclick="Delete(event, '{{ route('DIA', $out->id) }}','{{ $out->nameoutils }}')"
                                                        class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"
                                                        >
                                                        <i class="material-icons">delete_sweep</i></a> </button>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <center>Pas d'outils enregistrer!!!</center>
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
        async function controlecat() {

            catchoisi = document.getElementById('caraccat').value;

            if (catchoisi == 0)
                document.getElementById('infosaveoutil').innerHTML =
                "<div class='alert alert-danger alert-block'>Veuillez sélectionner une catégorie d'outil avant de continuer.. </div>";
            else {
                // Récuperer tous les champ possible dans la catégorie
                try {
                    let response = await fetch("{{ route('GCCO') }}?cat=" + catchoisi, {
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
                            contenu += '<div class="col-md-6">';
                            contenu += '<label for="' + currentline["code"] + '">' + currentline["libelle"] +
                                '</label>';
                            contenu += '<div class="form-group">';
                            contenu += '<div class="form-line">';
                            contenu += '<input type="' + currentline["type"] + '" id="' + currentline["code"] +
                                '" name="' + currentline["code"] +
                                '" class="form-control outiladd" placeholder="">';
                            //contenu += ;
                            contenu += '</div>';
                            contenu += '</div>';
                            contenu += '</div>';
                        });

                        document.getElementById('other').innerHTML = contenu;
                    } else {
                        return "";
                    }
                } catch (error) {

                    return "";
                }
            }
        }

        async function valideaddoutil() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            // Référence 
            caracrefoutil = document.getElementById("caracrefoutil").value;
            // Date d'acquisition 
            caracdateoutil = document.getElementById("caracdateoutil").value;
            // Libellé
            caraclib = document.getElementById("caraclib").value;
            // Catégorie d'outils 
            caraccat = document.getElementById("caraccat").value;

            if (caraccat == 0)
                document.getElementById('infosaveoutil').innerHTML =
                "<div class='alert alert-danger alert-block'>Veuillez sélectionner une catégorie d'outil avant de continuer.. </div>";
            else {

                inputs = document.getElementsByClassName('outiladd');
                dat = {
                    _token: token,
                    caraclib: caraclib,
                    caraccat: caraccat,
                    caracdateoutil: caracdateoutil,
                    caracrefoutil: caracrefoutil,
                };
                for (index = 0; index < inputs.length; ++index) {
                    temp = inputs[index].name;
                    dat[temp] = document.getElementById(temp).value;
                }

                document.getElementById("infosaveoutil").innerHTML =
                    '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

                // En cours d'envoie
                try {
                    let response = await fetch("{{ route('AO') }}", {
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
                        document.getElementById("infosaveoutil").innerHTML =
                            '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                            data + '</strong></div>';
                        document.getElementById("caraclib").value = "";
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    } else {
                        document.getElementById("infosaveoutil").innerHTML =
                            '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                    }
                } catch (error) {

                    document.getElementById("infosaveoutil").innerHTML = error;
                }
            }
        }

        async function setutilisateurinoutils(id, outil) {
            document.getElementById('infoaffectation').innerHTML = "Affecter l'outil " + outil + " à l'utilisateur : ";
            document.getElementById('idaffactation').value = id;
        }

        function addusers() {
            document.getElementById('infoaffectation').innerHTML =
                "Vous voulez ajouter un utilisateur qui n'existe pas ? Dans cinq secondes vous serez redirigez vers la page d'enregistrement d'utilisateur.. ";
            setTimeout(function() {
                window.location.href = "{{ route('GU') }}";
            }, 5000);
        }

        async function valideaffectationoutil() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            idaffactation = document.getElementById("idaffactation").value;
            affecteruser = document.getElementById("affecteruser").value;

            dat = {
                _token: token,
                idaffect: idaffactation,
                user: affecteruser,
            };

            document.getElementById("infoaffectation").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('PAOU') }}", {
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Origin': '/extraction',
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(dat)
                });
                if (response.status == 200) {
                    data = await response.text();
                    document.getElementById("infoaffectation").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                    document.getElementById("caraclib").value = "";
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                } else {
                    document.getElementById("infoaffectation").innerHTML =
                        '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {

                document.getElementById("infoaffectation").innerHTML = error;
            }
        }

        async function updateuserinoutils(id, outil, user, nameuser) {
            document.getElementById('idreaffactation').value = id;

            try {
                let response = await fetch("{{ route('GAUS') }}", {
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
                    contenu += '<select type="text" id="reaffectuser" name="reaffectuser" class="form-control">';
                    contenu += '<option value="' + user + '">' + nameuser + '</option>';
                    contenu += '<option value="0"> `` Aucun `` </option>';
                    list.forEach(function(currentline, index, arry) {
                        contenu += '<option value="' + currentline["idUser"] + '">' + currentline["nom"] + ' ' +
                            currentline["prenom"] + '</option>';
                    });
                    contenu += '</select>';
                    document.getElementById('selectuser').innerHTML = contenu;
                } else {
                    return "";
                }
            } catch (error) {
                return "";
            }
        }

        async function validereaffectationoutil() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            idreaffactation = document.getElementById("idreaffactation").value;
            reaffectuser = document.getElementById("reaffectuser").value;

            dat = {
                _token: token,
                idaff: idreaffactation,
                idreaffect: reaffectuser,
            };

            document.getElementById("inforeaffectation").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('RAOU') }}", {
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
                    document.getElementById("inforeaffectation").innerHTML =
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' +
                        data + '</strong></div>';
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                } else {
                    document.getElementById("inforeaffectation").innerHTML =
                        '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                document.getElementById("inforeaffectation").innerHTML = error;
            }
        }

        async function gethistorique(id, outil) {
            
            document.getElementById('infohistoriqueoutils').innerHTML = "L'historique de " + outil + " : ";
            try {
                let response = await fetch("{{ route('GHO') }}?id=" + id, {
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
                        contenu += '<tr>';
                        contenu += '<td>' + currentline["created_at"] + '</td>';
                        contenu += '<td>' + currentline["libelle"] + '</td>';
                        contenu += '<td>' + currentline["nom"] + ' ' + currentline["prenom"] + '</td>';
                        contenu += '</tr>';
                    });
                    if (contenu == "")
                        document.getElementById('contenuhist').innerHTML =
                        '<tr> <td colspan="2"><center> Aucune action effectuée sur cet outil. </center> </td> </tr>';
                    else
                        document.getElementById('contenuhist').innerHTML = contenu;
                        document.getElementById('idhist').value = id;

                } else {
                    return "";
                }
            } catch (error) {
                return "";
            }
        }

        async function getdetail(id, outil, caracteristique, categorie) {
            document.getElementById('infodetail').innerHTML = "Caractéritiques de " + outil + " : <br><br>";
            try {
                let response = await fetch("{{ route('GDOS') }}?cat=" + categorie + "&caract=" + caracteristique, {
                    method: 'get',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                if (response.status == 200) {
                    data = await response.text();
                    document.getElementById('detailoutils').innerHTML = data;
                    document.getElementById('idoutildetail').value = id;
                } else {
                    return "";
                }
            } catch (error) {

                return "";
            }
        }

        async function exportdetailpdf() {
            idoutil = document.getElementById('idoutildetail').value;

            try {
                let response = await fetch("{{ route('export-pdf-detail') }}?outil=" + idoutil, {
                    method: 'get',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                if (response.status == 200) {
                    data = await response.text();
                } else {
                    return "";
                }
            } catch (error) {

                return "";
            }
        }

        async function setupdateoutils(id, outil, caracteristique, categorie) {
            document.getElementById('idupdate').value = id;
            document.getElementById('infoupdate').innerHTML = "Caractéritiques de " + outil + " : <br><br>";
            try {
                let response = await fetch("{{ route('GDOSU') }}?cat=" + categorie + "&caract=" + caracteristique, {
                    method: 'get',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                if (response.status == 200) {
                    data = await response.text();
                    document.getElementById('detailupdate').innerHTML = data;
                } else {
                    return "";
                }
            } catch (error) {

                return "";
            }
        }

        async function valideupdateoutil() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            idupdate = document.getElementById("idupdate").value;

            inputs = document.getElementsByClassName('outilupdate');
            dat = {
                _token: token,
                id: idupdate,
                caraccat: caraccat,
            };
            for (index = 0; index < inputs.length; ++index) {
                temp = inputs[index].name;
                dat[temp] = document.getElementById(temp).value;
            }

            document.getElementById("infoupdate").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('UO') }}", {
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

        async function setdeleteoutils(id, outil) {
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer l'outil " + outil + " ?";
            document.getElementById('iddelete').value = id;
        }

        async function validedeleteoutil() {
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
                let response = await fetch("{{ route('DO') }}", {
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
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                } else {
                    document.getElementById("infodelete").innerHTML =
                        '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                }
            } catch (error) {
                document.getElementById("infodelete").innerHTML = error;
            }
        }

        function setetatoutils(id, outil) {
            document.getElementById('infoetat').innerHTML = "Modification de l'état de " + outil + ". <br><br>";
            document.getElementById('idetat').value = id;
        }

        async function valideetatoutil() {
            token = document.getElementById("_token").value;
            idetat = document.getElementById("idetat").value;
            etatselect = document.getElementById("etatselect").value;
            commentoutil = document.getElementById("commentoutil").value;

            inputs = document.getElementsByClassName('outilupdate');
            dat = {
                _token: token,
                id: idetat,
                etat: etatselect,
                commentaire: commentoutil,
            };
            document.getElementById("infoetat").innerHTML =
                '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

            // En cours d'envoie
            try {
                let response = await fetch("{{ route('DEO') }}", {
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

        function paramoutils(format) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('outils.export') }}';

            var inputFormat = document.createElement('input');
            inputFormat.type = 'hidden';
            inputFormat.name = 'format';
            inputFormat.value = format;
            form.appendChild(inputFormat);

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            document.body.appendChild(form);
            form.submit();
        }

        async function Delete(event, url, libelle) {
            event.preventDefault();
            const {
                isConfirmed
            } = await Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer l\'outil <span class="text-danger">' + libelle + '</span> ?',
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
                    const response = await fetch(url, {
                        method: 'get',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                    });

                    if (response.status == 200) {
                        Swal.fire("Succès", "Incident supprimé avec succès", "success").then(() => {
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

        function paramhisto(format) 
        {
            var idhisto = document.getElementById('idhist').value;
       
            var form = document.createElement('form');
            form.method = 'GET'; 
            form.action = '{{ route("outilshisto.export") }}';

            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'idhisto';
            inputId.value = idhisto; 
            form.appendChild(inputId);

            var inputFormat = document.createElement('input');
            inputFormat.type = 'hidden';
            inputFormat.name = 'format';
            inputFormat.value = format;
            form.appendChild(inputFormat);

            document.body.appendChild(form);
            form.submit();
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
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un outil : </h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infosaveoutil"></label>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="caracrefoutil">Référence :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="caracrefoutil" name="caracrefoutil" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="caracdateoutil">Date d'acquisition:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="caracdateoutil" name="caracdateoutil" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="caraclib">Libellé </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="caraclib" name="caraclib" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="caraccat">Catégorie d'outils</label>
                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $allCat = App\Providers\InterfaceServiceProvider::allcategorie();
                                    @endphp
                                    <select type="text" id="caraccat" name="caraccat" class="form-control"
                                        onchange="controlecat()">
                                        <option value="0">Sélectionner un catégorie</option>
                                        @foreach ($allCat as $cat)
                                            <option value="{{ $cat->id }}"> {{ $cat->libelle }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="other">

                        <div class="col-md-12">
                            <label for="caract">Caractéristiques</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea cols="8" id="caract" name="caract" class="form-control outiladd" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideaddoutil()" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="affecter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Affectation d'outil à un utilisateur : </h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idaffactation" name="idaffactation" />
                    <label id="infoaffectation"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $users = App\Providers\InterfaceServiceProvider::allutilisateurs();
                                    @endphp
                                    <select type="text" id="affecteruser" name="affecteruser" class="form-control">
                                        <option value="0">Sélectionner un utilisateur</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->idUser }}"> {{ $user->nom }} {{ $user->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="bg-blue-grey btn-circle btn-lg margin-bottom-10 waves-effect waves-light"
                                onclick="addusers()">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideaffectationoutil()" class="btn bg-deep-orange waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reaffecter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Réaffectation d'outil à un autre utilisateur : </h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idreaffactation" name="idreaffactation" />
                    <label id="inforeaffectation"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-line" id="selectuser">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="bg-blue-grey btn-circle btn-lg  margin-bottom-10 waves-effect waves-light"
                                onclick="addusers()"> <i class="material-icons">add</i> </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="validereaffectationoutil()" class="btn bg-deep-orange waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="historique" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Historique : </h4>
                </div>

                <div class="modal-body">
                    <label id="infohistoriqueoutils"></label>
                    <div class="row clearfix">
                        <div class="col-md-12" id="seehistoutil">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                   
                                        <button type="button" class="btn btn-default waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;">
                                            EXPORTER
                                            <span class="caret"></span>
                                        </button>
                                        <input type="hidden" id="idhist">
                                        <ul class="dropdown-menu pull-right" style=" position: relative; top: 68px; left:100px;">
                                            <li>
                                                <a href="javascript:void(0);" id="histoexp" onclick="paramhisto('xlsx')" >Excel</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" onclick="paramhisto('pdf')">PDF</a>
                                            </li>
                                        </ul>
                                       
                                        <br><br><br>
                                        <tr>
                                            <th data-priority="1">Date</th>
                                            <th data-priority="1">Traces</th>
                                            <th data-priority="1">Utilisateur</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenuhist">

                                    </tbody>
                                </table>
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

    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Détails : </h4>
                </div>

                <div class="modal-body">
                    <label id="infodetail"></label>
                    <div class="row clearfix" id="detailoutils">

                    </div>
                    <input type="hidden" name="idoutildetail">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="exportdetailpdf()" id="export-pdf-detail"
                        class="btn btn-danger waves-effect">
                        Exporter en PDF
                    </button>
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
                    <div class="row clearfix" id="detailupdate">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideupdateoutil()" class="btn bg-deep-orange waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteoutil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <button onclick="validedeleteoutil()" class="btn bg-deep-red waves-effect">SUPPRIMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="etatoutil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Etat </h4>
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
                            <label for="commentoutil">Commentaire :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="commentoutil" name="commentoutil" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                        data-dismiss="modal">FERMER</button>
                    <button onclick="valideetatoutil()" class="btn bg-deep-red waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>
@endsection
