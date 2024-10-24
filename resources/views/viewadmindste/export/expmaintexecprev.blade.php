<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        @media print {
            .container {
                page-break-before: always;
                padding-top: 150px; /* Ajustez cette valeur selon vos besoins */
            }
        }

        body {
            font-family: Arial, sans-serif;
            /* height: 100vh; */
            display: flex;
            flex-direction: column;
            justify-content: center; 
            background-color: #fff;
        }

        .container {
            width: 85%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            margin-top: -80px;
            font-size: 12px;
            display: flex;
            flex-direction: column;
            justify-content: center; 
            align-items: center; 
            flex-grow: 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            
        }

        /* Header styles */
        .header, .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            width: 100%;
        }

        .header {
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            z-index: 100;
        }

        .header .logo, .footer .logo-footer {
            width: 100px;
            justify-content: center;
        }

        .logo
        {
            padding-left: 50px;
            padding-bottom: 10px;
        }

        .footer .title-footer {
            font-size: 18px;
            font-weight: bold;
            flex: 1;
            text-align: center;
        }

        .title
        {
            position: relative;
            bottom: 70px;
            font-size: 21px;
            font-weight: 300;
            flex: 1;
            text-align: center;
            color: #272727;
        }

        .info{
            width: 100px;
            position: relative;
            left: 80%;
            bottom: 165%;
            max-width: 200px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            font-size: 11px;
            text-align: {{ $entete->alignement_entete }};
        }

        /* Body section */
        .body-content {
            width: 100%;
            margin-top: 120px; 
            margin-bottom: 100px; 
            padding: 20px;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td, th {
            padding: 10px;
            border: 1px solid #000;
        }

        .large th, .large td {
            width: 40%;
            text-align: left;
        }

        /* Footer styles */
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: white;
            position: relative;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            height: 80px;
            bottom: 0;
            left: 0;
            right: 0;
            position: fixed;
        }

        .footer-right 
        {
            width: 250px;
            display: flex;
            justify-content: right;
            align-items: center;
            font-size: 10.5px;
            font-weight: bold;
            padding-left: 610px;
        }

        .footer-text {
            flex: 1;
            text-align: {{ $entete->alignement_footer }};
            font-size: 10px;
            line-height: 1.4;
            padding-left: 70px;
            padding-right: 80px;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        
        .h2t
        {
            text-align: center;
            padding-bottom: 30px;
            font-size: 17px;
        }

        .col
        {
            border: none;
            
        }

        .ser
        {
            font-weight: 300;
        }


    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <?php
            $path = public_path('documents/entete/' . $entete->logo);
            if (file_exists($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
                <img src="{{ $base64 }}" width="100" height="100">
            <?php
            } else {
                echo "Image non trouvée.";
            }
            ?>
        </div>
        <div class="title">{{ $entete->titre }}</div>
        <div class="info">
            {{ $entete->contenu_entete }}
        </div>
    </div>

    <!-- Body -->
    <div class="container">
        <div class="body-content">
        
            <h2 class="h2t">Execution maintenance préventive</h2><br>
            <table>
                @foreach ($list as $maint)
                    <tr>
                        <td class="ser">Période début  :</td>
                        <td>{{$maint->Deb}}</td>
                        <td class="col" colspan="1">&nbsp;</td>
                        <td style="width: 300px;" class="ser">Technicien :</td>
                    </tr>

                    <tr>
                        <td class="ser">Période fin :</td>
                        <td>{{$maint->Fin}}</td>
                        <td class="col" colspan="1">&nbsp;</td>
                        <td style="width: 300px;" >{{$maint->usersT}}</td>
                    </tr>
                   
                    <tr>
                        <td class="ser">Outils :</td>
                        <td>{{ $maint->nameoutils }}</td>
                        <td class="col" colspan="1">&nbsp;</td>
                        <td class="col" rowspan="2">&nbsp;</td>
                    </tr>

                    <tr>
                        <td class="ser">Utilisateur :</td>
                        <td>{{ $maint->usersL }}</td>
                        <td class="col" colspan="1">&nbsp;</td>
                    </tr>
                    
                @endforeach
            </table>

            <br>

            <div class="details-section">
                @foreach ($list as $maint)
                    <h3>Caractéristiques de {{ $maint->nameoutils}} :</h3><br>
                @endforeach
                <div class="details-grid">
                    <table>
                        @foreach($details as $detail)
                            <tr>
                                <td class="ser"><strong>{{ $detail->libelle }}</strong></td>
                                <td style="width: 400px; height:2px;">{{ isset($carct[$detail->code]) ? $carct[$detail->code] : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            
            <br>
            <table class="large">
                <thead>
                    <tr>
                        <th>Avis Utilisateur </th>
                        <th>Avis Technicien</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $maint)
                        <tr>
                            <td style="height: 40px;">
                                {{$maint->avisuser}}
                            </td>
                            <td style="height: 40px;">
                                {{$maint->avisinf}}
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table><br>

            <table class="large">
                <thead>
                    <tr>
                        <th>Observation de l'utilisateur</th>
                        <th>Observation du Technicien</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $maint)
                        <tr>
                            <td style="height: 40px;">
                                {{$maint->commentaireuser}}
                            </td>
                            <td style="height: 40px;">
                                {{$maint->commentaireinf}}
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table><br>

            <table class="large">
                <thead>
                    <tr>
                        <th>Signature de l'emetteur</th>
                        <th>Signature du Technicien</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $inc)
                        <tr>
                            <td style="height: 40px;">
                                {{$inc->usersL}} 
                            </td>
                            <td style="height: 40px;">
                                {{ $inc->usersT}}
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-right">
            Date d'exportation : {{ now()->format('d/m/Y') }}
        </div><br>
        <div class="footer-text">
            {{ $entete->contenu_footer_col}}<br>
        </div>
        <div class="footer-text">
            {{ $entete->contenu_footer_col2}}
        </div>
    </div>

</body>
</html>
