@extends('templatedste._temp')

@section('css')
    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <style type="text/css">
        .cumul {
            text-align: center;
            color: green;
            font-weight: bold;
        }

        .ti {
            text-align: center;
            color: blue;
            font-weight: bold;
        }

        .titexte {
            text-align: center;
            color: blue;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Tableau de bord
                <small></small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h5>
                            <button type="button"
                                style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;"
                                class="btn bg-deep-orange waves-effect" data-color="deep-orange"> <a
                                    href="{{ route('GI') }}" style="text-style:none; color:white">Incidents</a>
                            </button>
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <label for="debut">Période début</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="month" id="debut" name="debut" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="fin">Période fin</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="month" id="fin" name="fin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </h5> <br>
                    </div>
                    <div class="body">
                        <div id="hiear"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        Morris.Bar({
            element: 'hiear',
            data: ,
            xkey: 'MOIS',
            ykeys: ['genant', 'moyen', 'faible'],
            labels: ['Bloquant', 'Gênant', 'Confort'],
            barColors: ["#FF0000", "#d29f13", "#001e60"],
            hideHover: 'auto'
        });

        async function init() {
            try {

                let response = await fetch("{{ route('getstatistique') }}", {
                    method: 'post',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        periodedebut: 0,
                        periodefin: 0
                    })
                });

                if (response.status == 200) {

                    // Récupérer les données JSON de la réponse

                    data = await response.json();

                    depenseslist = data.data.depenses;

                    let rowsHTML = '';

                    let i = 1;
                    let soldedepense = 0;
                    let newRow = '';
                    document.getElementById('titrepagedec').innerHTML = 'Décaissement > Exécution ';
                    depenseslist.forEach(enc => {
                        if (enc.etat == 0) {
                            /*newRow += '<tr>';
                            newRow += '<td>' + enc.description + '</td>';
                            newRow += '<td style="text-align: right">' + formatNumberWithSpaces(enc.quantite) + '</td>';
                            newRow += '<td style="text-align: right">' + new Intl.NumberFormat('fr-FR').format(enc.montant) + '</td>';
                            newRow += '<td>' + enc.periode + '</td>';
                            newRow += '<td>' + enc.date + '</td>'; */
                            newRow += '<tr>';
                            newRow += '<td>' + enc.description + '</td>';
                            newRow += '<td style="text-align: right">' + new Intl.NumberFormat('fr-FR').format(
                                Math.round(enc.montant)) + '</td>';
                            newRow += '<td style="text-align: right">' + new Intl.NumberFormat('fr-FR').format(
                                Math.round(enc.montantht)) + '</td>';
                            newRow += '<td style="text-align: right">' + new Intl.NumberFormat('fr-FR').format(
                                Math.round(enc.montanttva)) + '</td>';
                            newRow += '<td>' + enc.numpiece + '</td>';
                            newRow += '<td>' + enc.datefacture + '</td>';
                            newRow += '<td>' + enc.dateexigibilite + '</td>';
                            newRow += '<td> Non réglé </td>';
                            newRow +=
                                `<td> <button type="button" title="Exécuter"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#exec" data-values='["${enc.id}","${escapeQuotes(enc.description)}", "${enc.montantht}" , "${enc.montanttva}", "${enc.montant}"]'  onclick="getexecute(this)"><i class="material-icons">play_circle_filled</i></a> </button> </td>`;

                            // onclick="getexecutenew('+enc.id+', \''+enc.description+'\', \''+enc.montantht+'\', \''+enc.montanttva+'\', \''+enc.montant+'\')"
                            newRow += '</tr>';

                            //newRow += '<td>' + enc.date + '</td>';
                            soldedepense = soldedepense + enc.montant;

                            newRow += '</tr>';
                        }
                    });

                    if (newRow == "") {
                        document.getElementById('listdepens').innerHTML =
                            '<tr> <td colspan="9"><center> Aucun décaissement réalisé disponible pour ce projet. </center> </td> </tr>';
                    } else {
                        document.getElementById('listdepens').innerHTML = newRow;
                        //document.getElementById('soldetotauxdec').innerHTML = 'Montant Total des Dépenses réalisée : '+ new Intl.NumberFormat('fr-FR').format(soldedepense)+' F CFA';
                    }

                } else {
                    return "";
                }
            } catch (error) {
                return "";
            }
        }
    </script>
@endsection
