<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche d'intervention</title>
    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            width: 85%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 10px;
            padding-top: 15px;
            font-size: 13px;
            margin-top: 50px;
        }

        .title {
            text-align: right;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .num {
            text-align: right;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            padding-left: 18px;
            padding-right: 18px;
        }

        td {
            padding: 10px;
            border: 1px solid #000;
        }

        .large th, .large td {
            width: 40%;
            text-align: left;
        }

        .large th {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .description-table th, .description-table td {
            border: 1px solid #000;
            text-align: left;
            padding: 10px;
        }

        .description-table th {
            text-align: center;
        }

        .ser{
            width: 15%;
            font-weight: 500;
            color: #111111;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Gestion Maintenance préventive</h2><br>
        <table>
            @foreach($list as $maint)
                <tr>
                    <td class="ser">Periode Début :</td>
                    <td>{{App\Providers\InterfaceServiceProvider::formatDate($maint->periodedebut)}}</td>
                    <td class="ser">Période Fin :</td>
                    <td>{{ App\Providers\InterfaceServiceProvider::formatDate($maint->periodefin) }}</td>
                </tr>
                <tr>
                    <td class="ser">Technicien :</td>
                    <td colspan="3">{{App\Providers\InterfaceServiceProvider::LibelleUser($maint->user)}}</td>
                </tr>
            @endforeach
        </table><br>

        <table class="description-table">
            <thead>
                <tr>
                    <th colspan="2">Commentaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $maint)
                    <tr>
                        <td colspan="2" style="height: 40px;">
                            {{ $maint->commentaire}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
