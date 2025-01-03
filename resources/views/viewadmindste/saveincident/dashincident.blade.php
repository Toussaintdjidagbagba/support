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
                Incidents
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
                                                <label for="dateEmission">Date Emission :</label>
                                                <div class="form-line">
                                                    <input type="date" name="date_emission" id="dateEmission"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="hierarchie">Hiérarchie :</label>
                                                <div class="form-line">
                                                    <input type="search" name="hierarchie" id="hierarchie"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="desc">Description :</label>
                                                <div class="form-line">
                                                    <input type="search" name="desc" id="desc"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="modules">Modules :</label>
                                                <div class="form-line">
                                                    <input type="search" name="modules" id="modules"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols">
                                            <div class="input-group">
                                                <label for="categorie">Catégorie :</label>
                                                <div class="form-line">
                                                    <input type="search" name="categorie" id="categorie"
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
                            Liste des incidents
                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">Ajouter</button>
                        </h2>
                    </div>
                    <div class="body">
                        <input type="hidden" name="idH" id="idH">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date Emission</th>
                                        <th>Modules</th>
                                        <th>Description</th>
                                        <th>Hiérarchisation</th>
                                        <th>Catégorie</th>
                                        <th>Temps restant</th>
                                        <th>Etat</th>
                                        <th>Avis</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="data-tbody">
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
    <script>
        const sessionUpdateEtat = "{{ in_array('update_etat', session('auto_action')) }}";
        const sessionUpdateIncie = "{{ in_array('update_incie', session('auto_action')) }}";
        const sessionAffecIncie = "{{ in_array('affec_incie', session('auto_action')) }}";
        const sessionViewDocIncie = "{{ in_array('viewdoc_incie', session('auto_action')) }}";
        const sessionDeleteIncie = "{{ in_array('delete_incie', session('auto_action')) }}";
        const sessionPrintPdfIncie = "{{ in_array('print_maint_pdf', session('auto_action')) }}";

        const sessionUpdate = "{{ in_array('update_incident', session('auto_action')) }}";
        const sessionDelete = "{{ in_array('delete_incident', session('auto_action')) }}";
        const router = {
            Deletes: "{{ route('DI', ':id') }}",
            Updates: "{{ route('MTI', ':id') }}",
        }
        let Gliste;
        let searchPerformed = false;

        let itemsPerPage = 10;
        let currentPage = 1;
        let totalItems = 0;

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
                let response = await fetch("{{ route('GIAvis') }}?_token=" + token + "&anormalieid=" + anormalieid +
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

        async function Delete(event, url) {
            event.preventDefault();
            const {
                isConfirmed
            } = await Swal.fire({
                title: "Êtes-vous sûr de vouloir supprimer cet incident?",
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
                    Swal.fire("Erreur", "La suppression a échoué" + error);
                }
            }
        }

        var loadImage = function(event) {
            var output = document.getElementById('output');
            var file = event.target.files[0];

            // Vérification du type de fichier avant de charger l'image
            if (file.type === "image/jpeg" || file.type === "image/png") {
                output.src = URL.createObjectURL(file);
                output.onload = function() {
                    URL.revokeObjectURL(output.src);
                }
            } else {
                Swal.fire("Erreur", "Seules les images JPG ou PNG sont autorisées.", "error");
                event.target.value = ''; // réinitialiser le champ fichier
            }
        };

        window.onload = function() {
            recupListIncident();
        };

        async function searchButton(event) {
            event.preventDefault();
            const dateEmission = document.getElementById('dateEmission').value;
            const hierarchie = document.getElementById('hierarchie').value;
            const desc = document.getElementById('desc').value;
            const modules = document.getElementById('modules').value;
            const categorie = document.getElementById('categorie').value;

            const params = new URLSearchParams({
                date_emission: dateEmission,
                hierarchie: hierarchie,
                desc: desc,
                modules: modules,
                categorie: categorie
            }).toString();

            try {
                let response = await fetch("{{ route('GIDTA') }}?" + params, {
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
                    let list = data.list;
                    console.log(list);

                    Gliste = data.list;
                    afficherDonnees(list);
                    searchPerformed = true;
                } else {
                    throw new Error("Erreur lors de la récupération des données: " + response.status);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
        }

        async function recupListIncident() {

            try {
                let response = await fetch("{{ route('GIDTA') }}", {
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
                    totalItems = data.list.length;
                    afficherDonnees(data.list);
                    paginationListe(totalItems);
                }
            } catch (error) {
                console.error("Erreur attrapée:", error);
            }
        }

        function afficherDonnees(list) {
            const tbody = document.getElementById('data-tbody');
            tbody.innerHTML = '';

            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const currentListes = list.slice(start, end);

            if (currentListes.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9"><center>Pas d'incident enregistrés !!!</center></td></tr>`;
                return;
            }

            currentListes.forEach((currentline, index, arry) => {

                const contenu = '<tr>' +
                    '<th><span class="co-name">' + currentline["DateEmission"] + '</span></th>' +
                    '<td>' + currentline["Module"] + '</td>' +
                    '<td>' + (currentline["description"] || '---') + '</td>' +
                    '<td>' +
                    '<span class="' +
                    (currentline["hierarchie"] === 'Bloquant' ? 'text-danger' :
                        currentline["hierarchie"] === 'Gênant' ? 'text-warning' :
                        currentline["hierarchie"] === 'Confort' ? 'text-primary' : '') +
                    '">' +
                    (currentline["hierarchie"] || 'Aucune hiérarchie') +
                    '</span>' +
                    '</td>' +
                    '<td>' + currentline["cat"] + '</td>' +
                    '<td>' + currentline["tempsRestant"] +
                    '</td>' +
                    '<td>' + currentline["etat"] + '</td>' +
                    '<td class="d-flex justify-content-between align-items-center">' +
                    (
                        ((currentline["etat"] != "En attente") && (currentline["etat"] === "Incident résolu")) ?
                        (currentline["avis"] ? currentline["avis"] :
                            '<a class="btn bg-blue btn-circle btn-xs ml-2 item-center" onclick="getid(' +
                            currentline["id"] +
                            ')" data-id="getid(' + currentline["id"] +
                            ')" data-color="deep-orange" data-toggle="modal" data-target="#avis"><i class="material-icons">grade</i></a>'
                        ) :
                        '') +
                    '</td>' +
                    '<td style="align-items: center; padding: 8px; justify-content: space-between;margin-left: 20px;">' +
                    (((currentline["etat"] === "En attente") && (currentline["etat"] != "Incident résolu")) ?
                        (currentline["statut"] !== 1 ? (sessionUpdate ?
                                '<button type="button" title="Modifier" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light">' +
                                '<a href="' + router.Updates.replace(':id', currentline["id"]) +
                                '" style="color:white;"><i class="material-icons">system_update_alt</i></a>' +
                                '</button>' : ''
                            ) + (sessionPrintPdfIncie ?
                                '<button onclick="getdeclaind(event,\'pdf\')" data-Id="' + currentline["id"] +
                                '" type="button" title="PDF" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">' +
                                '<path fill="currentColor" d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z"/>' +
                                '<path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z"/>' +
                                '</svg>' +
                                '</button>' : "") + (sessionDelete ?
                                '<button type="button" title="Supprimer" style="color:white;" onclick="Delete(event, \'' +
                                router.Deletes.replace(':id', currentline["id"]) +
                                '\')" class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i></button>' :
                                '') :
                            '') : '') +
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
                    recupListIncident();
                };
                paginationContainer.appendChild(prevButton);
            }

            if (currentPage < totalPages) {
                const nextButton = document.createElement('button');
                nextButton.textContent = 'Suivant';
                nextButton.classList.add('btn', 'btn-primary');
                nextButton.onclick = () => {
                    currentPage++;
                    recupListIncident();
                };
                paginationContainer.appendChild(nextButton);
            }
        }

        function getdeclaind(event, format) {
            event.preventDefault();
            var dataT = event.currentTarget;

            var idlin = dataT.getAttribute('data-Id') ?? "";
            console.log(idlin);

            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('export.declind') }}';

            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'idlin';
            inputId.value = idlin;
            form.appendChild(inputId);

            var inputFormat = document.createElement('input');
            inputFormat.type = 'hidden';
            inputFormat.name = 'format';
            inputFormat.value = format;
            form.appendChild(inputFormat);

            document.body.appendChild(form);
            form.submit();
        }

        function paramrech(format) {

            const alertDiv = document.getElementById('alert');
            if (!searchPerformed) {
                showAlert("Veuillez d'abord effectuer une recherche avant d'exporter les données.", "warning");
                return;
            }
            var form = document.createElement('form');
            form.method = 'get';
            form.action = '{{ route('indrechexp') }}';

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
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un incident : </h4>
                </div>
                <form method="post" action="{{ route('GIS') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="mod">Module</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="mod" name="module" class="form-control"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="cat">Catégorie</label>
                                <div class="form-group">
                                    @php
                                        $cats = App\Providers\InterfaceServiceProvider::AllCat();
                                    @endphp
                                    <div class="form-line">
                                        <select type="text" id="cat" name="cat" class="form-control"
                                            required>
                                            <option></option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">


                            <div class="col-md-6">
                                <label for="hiera">Hiérarchisation</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @php
                                            $hies = App\Providers\InterfaceServiceProvider::AllHie();
                                        @endphp
                                        <select type="text" id="hiera" name="hiera" class="form-control"
                                            placeholder="" required>
                                            <option></option>
                                            @foreach ($hies as $hie)
                                                <option value="{{ $hie->id }}">{{ $hie->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="piece">Pièce jointe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="piece" name="piece"
                                            accept=".jpg, .jpeg, .png" onchange="loadImage(event)" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- aperçu --}}
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="piece">Aperçu</label>
                                <div class="form-group">
                                    <img id="output" src="user.png"
                                        style="width: 70px; height: 70px; border-radius: 50%;" />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <label for="desc">Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" id="desc" name="desc" class="form-control"></textarea>
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

    <div class="modal fade" id="avis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Comment avez-vous trouvé le traitement de votre
                        préoccupation ? </h4>
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
@endsection
