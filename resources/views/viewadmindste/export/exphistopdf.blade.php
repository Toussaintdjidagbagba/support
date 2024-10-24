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
            margin-top: 100px;
            font-size: 13px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

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
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .header .logo,
        .footer .logo-footer {
            width: 100px;
            justify-content: center;
        }

        .logo {
            padding-left: 50px;
            padding-bottom: 10px;
        }

        .header .title,
        .footer .title-footer {
            font-size: 18px;
            font-weight: bold;
            flex: 1;
            text-align: center;
        }

        .info {
            width: 100px;
            position: relative;
            left: 80%;
            bottom: 50%;
            max-width: 200px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            font-size: 12px;
            text-align: {{ $entete->alignement_entete }};
        }

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

        td,
        th {
            padding: 10px;
            border: 1px solid #000;
        }

        .large th,
        .large td {
            width: 40%;
            text-align: left;
        }

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

        .footer-right {
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
            font-size: 10px;
            text-align: {{ $entete->alignement_footer }};
            line-height: 1.4;
            padding-left: 70px;
            padding-right: 80px;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        .j
        {

        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <div class="title">{{ $entete->titre }}</div>

        <div class="info">
            {{ $entete->contenu_entete }}
        </div>
    </div>

    <!-- Body -->
    <div class="container">
        <div class="body-content">
            @php
                $outilName = $data->isNotEmpty() && isset($data->first()->out) ? $data->first()->out : 'Outil inconnu';
            @endphp

            <table>
                <tr>
                    <th class="modal-title font-14" colspan="1"
                        style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 16px;">
                        L'historique de {{ $outilName }}
                    </th>
                </tr>
            </table><br>
            <table>
                <thead>
                    <tr>
                        <th
                            style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">
                            Date</th>
                        <th
                            style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">
                            Traces</th>
                        <th
                            style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">
                            Utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $hist)
                        <tr>
                            <td style="vertical-align:middle; text-align: left; width: 50px; height:30px;">
                                <b>{{ $hist->created_at ?? '___' }}</b></td>
                            <td style="vertical-align:middle; text-align: left; width: 120px; height:30px;">
                                {{ $hist->libelle ?? '___' }}</td>
                            <td style="vertical-align:middle; text-align: left; width: 30px; height:30px;">
                                {{ $hist->nom . ' ' . $hist->prenom ?? '___' }}</td>
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
            {{ $entete->contenu_footer_col }}<br>
        </div>
        <div class="footer-text">
            {{ $entete->contenu_footer_col2 }}
        </div>
    </div>
</body>

</html>
