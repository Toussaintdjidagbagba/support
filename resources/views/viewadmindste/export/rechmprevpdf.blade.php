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
            padding: 10px;
            margin-top: 75px;
            font-size: 11px;
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
            font-size: 12px;
            text-align: {{ $entete->alignement_entete }};
        }

        /* Body section */
        .body-content {
            width: 100%;
            margin-top: 120px; 
            margin-bottom: 100px; 
            padding: 10px;
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
            padding-left: 870px;
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
        .j{}
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
            <table>
                <tr>
                    <th class="modal-title font-14" colspan="1"
                        style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 50px;">
                        Liste des maintenance préventive
                    </th>
                </tr>
            </table><br>
            <table>
                <thead>
                    <tr>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Période</th>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Outil</th>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Obs. Utilisateur</th>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Avis</th>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Technicien</th>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Etat</th>
                        <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Obs. Inf.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $inc)
                        <tr>
                            <td style="vertical-align:middle; text-align: left; width: 160px;"><b>{{ $inc['periode'] }}</b></td>
                            <td style="vertical-align:middle; text-align: left; width: 90px;">{{ $inc['nameoutils'] }}</td>
                            <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['commentaireuser'] ?? 'N/A' }}</td>
                            <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['avisuser'] ?? 'N/A' }}</td>
                            <td style="vertical-align:middle; text-align: left; width: 140px;">{{ $inc['usersL'] ?? 'N/A' }}</td>
                            <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['etat'] }}</td>
                            <td style="vertical-align:middle; text-align: left; width: 120px;">{{ $inc['commentaireinf'] }}</td>
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