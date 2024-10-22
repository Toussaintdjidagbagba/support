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
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <label for="dateEmission">Date Emission :</label>
                                                <div class="form-line">
                                                    <input type="date" name="date_emission" id="dateEmission"
                                                        placeholder="Date d'émission..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="hierarchie">Hiérarchie :</label>
                                                <div class="form-line">
                                                    <input type="search" name="hierarchie" id="hierarchie"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="dateResolution">Date de résolution :</label>
                                                <div class="form-line">
                                                    <input type="date" name="date_resolution" id="dateResolution"
                                                        placeholder="Date de résolution..."
                                                        class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="affecter">Affecter :</label>
                                                <div class="form-line">
                                                    <input type="search" name="affecter" id="affecter"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <label for="modules">Modules :</label>
                                                <div class="form-line">
                                                    <input type="search" name="modules" id="modules"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="emetteur">Émetteur :</label>
                                                <div class="form-line">
                                                    <input type="search" name="emetteur" id="emetteur"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="etat">État :</label>
                                                <div class="form-line">
                                                    <input type="search" name="etat" id="etat"
                                                        placeholder="Mot clé..." class="form-control filter-input-width">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button onclick="searchButton(event)"
                                                class="btn btn-info btn-md">Rechercher</button>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger" style="margin-left: 25px; margin-bottom: 0px;"
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
                            Liste des incidents déclarés
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" id="incidentexp"
                                            onclick="paramincident('xlsx')">Exporter en Excel</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="paramincident('pdf')">Exporter en PDF</a>
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
                                        <th>Date Emission</th>
                                        <th data-priority="1">Modules</th>
                                        <th data-priority="3">Hiérachisation</th>
                                        <th data-priority="3">Emetteur</th>
                                        <th data-priority="3">Modifier Etat</th>
                                        <th data-priority="3">Date de résolution</th>
                                        <th data-priority="3">Affecter</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableContente">
                                  
                                </tbody>
                            </table>
                            {{-- {{ $list->links() }} --}}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endsection
    @section('js')
        <script type="text/javascript">
            const sessionUpdateEtat = "{{ in_array('update_etat', session('auto_action')) }}";
            const sessionUpdateIncie = "{{ in_array('update_incie', session('auto_action')) }}";
            const sessionAffecIncie = "{{ in_array('affec_incie', session('auto_action')) }}";
            const sessionViewDocIncie = "{{ in_array('viewdoc_incie', session('auto_action')) }}";
            const sessionDeleteIncie = "{{ in_array('delete_incie', session('auto_action')) }}";
            const sessionPrintPdfIncie = "{{ in_array('print_maint_pdf', session('auto_action')) }}";
            const sessionDelete = "{{ in_array('delete_incident', session('auto_action')) }}";

            let Gliste;
            let searchPerformed = false; 

            const router = {
                Deletes: "{{ route('DIA', ':id') }}",
                Updates: "{{ route('MTIA', ':id') }}",
            }
            let serve;

            function paramincident(format) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route('incident.export') }}';

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
                form.action = '{{ route('incidentrechexp') }}';

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

            window.onload = function() {
                recupListGestionIncident();
            };

            async function searchButton(event) {
                event.preventDefault();
                const dateEmission = document.getElementById('dateEmission').value;
                const hierarchie = document.getElementById('hierarchie').value;
                const dateResolution = document.getElementById('dateResolution').value;
                const affecter = document.getElementById('affecter').value;
                const desc = document.getElementById('desc').value;
                const modules = document.getElementById('modules').value;
                const emetteur = document.getElementById('emetteur').value;
                const etat = document.getElementById('etat').value;

                const params = new URLSearchParams({
                    date_emission: dateEmission,
                    dateResolution: dateResolution,
                    hierarchie: hierarchie,
                    desc: desc,
                    modules: modules,
                    affecter: affecter,
                    emetteur: emetteur,
                    etat: etat,
                }).toString(); 

                try {
                    let response = await fetch("{{ route('GIADTA') }}?" + params, {
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

            async function recupListGestionIncident() {
                console.log("Toutes les ressources de la page sont chargées, la fonction est exécutée.");

                try {
                    let response = await fetch("{{ route('GIADTA') }}", {
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
                        // console.log(data.list);
                        serve = data.serv;
                        console.log(serve);
                        afficherDonnees(data.list);
                    }
                } catch (error) {
                    console.error("Erreur attrapée:", error);
                }
            }

            function afficherDonnees(list) {
                const tbody = document.getElementById('tableContente');
                tbody.innerHTML = '';

                if (list.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="9"><center>Pas d'incident enregistrés !!!</center></td></tr>`;
                    return;
                }
                console.log(list);
                    list.forEach((currentline, index, arry) => {
                        const contenu = '<tr>' +
                            '<th><span class="co-name">' + currentline["DateEmission"] + '</span></th>' +
                            '<td>' + currentline["Module"] + '</td>' +
                            '<td>' +
                            '<span class="' +
                            (currentline["hierarchie"] === 'Bloquant' ? 'text-danger' :
                                currentline["hierarchie"] === 'Gênant' ? 'text-warning' :
                                currentline["hierarchie"] === 'Confort' ? 'text-primary' : '') + '">' +
                            (currentline["hierarchie"] || 'Aucune hiérarchie') +
                            '</span>' +
                            '</td>' +
                            '<td>' + currentline["usersE"] + '</td>' +
                            '<td class="d-flex justify-content-between align-items-center">' +
                            '<span>' + currentline["etats"] +
                            '</span>' +
                            (sessionUpdateEtat ?
                                '<button class="btn bg-deep-orange btn-circle btn-xs ml-2" data-target="#etatincident" data-color="deep-orange" data-toggle="modal" title="Etat" onClick="getetat(' +
                                currentline["id"] + ')">' + '<i class="material-icons">edit</i>' +
                                '</button>' : "") +
                            '</td>' +
                            '<td>' + currentline["DateResolue"] +
                            '</td>' +
                            '<td class="d-flex justify-content-between align-items-center">' +
                            '<span>' + currentline["usersA"] + '</span>' +
                            (sessionAffecIncie ?
                                '<button class="btn bg-deep-orange waves-effect btn-circle btn-xs ml-2" data-target="#affecteincident" data-color="deep-orange" data-toggle="modal" onClick="getaffectation(' +
                                currentline["id"] + ')" title="Affectation">' +
                                '<i class="material-icons">send</i>' +
                                '</button>' : "") +
                            '</td>' +
                            '<td class="d-flex justify-content-between align-items-center">' +
                            (currentline["piece"] ?
                                sessionViewDocIncie ?
                                '<button type="button" onClick="javascript:window.open(\'' + currentline[
                                    "piece"] +
                                '\', \'\');" title="Visualiser" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light">' +
                                '<i class="material-icons">visibility</i>' +
                                '</button>' : "" :
                                '') +
                            

                            (sessionPrintPdfIncie ?
                                '<button onclick="getdeclaind(event,\'pdf\')" data-Id="' + currentline["id"] +
                                '" type="button" title="PDF" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">' +
                                '<path fill="currentColor" d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268z"/>' +
                                '<path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z"/>' +
                                '</svg>' +
                                '</button>' : "") +

                            (sessionUpdateIncie ?
                                '<button type="button" title="Modifier" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light">' +
                                '<a href="' + router.Updates.replace(':id', currentline["id"]) +
                                '" style="color:white;"><i class="material-icons">system_update_alt</i></a>' +
                                '</button>' : "") +
                            (currentline["etats"] != null ?
                                sessionDeleteIncie ?
                                '<button type="button" title="Supprimer" style="color:white;" onclick="Delete(event, \'' +
                                router.Deletes.replace(':id', currentline["id"]) +
                                '\')" class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light">' +
                                '<i class="material-icons">delete_sweep</i>' +
                                '</button>' : "" :
                                "") +
                            '</td>' +
                            '</tr>';
                        tbody.innerHTML += contenu;
                    });
            }

            function getetat(id) {
                document.getElementById('idincidentetat').value = id;
            }

            function getaffectation(id) {
                let options = '<select type="text" class="form-control" name="tech" id="tech">';
                serve.forEach(function(item) {
                    options += '<option value="' + item.idUser + '" ' + (item.idUser == id ? 'selected' : '') + '>' +
                        item.nom + ' ' + item.prenom + '</option>';
                });

                options += '</select>';

                document.getElementById('idaffecteincident').value = id;

                document.getElementById('selecttech').innerHTML = options;
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
                    <form method="post" action="{{ route('GISA') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="mod">Module</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="mod" name="module" class="form-control"
                                                placeholder="">
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
                                                <option disabled selected>Selectionner une catégorie</option>
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
                                                <option disabled selected>Selectionner une hiérachie</option>
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
                                                accept=".jpg, .jpeg, .png" onchange="loadImage(event)">
                                        </div>
                                        <script>
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
                                                    alert('Seules les images JPG ou PNG sont autorisées.');
                                                    event.target.value = ''; // réinitialiser le champ fichier
                                                }
                                            };
                                        </script>
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

        <div class="modal fade" id="etatincident" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Changer d'Etat : </h4>
                    </div>
                    <form method="post" action="{{ route('CEI') }}">
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" id="idincidentetat" name="idincidentetat" />
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="etat">Etat : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select type="text" class="form-control" name="etat" id="etat">
                                                @php($etats = App\Providers\InterfaceServiceProvider::alletats())
                                                @foreach ($etats as $etat)
                                                    <option value="{{ $etat->id }}">{{ $etat->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="obs">Observation : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="obs" id="obs">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="contenumail">Contenu mail : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="contenumail"
                                                id="contenumail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                                data-dismiss="modal">FERMER</button>
                            <button type="submit" class="btn bg-deep-orange waves-effect">CHANGER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="affecteincident" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Affectation d'incident : </h4>
                    </div>
                    <form method="post" action="{{ route('AII') }}">
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" id="idaffecteincident" name="idaffecteincident" />
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label for="tech">Technicien : </label>
                                    <div class="form-group">
                                        <div class="form-line" id="selecttech">

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                                data-dismiss="modal">FERMER</button>
                            <button type="submit" class="btn bg-deep-orange waves-effect">AFFECTER</button>
                        </div>
                    </form>'
                </div>
            </div>
        </div>
    @endsection
