<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de Paie Conseiller Commercial</title>
    <style>
        .body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            justify-content: center;
            flex-direction: column;
            background-color: #fff;
        }

        /* Header styles */

        .header,
        .footer {
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
            z-index: 100;
            border-bottom: 1px solid #000;
            padding: 10px;
            position: fixed;
        }


        .logo img {
            max-width: 100px;
            height: 100px;
            margin-inline-start: 5px;
            padding-left: 50px;
            padding-bottom: 25px;
            position: absolute;
            top: -22px;
            left: -25px;
        }

        .title {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 21px;
            font-weight: 300;
            text-align: center;
            color: #272727;
            width: 100%;
        }

        .info {
            position: absolute;
            top: 0;
            right: 20px;
            max-width: 200px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            font-size: 11px;
            text-align: {{ $entete->alignement_entete }};
        }

        /* Responsive */

        @media print {
            .container {
                page-break-before: always;
                padding-top: 150px;
            }
        }

        .details-section {
            margin-bottom: 30px;
        }

        /*  */
        .container {
            width: 85%;
            flex-direction: column;
            font-size: 12px;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2,
        h3 {
            color: #020202;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Amelioration */

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }

        .h2t {
            text-align: left;
            font-size: 17px;
            margin-top: 50px;
        }

        .col {
            border: none;

        }

        .ser {
            font-weight: 300;
        }

        /* Mise en page */

        .large {
            width: 100%;
            margin-top: 8px;
            border-spacing: 0;
            page-break-inside: avoid;
            padding-top: 30px;
        }

        .large td th {
            width: 40%;
            border: 1px solid #ccc;
            padding: 5px;
            text-align: left;
        }

        /* Footer */
        .footer {
            display: flex;
            text-align: center;
            justify-content: space-between;
            font-size: 10px;
            width: 100%;
            padding: 10px;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            position: fixed;
            border-top: 1px solid #000;
        }

        .footer-text {
            font-size: 10px;
            line-height: 1.5;
            color: #474747;
            text-align: {{ $entete->alignement_footer }};
        }

        .footer-right {
            width: 250px;
            float: right;
            font-size: 10.5px;
            font-weight: bold;
            padding-left: 610px;
        }
        .break
        {
            text-align: center;
            padding-top: 150px;
        }
    </style>

   
</head>
<body>

    <!-- Header -->
   <div class="header">
        <?php
            $path = public_path('documents/entete/' . $entete->logo);
            if (file_exists($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
        <div class="logo">
            <img src="{{ $base64 }}">
        </div>
        <?php
            } else {
                echo "Image non trouvée.";
            }
            ?>
        <div class="title">{{ $entete->titre }}</div>
        <div class="info"> {{ $entete->contenu_entete }} </div>
    </div>

    <!-- Body -->
    <div class="container">
        <div class="body-content">
        
            <h2 class="h2t">Fiche d'incident déclaré</h2>
            <h2 class="h2t">Fiche d'incident déclaré</h2><br>
            <table>
                @foreach($list as $inc)
                    <tr>
                        <td class="ser">Date Emission :</td>
                        <td>{{$inc->DateEmission}}</td>
                        <td class="ser">Etat d'Evolution :</td>
                        <td >{{ $inc->etats }} </td>
                    </tr>
                   
                    <tr>
                        <td class="ser">Module :</td>
                        <td>{{ $inc->Module }}</td>
                        <td class="ser">Date de résolution :</td>
                        <td>{{ $inc->DateResolue}}</td>
                    </tr>
                    
                    <tr>
                        <td class="ser">Hiérachisation : </td>
                        <td>{{ $inc->hierarchie}}</td>
                        <td rowspan="3" class="ser">Solution : </td>
                        <td rowspan="3">{{ $inc->resolue}}</td>
                    </tr>
                    
                    <tr>
                        <td class="ser">Categorie :</td>
                        <td>{{ $inc->cat}}</td>
                        
                    </tr>
                    
                    <tr>
                        <td class="ser">Description  :</td>
                        <td style="height: 40px; " > {{ $inc->description }}</td>
                        
                    </tr>
                    
                    <tr>
                        <td class="ser">Emetteur :</td>
                        <td>{{$inc->usersE}}</td>
                        <td class="ser">Technicien :</td>
                        <td>{{ $inc->usersA}}</td>
                    </tr>
                @endforeach
            </table>

            <br>

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
                                {{$inc->usersE}} 
                            </td>
                            <td style="height: 40px;">
                                {{ $inc->usersA }}
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

    <!-- Nouvelle page pour afficher l'image -->
    <div style="page-break-before: always;"></div> <!-- Forcer la nouvelle page dans le PDF -->

    <div class="break">
        <h2 class="h2t">Preuve d'incident</h2>
        <br>
        <div class="incident-image">
            @foreach($list as $item)
                <?php
                $path = public_path($item->piece);
            
                if (file_exists($path)) {
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                ?>
                    <img src="{{ $base64 }}" alt="Image de l'incident" width="600" height="500">
                <?php
                } else {
                    echo "Image non trouvée.";
                }
                ?>
            @endforeach

        </div>
    </div>
    
</body>
</html>
