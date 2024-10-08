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
                <div class="card">
                    <div class="header">
                        <h2>
                            Liste des incidents
                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">Ajouter</button>
                        </h2>
                        <br>
                        <form action="{{ route('GI') }}" method="get" role="form">
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
                                <tbody>
                                    @forelse($list as $inc)
                                        <tr>
                                            <th>
                                                <span
                                                    class="co-name">{{ App\Providers\InterfaceServiceProvider::formatDate($inc->DateEmission) }}
                                                </span>
                                            </th>
                                            <td>{{ $inc->Module }}</td>
                                            <td>{{ $inc->description ?? '---' }}</td>
                                            <td>
                                                @php
                                                    $hiera = App\Providers\InterfaceServiceProvider::LibelleHier(
                                                        $inc->hierarchie,
                                                    );
                                                @endphp
                                                @if ($hiera)
                                                    <span
                                                        class="@if ($hiera == 'Bloquant') text-danger @elseif ($hiera == 'Gênant') text-warning @elseif ($hiera == 'Confort') text-primary @endif">
                                                        {{ $hiera }}
                                                    </span>
                                                @else
                                                    <span>Aucune hiérarchie</span>
                                                @endif
                                            </td>
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleCat($inc->cat) }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::TempsCats($inc->id, $inc->cat, $inc->created_at) }}
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::libetat($inc->etat) }}
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                @if ($inc->avis == '' || $inc->avis == null)
                                                    <a class="btn bg-blue btn-circle btn-xs ml-2 item-center"
                                                        onclick="getid({{ $inc->id }})"
                                                        data-id="getid({{ $inc->id }})" data-color="deep-orange"
                                                        data-toggle="modal" data-target="#avis"><i
                                                            class="material-icons">grade</i></a>
                                                @else
                                                    {{ $inc->avis }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($inc->statut != 1)
                                                    @if (in_array('update_incident', session('auto_action')))
                                                        <button type="button" title="Modifier"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <a href="{{ route('MTI', $inc->id) }}" style="color:white;"> <i
                                                                    class="material-icons">system_update_alt</i></a>

                                                        </button>
                                                    @endif

                                                    @if (in_array('delete_incident', session('auto_action')))
                                                        <button type="button" title="Supprimer" style="color:white;"
                                                            onclick="Delete(event,'{{ route('DI', $inc->id) }}')"
                                                            class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i
                                                                class="material-icons">delete_sweep</i>
                                                        </button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">
                                                <center>Pas d'incident enregistrer!!!</center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $list->links() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
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
                alert('Seules les images JPG ou PNG sont autorisées.');
                event.target.value = ''; // réinitialiser le champ fichier
            }
        };
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
                                        <select type="text" id="cat" name="cat" class="form-control" required>
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
                                        <input type="file" class="form-control" id="piece" name="piece" accept=".jpg, .jpeg, .png" onchange="loadImage(event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- aperçu --}}
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="piece">Aperçu</label>
                                <div class="form-group">
                                    <img id="output" src="user.png" style="width: 70px; height: 70px; border-radius: 50%;" />
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
