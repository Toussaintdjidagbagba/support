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
                            Liste des incidents déclarés

                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#add">Ajouter</button>
                        </h2><br><br>
                        <form action="{{ route('GIA') }}" method="get" role="form">
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

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
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
                                <tbody>
                                    @forelse($list as $inc)
                                        <tr>
                                            <th><span
                                                    class="co-name">{{ App\Providers\InterfaceServiceProvider::formatDate($inc->DateEmission) }}</span>
                                            </th>
                                            <td>{{ $inc->Module }}</td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleHier($inc->hierarchie) }}
                                            </td>

                                            <td>{{ App\Providers\InterfaceServiceProvider::LibelleUser($inc->Emetteur) }}
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                <span>
                                                    {{ App\Providers\InterfaceServiceProvider::libetat($inc->etat) }} 
                                                </span>
                                                @if (in_array('update_etat', session('auto_action')))
                                                    <button class="btn bg-deep-orange btn-circle btn-xs ml-2"
                                                        data-target="#etatincident" data-color="deep-orange"
                                                        data-toggle="modal" title="Etat"
                                                        onClick="getetat({{ $inc->id }})">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td>{{ App\Providers\InterfaceServiceProvider::formatDate($inc->DateResolue) }}
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                <span>
                                                    {{ App\Providers\InterfaceServiceProvider::LibelleUser($inc->affecter) }}
                                                </span>
                                                @if (in_array('affec_incie', session('auto_action')))
                                                    <button class="btn bg-deep-orange waves-effect btn-circle btn-xs ml-2"
                                                        data-target="#affecteincident" data-color="deep-orange"
                                                        data-toggle="modal" onClick="getaffectation({{ $inc->id }})"
                                                        title="Affectation">
                                                        <i class="material-icons">send</i>
                                                    </button>
                                                    @php
                                                        $sers = App\Providers\InterfaceServiceProvider::alladminandsuperadmin();
                                                    @endphp

                                                    <script>
                                                        function getetat(id) {
                                                            document.getElementById('idincidentetat').value = id;
                                                        }

                                                        function getaffectation(id) {
                                                            const serv =
                                                                @json($sers); // Récupérer les données des administrateurs en JSON depuis la variable php et l'injecter dans le script
                                                            let options = '<select type="text" class="form-control" name="tech" id="tech">';
                                                            serv.forEach(function(item) {
                                                                options +=
                                                                    `<option value="${item.idUser}" >${item.nom} ${item.prenom}</option>`;
                                                            });

                                                            options += '</select>';

                                                            document.getElementById('idaffecteincident').value = id;

                                                            document.getElementById('selecttech').innerHTML = options;
                                                        }
                                                    </script>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($inc->piece != '')
                                                    @if (in_array('viewdoc_incie', session('auto_action')))
                                                        <button type="button"
                                                            onClick="javascript:window.open('{{ $inc->piece }}', '');"
                                                            title="Visualiser"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <i class="material-icons">visibility</i>
                                                        </button>
                                                    @endif
                                                @endif

                                                @if (in_array('update_incie', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <a href="{{ route('MTIA', $inc->id) }}" style="color:white;"> <i
                                                                class="material-icons">system_update_alt</i></a>
                                                    </button>
                                                @endif

                                                @if ($inc->etat != null)
                                                    @if (in_array('delete_incie', session('auto_action')))
                                                        <button type="button" title="Supprimer" style="color:white;"
                                                            onclick="Delete(event, '{{ route('DIA', $inc->id) }}')"
                                                            class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <i class="material-icons">delete_sweep</i>
                                                        </button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
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

    @endsection
    @section('js')
        <script type="text/javascript">
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
                                                placeholder="" >
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
                                            <input type="file" id="piece" name="piece" accept=".pdf"
                                                class="form-control" placeholder="">
                                        </div>
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
