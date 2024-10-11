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

        /* Footer styles */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 70px;
            background-color: #fff;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }

        .footer .title-footer {
            flex: 1;
            font-size: 12px;
            white-space: normal;
            padding: 0 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Maintenance currative</h2><br>
        <table>
            @foreach($list as $maint)
                <tr>
                    <td class="ser">Période </td>
                    <td colspan="3">{{ App\Providers\InterfaceServiceProvider::periodeMaintenancecurative($maint->maintenance) }}</td>
                </tr>
                <tr>
                    <td class="ser">Outils </td>
                    <td>{{App\Providers\InterfaceServiceProvider::getLibOutil($maint->outil)}}</td>
                    <td class="ser">Avis </td>
                    <td>{{ $maint->avisuser }}</td>
                </tr>
                <tr>
                    <td class="ser">Technicien </td>
                    <td colspan="3">{{App\Providers\InterfaceServiceProvider::LibelleUser($maint->action)}}</td>
                </tr>
            @endforeach
        </table><br>

        <table class="large">
            <thead>
                <tr>
                    <th>Etat</th>
                    <th>Observations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $maint)
                    <tr>
                        <td style="height: 40px;">
                            {{ $maint->etat }} 
                        </td>
                        <td style="height: 40px;">
                            {{ $maint->commentaireinf }}
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <div class="footer">
        <div class="title-footer">
            Date d'exportation : {{ now()->format('d/m/Y') }}
        </div>
    </div>
</body>
</html>
