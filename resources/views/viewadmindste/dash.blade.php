@extends('templatedste._temp')

@section('css')
    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                            <input type="month" id="debut" onblur="getstat()" name="debut" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="fin">Période fin</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="month" id="fin" onblur="getstat()" name="fin" class="form-control">
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

    <script>
        
        getstat();

        async function getstat() {
            try {
                pdebut = document.getElementById('debut').value;
                pfin = document.getElementById('fin').value;
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                let response = await fetch("{{ route('getstatistique') }}", {
                    method: 'post',
                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        periodedebut: pdebut,
                        periodefin: pfin
                    })
                });

                if (response.status == 200) {

                    // Récupérer les données JSON de la réponse

                    document.getElementById('hiear').innerHTML = "";

                    data = await response.json();

                    Morris.Bar({
                        element: 'hiear',
                        data: data,
                        xkey: 'MOIS',
                        ykeys: ['Genant', 'Bloquant', 'Confort'],
                        labels: ['Gênant', 'Bloquant', 'Confort'],
                        barColors: ["#d29f13", "#FF0000", "#001e60"],
                        hideHover: 'auto'
                    }); 
                    
                } else {
                    return "";
                }
            } catch (error) {
                return "";
            }
        }
    </script>
@endsection


