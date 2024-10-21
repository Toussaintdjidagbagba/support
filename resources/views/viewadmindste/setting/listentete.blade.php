@extends('templatedste._temp')

@section('css')
    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="block-header">
            @include('flash::message')
            <h2>
                Entête/Footer
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Listes des entêtes et footer

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
                                        <th>Logo</th>
                                        <th>Titre</th>
                                        <th>Contenu Entete</th>
                                        <th>Alignement entete</th>
                                        <th>Footer Contenu 1 </th>
                                        <th>Footer Contenu 2 </th>
                                        <th>Alignement footer</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list as $ent)
                                        <tr>
                                            <td>
                                                @if($ent->logo)
                                                    <img src="{{ asset('documents/entete/' . $ent->logo)}}" 
                                                    alt="Logo" style="width: 70px; height: 70px; border-radius: 50%;">
                                                @else
                                                    Aucun logo
                                                @endif
                                            </td>
                                            <td>
                                                {{ $ent->titre }}
                                            </td>
                                            <td>
                                                {{ $ent->contenu_entete }}
                                            </td>
                                            <td>
                                                {{ $ent->alignement_entete }}
                                            </td>
                                            <td>
                                                {{ $ent->contenu_footer_col }}
                                            </td>
                                            <td>
                                                {{ $ent->contenu_footer_col2 }}
                                            </td>
                                            <td>
                                                {{ $ent->alignement_footer }}
                                            </td>
                                            <td>
                                                @if (in_array('update_service', session('auto_action')))
                                                    <button type="button" title="Modifier"
                                                        class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <a href="{{ route('ME', $ent->id) }}" style="color:white;"> <i
                                                                class="material-icons">system_update_alt</i></a>
                                                    </button>
                                                @endif

                                                @if (in_array('delete_service', session('auto_action')))
                                                    <button type="button" title="Supprimer" style="color:white;"
                                                        data-token="{{ csrf_token() }}" data-Id="{{ $ent->id }}"
                                                        onclick="DeleteH(event, '{{ route('DENT') }}')"
                                                        class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light">
                                                        <i class="material-icons">delete_sweep</i> 
                                                    </button>
                                                @endif



                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <center>Pas de services enregistrer!!!</center>
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

        function loadImage(event) {
            var output = document.getElementById('output');
            var file = event.target.files[0];

            if (file.type === "image/png") {
                output.src = URL.createObjectURL(file);
                output.onload = function() {
                    URL.revokeObjectURL(output.src);
                }
            } else {
                Swal.fire("Erreur", "Seules les images au format PNG sont autorisées.", "error");
                event.target.value = '';
            }
        };

        async function DeleteH(event, url) 
        {
            event.preventDefault();
            var target = event.currentTarget;
            var token = target.getAttribute('data-token') ?? "";
            var iddelete = target.getAttribute('data-Id') ?? "";

            const { isConfirmed } = await Swal.fire({
                title: "Êtes-vous sûr de vouloir supprimer cet entête ?",
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
                        method: 'POST', // Utilisation de POST
                        headers: {
                            'X-CSRF-TOKEN': token, // Envoi du token CSRF dans l'en-tête
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ id: iddelete }) // Envoi de l'ID dans le corps de la requête
                    });

                    if (response.status == 200) {
                        const data = await response.text();
                        Swal.fire("Succès", data, "success").then(() => {
                            window.location.reload();
                        });
                    } else {
                        throw new Error('Erreur lors de la suppression');
                    }
                } catch (error) {
                    Swal.fire("Erreur", "La suppression a échoué: " + error.message, "error");
                }
            }
        }

    </script>
@endsection

@section('model')
    <div class="modal fade" id="addentete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer une entête et un footer : </h4>
                </div>
                <form method="post" action="{{ route('AENTF') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="libelle">Logo :</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="piece" name="piece"
                                            accept=".jpg, .jpeg, .png" onchange="loadImage(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="libelle">Titre :</label>
                                        <div class="form-line">
                                            <input type="text" id="titre" name="titre" class="form-control"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="libelle">Contenu :</label>
                                        <input type="text" id="libelle" name="lib" class="form-control"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="alignment">Alignement Entete:</label>
                                    <div class="form-line">
                                        <select id="alignment_entete" name="alignment_entete" class="form-control">
                                            <option value="left">Aligner à gauche</option>
                                            <option value="center">Aligner au centre</option>
                                            <option value="right">Aligner à droite</option>
                                            <option value="justify">Justifié</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="piece">Aperçu</label>
                                <div class="form-group">
                                    <img id="output" src="logo.png" alt="logo"
                                        style="width: 70px; height: 70px; border-radius: 50%;" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                            <!-- Contenu du footer (2 colonnes) -->
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <label for="contenu_footer_col">Footer Contenu 1 :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="contenu_footer_col" name="contenu_footer_col" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <label for="contenu_footer_col2">Footer Contenu 2 :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="contenu_footer_col2" name="contenu_footer_col2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Alignement du footer -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="alignment_footer">Alignement Footer:</label>
                                    <div class="form-line">
                                        <select id="alignment_footer" name="alignment_footer" class="form-control">
                                            <option value="left">Aligner à gauche</option>
                                            <option value="center">Aligner au centre</option>
                                            <option value="right">Aligner à droite</option>
                                            <option value="justify">Justifié</option>
                                        </select>
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
