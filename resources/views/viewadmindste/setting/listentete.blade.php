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
                Entête
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Listes des entêtes

                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal"
                                data-target="#addentete">Ajouter</button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @php($i = 1)
                                    @forelse($list as $men)
                                        @if ($men->type == 'Avis')
                                            <tr>
                                                <th><span class="co-name">{{ $i }}</span></th>
                                                <td>{{ $men->libelle }}</td>
                                                <td>
                                                    @if (in_array('update_menu', session('auto_action')))
                                                        <button type="button" title="Modifier"
                                                            onclick="setupdate(event,'{{ $men->id }}','{{ $men->type }}','{{ $men->libelle }}')"
                                                            data-toggle="modal" data-target="#updates"
                                                            class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <i class="material-icons">system_update_alt</i>
                                                        </button>
                                                    @endif

                                                    @if (in_array('delete_menu', session('auto_action')))
                                                        <button type="button" title="Supprimer"
                                                            data-token="{{ csrf_token() }}" data-Id="{{ $men->id }}"
                                                            onclick="Delete(event, '{{ route('DMETAT') }}','{{ $men->type }}','{{ $men->libelle }}')"
                                                            class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <i class="material-icons">delete_sweep</i>
                                                        </button>
                                                    @endif
                                                </td>
                                                @php($i++)
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <center>Pas d'avis enregistrer!!!</center>
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
    <script type="text/javascript">
        async function Delete(event, url, type, libelle) {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";
            const {
                isConfirmed
            } = await Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer l\'' + type + ' <span class="text-danger">' +
                    libelle +
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

        function setupdate(event, id, type, libelle) {
            event.preventDefault();
            document.getElementById("idupdate").value = id;
            document.getElementById("utype").value = type;
            document.getElementById("ulibelle").value = libelle;
            document.getElementById("infotype").innerHTML = "l'" + id + " :";
        }
    </script>
@endsection

@section('model')
    <div class="modal fade" id="addentete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer une entête : </h4>
                </div>
                <form method="post" action="{{ route('AETAT') }}">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="type" value="Etat" />
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <label for="libelle">Libellé :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelle" name="lib" class="form-control"
                                            placeholder="" required>
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

    <div class="modal fade" id="updates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification de <span id="infotype"></span> </h4>
                </div>
                <form method="post" action="{{ route('SMETAT') }}">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" id="idupdate" name="uid" />
                        <div class="row clearfix">
                            <input type="hidden" id="utype" name="utype" class="form-control">
                            <div class="col-md-12">
                                <label for="ulibelle">Libellé :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="ulibelle" name="ulib" class="form-control"
                                            placeholder="" required>
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
@endsection
