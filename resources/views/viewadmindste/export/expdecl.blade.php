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
            width: 18%;
            font-weight: 500;
            color: #111111;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Incidents déclarés</h2><br>
        <table>
            @foreach($list as $inc)
                <tr>
                    <td class="ser">Date Emission :</td>
                    <td>{{App\Providers\InterfaceServiceProvider::formatDate($inc->DateEmission)}}</td>
                    <td class="ser">Date de résolution :</td>
                    <td>{{ App\Providers\InterfaceServiceProvider::formatDate($inc->DateResolue) }}</td>
                </tr>
                <tr>
                    <td class="ser">Modules :</td>
                    <td>{{ $inc->Module }}</td>
                    <td class="ser">Hiérachisation :</td>
                    <td>{{ App\Providers\InterfaceServiceProvider::LibelleHier($inc->hierarchie) }}</td>
                </tr>
                <tr>
                    <td class="ser">Emetteur :</td>
                    <td colspan="3">{{App\Providers\InterfaceServiceProvider::LibelleUser($inc->Emetteur)}}</td>
                </tr>
            @endforeach
        </table><br>

        <table class="large">
            <thead>
                <tr>
                    <th>Etat</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $inc)
                    <tr>
                        <td style="height: 40px;">
                            {{ App\Providers\InterfaceServiceProvider::libetat($inc->etat) }} 
                        </td>
                        <td style="height: 40px;">
                            {{ $inc->description }}
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table><br>


        <table class="description-table">
            <thead>
                <tr>
                    <th colspan="2">Suggestion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $inc)
                    <tr>
                        <td colspan="2" style="height: 40px;">
                            {{ $inc->sugg }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
