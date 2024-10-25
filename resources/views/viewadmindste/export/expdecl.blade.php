<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de Paie Conseiller Commercial</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            margin-top: 50px;
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
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
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
            bottom: 160%;
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

        .break
        {
            text-align: center;
            padding-top: 200px;
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
