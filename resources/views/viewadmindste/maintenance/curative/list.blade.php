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
                                                <label for="periodedebut_r">Le :</label>
                                                <div class="form-line">
                                                    <input type="date" name="periodedebut_r" id="periodedebut_r"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="periodefin_r"> à :</label>
                                                <div class="form-line">
                                                    <input type="time" name="periodefin_r" id="periodefin_r"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="technicien_r">Technicien :</label>
                                                <div class="form-line">
                                                    <input type="search" name="technicien_r" id="technicien_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="cause_r">Cause :</label>
                                                <div class="form-line">
                                                    <input type="search" name="cause_r" id="cause_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="resultat_r">Resultat :</label>
                                                <div class="form-line">
                                                    <input type="search" name="resultat_r" id="resultat_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="etat_r">Etat :</label>
                                                <div class="form-line">
                                                    <input type="search" name="etat_r" id="etat_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="outil_r">Outils :</label>
                                                <div class="form-line">
                                                    <input type="search" name="outil_r" id="outil_r"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="diagnostique_r">Diagnostique :</label>
                                                <div class="form-line">
                                                    <input type="search" name="diagnostique_r" id="diagnostique_r"
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
                                        <th data-priority="1">Date de réception</th>
                                        <th data-priority="1">Durée d'arrêt</th>
                                        <th data-priority="1">Outils</th>
                                        <th data-priority="1">Technicien</th>
                                        <th data-priority="1">Etat</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodymc">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        const sessionEtatMaint = "{{ in_array('define_etat_maint', session('auto_action')) }}";
        const sessionPdfMaint = "{{ in_array('etat_pdf_maint_global', session('auto_action')) }}";
        const sessionUpdate = "{{ in_array('update_maint_prog', session('auto_action')) }}";
        const sessionDelete = "{{ in_array('delete_maint_prog', session('auto_action')) }}";
        const sessionTocken = "{{ csrf_token() }}";
        const router = {
            Deletes: "{{ route('DMCR', ':id') }}",
        }
        let Gliste;
        let searchPerformed = false;
        async function validemaintenancecurative() {
            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            pdm = document.getElementById("pdm").value;
            dam = document.getElementById("dam").value;
            outils = document.getElementById("outils").value;
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
                erreur += "définir la date de réception pour gérer la maintenance.. \n";
            }
            if (dam === "") {
                erreur += "définir la temps de d'arrêt pour gérer la maintenance.. \n";
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
            if (ucm == 0) {
                erreur += "sélectionner l'utilisateur concerné pour gérer la maintenance.. .\n";
            }
            if (outils == 0) {
                erreur += "sélectionner un outils pour gérer la maintenance.. .\n";
            }

            if (erreur !== "") {
                document.getElementById('infomaintenance').innerHTML =
                    "<div class='alert alert-danger alert-block'> Veuillez : " + erreur + "</div>";
            } else {
                dat = {
                    _token: token,
                    pdm: pdm,
                    dam: dam,
                    outils: outils,
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

        function setetatmaintenance(id, etat, commentaire, periode) {

            document.getElementById('infoetat').innerHTML = "Modification de l'état de " + periode + " :";
            document.getElementById('idetat').value = id;
            document.getElementById('commentmaintenance').value = commentaire;
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

        async function setupdatemaintenance(id, resultat, outils, diagnostique, commentaire, cause, periodedebut,
            periodefin,
            technicien,
            nameuser) {
            document.getElementById('idupdate').value = id;
            document.getElementById('pdmu').value = periodedebut;
            document.getElementById('damu').value = periodefin;
            document.getElementById('udgnt').value = diagnostique;
            document.getElementById('cmu').value = commentaire;
            document.getElementById('ucse').value = cause;
            document.getElementById('urslt').value = resultat;

            // select des outils
            let selectoutilsHTML = '<select id="outilsu" name="outilsu" class="form-control">' +
                '<option value="0">Sélectionner un outil</option>';
            alloutils.forEach(function(outil) {
                const isoutilsSelected = (outil.id == outils) ? 'selected' :
                    '';
                selectoutilsHTML += '<option value="' + outil.id + '" ' + isoutilsSelected + '>' + outil
                    .nameoutils +
                    '</option>';
            });

            selectoutilsHTML += '</select>';
            document.getElementById('selectoutil').innerHTML = selectoutilsHTML;

            // select des technicien
            let selecttechnicienHTML = '<select id="techmu" name="techmu" class="form-control">' +
                '<option value="0">Sélectionner un technicien</option>';
            allUser.forEach(function(tech) {
                const techSelected = (tech.idUser == technicien) ? 'selected' :
                    '';
                selecttechnicienHTML += '<option value="' + tech.idUser + '" ' + techSelected + '>' + tech.nom +
                    ' ' + tech.prenom +
                    '</option>';
            });

            selecttechnicienHTML += '</select>';
            document.getElementById('selectallUser').innerHTML = selecttechnicienHTML;

            // select de l'Utilisateur en charge
            let selectutilisateurHTML = '<select id="ucmu" name="ucmu" class="form-control">' +
                '<option value="0">Sélectionner un technicien</option>';
            allUsercharge.forEach(function(Usercharge) {
                const utilisateurSelected = (Usercharge.idUser == technicien) ? 'selected' :
                    '';
                selectutilisateurHTML += '<option value="' + Usercharge.idUser + '" ' + utilisateurSelected +
                    '>' + Usercharge.nom +
                    ' ' + Usercharge.prenom +
                    '</option>';
            });

            selectutilisateurHTML += '</select>';
            document.getElementById('selectallUsercharge').innerHTML = selectutilisateurHTML;


            document.getElementById('ucma').innerHTML =
                "Utilisateur en charge : <br> Voulez-vous changer l'utilisateur actuel `" + nameuser +
            "` ? Si oui choisissez..";
        }

        async function valideupdatemaintenance() {

            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            idupdate = document.getElementById("idupdate").value;
            pdm = document.getElementById("pdmu").value;
            dam = document.getElementById("damu").value;
            techmu = document.getElementById("techmu").value;
            outils = document.getElementById("outilsu").value;
            udgnt = document.getElementById("udgnt").value;
            ucse = document.getElementById("ucse").value;
            urslt = document.getElementById("urslt").value;
            ucm = document.getElementById("ucmu").value;
            cmu = document.getElementById("cmu").value;

            dat = {
                _token: token,
                pdm: pdm,
                dam: dam,
                outilsu: outils,
                techmu: techmu,
                ucm: ucm,
                cmu: cmu,
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

        function getmaintcur(event, format) {
            event.preventDefault();
            var dataT = event.currentTarget;

            var idgestcur = dataT.getAttribute('data-Id') ?? "";
            console.log(idgestcur);

            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('export.gestcur') }}';

            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'idgestcur';
            inputId.value = idgestcur;
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
            recupListGMC();
        };

        async function recupListGMC() {
            console.log("Toutes les ressources de la page sont chargées, la fonction est exécutée.");

            try {
                let response = await fetch("{{ route('GMCDATA') }}", {
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
            const tbody = document.getElementById('tbodymc');
            tbody.innerHTML = '';

            if (list.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9"><center>Pas de maintenance enregistrer!!!</center></td></tr>`;
                return;
            }

            list.forEach((currentline, index, arry) => {
                const contenu = '<tr>' +
                    '<th><span class="co-name">' + currentline["date_debut"] + '</span></th>' +
                    '<td>' + currentline["heures"] + '</td>' +
                    '<td>' + currentline["nameoutils"] + '</td>' +
                    '<td>' + currentline["usersL"] + '</td>' +
                    '<td class="d-flex justify-content-between align-items-center">' +
                    '<span>' + currentline["etat"] + '</span>' +
                    (sessionEtatMaint ?
                        '<button type="button" title="Etat" class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        ' data-toggle="modal" data-target="#etatmaintenance" onclick="setetatmaintenance(' +
                        currentline["id"] + ', \'' + currentline["etat"] + '\', \'' + currentline["commentaire"] +
                        '\', \'' + currentline["periode"] + '\')">' +
                        '<i class="material-icons">gps_fixed</i></button>' :
                        '') +
                    '</td>' +
                    '<td style="align-items: center; padding: 8px; justify-content: space-between;margin-left: 20px;">' +
                    (sessionPdfMaint ?
                        '<button type="button" title="PDF" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light" ' +
                        'onclick="getmaintcur(event, \'pdf\')" data-Id="' + currentline["id"] + '">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">' +
                        '<path fill="currentColor" d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z" />' +
                        '<path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z" />' +
                        '</svg>' +
                        '</button>' :
                        '') +
                    (sessionUpdate ?
                        '<button type="button" title="Modifier" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light"' +
                        'data-toggle="modal" data-target="#update" ' +
                        'onClick="setupdatemaintenance(\'' + currentline["id"] + '\',\'' + currentline[
                            "resultat"] + '\',\'' + currentline["outil"] + '\',\'' + currentline["diagnostique"] +
                        '\',\'' + currentline["commentaire"] + '\',\'' + currentline["cause"] + '\',\'' +
                        currentline["date_debut"] + '\',\'' + currentline["heures"] + '\',\'' + currentline[
                            "user_id"] + '\',\'' + currentline["usersL"] + '\',)">' +
                        '<i class="material-icons">system_update_alt</i>' +
                        '</button>' :
                        '') +
                    (sessionDelete ?
                        '<button type="button" title="Supprimer" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"' +
                        'onClick="Delete(event,\'' + router.Deletes.replace(':id', currentline["id"]) + '\',\'' +
                        currentline["periode"] + '\')"' +
                        'data-Id="' + currentline["id"] + '" data-token="' + sessionTocken + '">' +
                        '<i class="material-icons">delete_sweep</i>' +
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
            const etat = document.getElementById('etat_r').value;
            const cause = document.getElementById('cause_r').value;
            const diagnostique = document.getElementById('diagnostique_r').value;
            const resultat = document.getElementById('resultat_r').value;

            const params = new URLSearchParams({
                periodedebut: periodedebut,
                technicien: technicien,
                outil: outil,
                periodefin: periodefin,
                etat: etat,
                cause: cause,
                resultat: resultat,
                diagnostique: diagnostique,
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
                    searchPerformed = true;
                } else {
                    throw new Error("Erreur lors de la récupération des données: " + response.status);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
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
            form.action = '{{ route('gcurrechexp') }}';

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
    </script>
@endsection

@section('model')
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregister une maintenance : </h4>
                </div>

                <div class="modal-body" id="formData">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infomaintenance"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="outils">Outils :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    @php
                                        $alloutils = App\Providers\InterfaceServiceProvider::getordinateur();
                                    @endphp
                                    <select id="outils" name="outils" class="form-control">
                                        <option value="0">Sélectionner un outil</option>
                                        @foreach ($alloutils as $outils)
                                            <option value="{{ $outils->id }}"> {{ $outils->nameoutils }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                            <label for="pdm">Date de réception :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="pdm" name="pdm" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dam">Durée d'arrêt :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="time" id="dam" name="dam" class="form-control"
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
                                    <select type="text" id="ucm" name="ucm" class="form-control">
                                        <option value="0" disabled>Sélectionner un utilisateurs
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
                @php
                    $alloutils = App\Providers\InterfaceServiceProvider::getordinateur();
                    $allUser = App\Providers\InterfaceServiceProvider::alladminandsuperadmin();
                    $allUsercharge = App\Providers\InterfaceServiceProvider::allutilisateursadmin();
                @endphp
                <script type="text/javascript">
                    var alloutils = @json($alloutils);
                    var allUser = @json($allUser);
                    var allUsercharge = @json($allUsercharge);
                </script>
                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idupdate" name="idupdate" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label>Outil :</label>
                            <div class="form-group">


                                <div class="form-line" id="selectoutil">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                            <label for="pdmu">Date de réception :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="pdmu" name="pdmu" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="damu">Durée d'arrêt :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="time" id="damu" name="damu" class="form-control"
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
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="techmu">Technicien :</label>
                            <div class="form-group">
                                <div class="form-line" id="selectallUser">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="other">
                        <div class="col-md-12">
                            <label for="ucmu" id="ucma"></label>
                            <div class="form-group">
                                <div class="form-line" id="selectallUsercharge">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="cmu">Contenu mail :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" id="cmu" name="cmu" class="form-control"></textarea>
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
                        <div class="col-md-12">
                            <label id="etats" class="modal-title pull-center"></label><br>
                        </div>
                        <div class="col-md-6">
                            <label for="etatselect">Etat :</label>
                            <div class="form-group">
                                <div class="form-line" id="etatContainer">

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
