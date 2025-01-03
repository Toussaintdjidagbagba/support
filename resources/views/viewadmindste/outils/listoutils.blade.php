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
                                    <div id="alert" class="alert" style="display: none;"></div><br>
                                    <div class="row clearfix">
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="date_acquise">Date d'acquisition :</label>
                                                <div class="form-line">
                                                    <input type="date" name="date_acquise" id="date_acquise"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="utilisateur">Utilisateur :</label>
                                                <div class="form-line">
                                                    <input type="search" name="utilisateur" id="utilisateur"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="etats">Etat :</label>
                                                <div class="form-line">
                                                    <input type="search" name="etats" id="etats"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="reference"> Référence :</label>
                                                <div class="form-line">
                                                    <input type="text" name="reference" id="reference"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="cat_outil">Catégorie d'outil :</label>
                                                <div class="form-line">
                                                    <input type="search" name="cat_outil" id="cat_outil"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="outils">Outil :</label>
                                                <div class="form-line">
                                                    <input type="search" name="outils" id="outils"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="justify-content-center">
                                            <button type="button" class="btn btn-secondary"
                                                style="margin-left: 25px; margin-bottom: 0px;"
                                                onclick="paramrech('pdf')">PDF Exporter</button>
                                            <button type="button" class="btn btn-gris"
                                                style="margin-left: 25px; margin-bottom: 0px;"
                                                onclick="paramrech('xlsx')">EXCEL Exporter</button>
                                            <button onclick="searchButton(event)"
                                                style="margin-left: 25px; margin-bottom: 0px;"
                                                class="btn btn-primary btn-md">Rechercher</button>
                                        </div>
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
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" id="outilsexp"
                                            onclick="paramoutils('xlsx')">Exporter
                                            en Excel</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="paramoutils('pdf')">Exporter en PDF</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
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
                                <tbody id="tbody-outils">

                                </tbody>
                            </table>
                            <div id="pagination" class="pagination-container">

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        const sessionEtatOutils = "{{ in_array('update_etat_outil', session('auto_action')) }}";
        const sessionAffecterOutils = "{{ in_array('affecte_outil', session('auto_action')) }}";
        const sessionRaffecterOutils = "{{ in_array('reaffecte_outil', session('auto_action')) }}";
        const sessionHistOutils = "{{ in_array('hist_outil', session('auto_action')) }}";
        const sessionCatOutils = "{{ in_array('caract_outil', session('auto_action')) }}";
        const sessionUpdateCatOutil = "{{ in_array('update_caract_outil', session('auto_action')) }}";
        const sessionDelete = "{{ in_array('delete_outil', session('auto_action')) }}";
        const sessionTocken = "{{ csrf_token() }}";
        const router = {
            Deletes: "{{ route('DO', ':id') }}",
        }

        let Gliste;
        let itemsPerPage = 10;
        let currentPage = 1;
        let totalItems = 0;
        let searchPerformed = false;

        async function controlecat() {

            catchoisi = document.getElementById('caraccat').value;

            if (catchoisi == 0)
                document.getElementById('infosaveoutil').innerHTML =
                "<div class='alert alert-danger alert-block'>Veuillez sélectionner une catégorie d'outil avant de continuer.. </div>";
            else {
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
                    console.log(list);
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

        async function getdetail(id, outil, categorie) {
            document.getElementById('infodetail').innerHTML = "Caractéritiques de :" + outil + " : <br><br>";
            try {
                let response = await fetch("{{ route('GDOS') }}?cat=" + categorie + "&id=" + id, {
                    method: 'get',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                if (response.status == 200) {
                    data = await response.json();
                    document.getElementById('detailoutils').innerHTML = data.contenu;
                    document.getElementById('idoutildetail').value = id;
                    document.getElementById('catdetail').value = categorie;
                    document.getElementById('carctdetail').value = data.caracteristique;

                } else {
                    return "";
                }
            } catch (error) {

                return "";
            }
        }

        function exportdetailpdf(format) {

            var iddetail = document.getElementById('idoutildetail').value;
            var cat = document.getElementById('catdetail').value;
            var carct = document.getElementById('carctdetail').value;
            console.log(iddetail);

            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('pdfdetail') }}';

            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'iddetail';
            inputId.value = iddetail;
            form.appendChild(inputId);

            var inputcat = document.createElement('input');
            inputcat.type = 'hidden';
            inputcat.name = 'cat';
            inputcat.value = cat;
            form.appendChild(inputcat);

            var inputcarct = document.createElement('input');
            inputcarct.type = 'hidden';
            inputcarct.name = 'carct';
            inputcarct.value = carct;
            form.appendChild(inputcarct);


            var inputFormat = document.createElement('input');
            inputFormat.type = 'hidden';
            inputFormat.name = 'format';
            inputFormat.value = format;
            form.appendChild(inputFormat);

            document.body.appendChild(form);
            form.submit();
        }

        async function setupdateoutils(id, outil, categorie) {
            document.getElementById('idupdate').value = id;
            document.getElementById('infoupdate').innerHTML = "Caractéritiques de " + outil + " : <br><br>";
            try {
                let response = await fetch("{{ route('GDOSU') }}?cat=" + categorie + "&id=" + id, {
                    method: 'get',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });
                if (response.status == 200) {
                    data = await response.json();
                    document.getElementById('detailupdate').innerHTML = data.contenu;
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

        function setetatoutils(id, etat, outil) {
            document.getElementById('infoetat').innerHTML = "Modification de l'état de " + outil + ". <br><br>";
            document.getElementById('idetat').value = id;

            document.getElementById('etats').innerHTML = 'Etat Actuelle :<span class="text-primary"> ' + etat + '</span>';

            document.getElementById('etatContainer').innerHTML =
                '<select id="etatselect" name="etatselect" class="form-control">' +
                '<option value="Excellent" ' + (etat === 'Excellent' ? 'selected' : '') + '>Excellent</option>' +
                '<option value="Bien" ' + (etat === 'Bien' ? 'selected' : '') + '>Bien</option>' +
                '<option value="Défaillant" ' + (etat === 'Défaillant' ? 'selected' : '') + '>Défaillant</option>' +
                '<option value="Très Bien" ' + (etat === 'Très Bien' ? 'selected' : '') + '>Très Bien</option>' +
                '<option value="Passable" ' + (etat === 'Passable' ? 'selected' : '') + '>Passable</option>' +
                '<option value="Médiocre" ' + (etat === 'Médiocre' ? 'selected' : '') + '>Médiocre</option>' +
                '<option value="Autres" ' + (etat === 'Autres' ? 'selected' : '') + '>Autres</option>' +
                '</select>';
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

        function paramrech(format) {
            console.log(Gliste);
            const alertDiv = document.getElementById('alert');
            if (!searchPerformed) {
                showAlert("Veuillez d'abord effectuer une recherche avant d'exporter les données.", "warning");
                return;
            }
            var form = document.createElement('form');
            form.method = 'get';
            form.action = '{{ route('outilsrechexp') }}';

            var inputExport = document.createElement('input');
            inputExport.type = 'hidden';
            inputExport.name = 'format';
            inputExport.value = format;
            form.appendChild(inputExport);

            // Ajouter le champ de recherche
            var inputListData = document.createElement('input');
            inputListData.type = 'hidden';
            inputListData.name = 'Gliste';
            inputListData.value = JSON.stringify(Gliste);
            form.appendChild(inputListData);

            document.body.appendChild(form);
            form.submit();
        }
        // Fonction pour afficher l'alerte
        function showAlert(message, type) {
            const alertDiv = document.getElementById('alert');
            alertDiv.className = `alert alert-${type}`; // Ajoute la classe d'alerte
            alertDiv.innerHTML = message; // Définit le message
            alertDiv.style.display = 'block'; // Affiche le div
            setTimeout(() => {
                alertDiv.style.display = 'none'; // Masque le div après 3 secondes
            }, 4000);
        }
        async function Delete(event, url, libelle) {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";
            const {
                isConfirmed
            } = await Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer l\'outil <span class="text-danger">' + libelle +
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

        function paramhisto(format) {
            var idhisto = document.getElementById('idhist').value;

            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('outilshisto.export') }}';

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

        window.onload = function() {
            recupListO();
        };

        async function recupListO() {

            try {
                let response = await fetch("{{ route('GODATA') }}", {
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
                    totalItems = data.list.length;
                    paginationListe(totalItems);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
        }

        async function searchButton(event) {
            event.preventDefault();
            const date_acquise = document.getElementById('date_acquise').value;
            const utilisateur = document.getElementById('utilisateur').value;
            const etats = document.getElementById('etats').value;
            const reference = document.getElementById('reference').value;
            const cat_outil = document.getElementById('cat_outil').value;
            const outils = document.getElementById('outils').value;

            const params = new URLSearchParams({
                date_acquise: date_acquise,
                utilisateur: utilisateur,
                etats: etats,
                reference: reference,
                cat_outil: cat_outil,
                outils: outils,
            }).toString();

            try {
                let response = await fetch("{{ route('GODATA') }}?" + params, {
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
                    searchPerformed = true;
                } else {
                    throw new Error("Erreur lors de la récupération des données: " + response.status);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
        }

        function afficherDonnees(list) {
            const tbody = document.getElementById('tbody-outils');
            tbody.innerHTML = '';

             const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const currentListes = list.slice(start, end);

            if (currentListes.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9"><center>Pas de maintenance enregistrer!!!</center></td></tr>`;
                return;
            }

            currentListes.forEach((currentline, index, arry) => {
                const contenu = '<tr class="text-center">' +
                    '<th><span class="co-name">' + currentline["reference"] + '</span></th>' +
                    '<td>' + currentline["dateacquisition"] + '</td>' +
                    '<td>' + currentline["nameoutils"] + '</td>' +
                    '<td>' + currentline["co_libelle"] + '</td>' +
                    '<td>' + currentline["usersL"] + '</td>' +
                    '<td class="d-flex justify-content-between align-items-center">' +
                    '<span>' + currentline["etat"] + '</span>' +
                    (sessionEtatOutils ?
                        '<button type="button" title="Etat" class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        ' data-toggle="modal" data-target="#etatoutil" onclick="setetatoutils(' +
                        currentline["id"] + ', \'' + currentline["etat"] + '\', \'' + currentline["nameoutils"] +
                        '\')">' +
                        '<i class="material-icons">gps_fixed</i></button>' :
                        '') +
                    '</td>' +
                    '<td style="align-items: center; padding: 8px; justify-content: space-between;margin-left: 20px;">' +
                    ((currentline["userO"] == null || currentline["userO"] == '') ?
                        (sessionAffecterOutils ?
                            '<button type="button" title="Affecter" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#affecter" ' +
                            'onClick="setutilisateurinoutils(\'' + currentline["id"] + '\',\'' + currentline[
                                "nameoutils"] + '\')">' +
                            '<i class="material-icons">account_circle</i>' +
                            '</button>' :
                            '') :
                        (sessionRaffecterOutils ?
                            '<button type="button" title="Reaffecter" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#reaffecter" ' +
                            'onClick="updateuserinoutils(\'' + currentline["id"] + '\',\'' + currentline[
                                "nameoutils"] + '\',\'' + currentline["userO"] + '\',\'' + currentline["usersL"] +
                            '\')">' +
                            '<i class="material-icons">account_circle</i>' +
                            '</button>' :
                            '')
                    ) +
                    (sessionHistOutils ?
                        '<button type="button" title="Historique" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"' +
                        'data-toggle="modal" data-target="#historique" ' +
                        'onClick="gethistorique(\'' + currentline["id"] + '\', \'' + currentline[
                            "nameoutils"] + '\')">' +
                        '<i class="material-icons">assessment</i>' +
                        '</button>' :
                        '') +
                    (sessionCatOutils ?
                        '<button type="button" title="Détails"' +
                        ' class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"' +
                        ' data-toggle="modal" data-target="#details" ' +
                        'onClick="getdetail(\'' + currentline["id"] + '\',\'' + currentline["nameoutils"] +
                        '\',\'' + currentline["categorie"] + '\')">' +
                        '<i class="material-icons">book</i>' +
                        '</button>' :
                        '') +
                    (sessionUpdateCatOutil ?
                        '<button type="button" title="Modifier" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#update" ' +
                        'onclick="setupdateoutils(\'' + currentline["id"] + '\',\'' + currentline["nameoutils"] +
                        '\',\'' + currentline["categorie"] +
                        '\')">' +
                        ' <i class="material-icons">system_update_alt</i>' +
                        '</button>' :
                        '') +
                    (sessionDelete ?
                        '<button type="button" title="Supprimer" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"' +
                        'onClick="Delete(event,\'' + router.Deletes.replace(':id', currentline["id"]) + '\',\'' +
                        currentline["nameoutils"] + '\')"' +
                        'data-Id="' + currentline["id"] + '" data-token="' + sessionTocken + '">' +
                        '<i class="material-icons">delete_sweep</i>' +
                        '</button>' :
                        '') +
                    '</td>' +
                    '</tr>';
                tbody.innerHTML += contenu;
            });
        }

         function paginationListe(totalItems) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const paginationContainer = document.getElementById('pagination');

            paginationContainer.innerHTML = '';

            if (currentPage > 1) {
                const prevButton = document.createElement('button');
                prevButton.textContent = 'Précédent';
                prevButton.classList.add('btn', 'btn-secondary', 'mr-2');
                prevButton.onclick = () => {
                    currentPage--;
                    recupListO();
                };
                paginationContainer.appendChild(prevButton);
            }

            if (currentPage < totalPages) {
                const nextButton = document.createElement('button');
                nextButton.textContent = 'Suivant';
                nextButton.classList.add('btn', 'btn-primary');
                nextButton.onclick = () => {
                    currentPage++;
                    recupListO();
                };
                paginationContainer.appendChild(nextButton);
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

                                        <button type="button" class="btn btn-default waves-effect dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            style="float: right;">
                                            EXPORTER
                                            <span class="caret"></span>
                                        </button>
                                        <input type="hidden" id="idhist">
                                        <ul class="dropdown-menu pull-right"
                                            style=" position: relative; top: 68px; left:100px;">
                                            <li>
                                                <a href="javascript:void(0);" id="histoexp"
                                                    onclick="paramhisto('xlsx')">Excel</a>
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
                    <input type="hidden" id="idoutildetail" name="idoutildetail">
                    <input type="hidden" id="catdetail" name="catdetail">
                    <input type="hidden" id="carctdetail" name="carctdetail">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="exportdetailpdf('pdf')" id="export-pdf-detail"
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
                        <div class="col-md-12">
                            <label id="etats" class="modal-title pull-center"></label><br><br>
                        </div>
                        <div class="col-md-6">
                            <label for="etatselect">Etat :</label>
                            <div class="form-group">
                                <div class="form-line" id="etatContainer">

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
