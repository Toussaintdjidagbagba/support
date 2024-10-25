<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <style>
           
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
                <h2 class="h2t">Maintenance préventive</h2><br>
                <table>
                    @foreach ($list as $maint)
                        <tr>
                            <td class="ser">Période début :</td>
                            <td>{{ $maint->Deb }}</td>
                            <td class="col" colspan="1">&nbsp;</td>
                            <td style="width: 300px;" class="ser">Technicien :</td>
                        </tr>

                        <tr>
                            <td class="ser">Période fin :</td>
                            <td>{{ $maint->Fin }}</td>
                            <td class="col" colspan="1">&nbsp;</td>
                            <td style="width: 300px;">{{ $maint->usersT }}</td>
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
                </table><br>
                <div class="details-section">
                    @foreach ($list as $maint)
                        <h3>Caractéristiques de {{ $maint->nameoutils }} :</h3><br>
                    @endforeach
                    <div class="details-grid">
                        <table>
                            @foreach ($details as $detail)
                                <tr>
                                    <td class="ser"><strong>{{ $detail->libelle }}</strong></td>
                                    <td style="width: 400px; height:2px;">
                                        {{ isset($carct[$detail->code]) ? $carct[$detail->code] : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="body-content-plus">
                <table class="">
                    <thead>
                        <tr>
                            <th>Signature de l'emetteur</th>
                            <th>Signature du Technicien</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $inc)
                            <tr>
                                <td style="height: 40px;">
                                    {{ $inc->usersL }}
                                </td>
                                <td style="height: 40px;">
                                    {{ $inc->usersT }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br>
                <table class="">
                    <thead>
                        <tr>
                            <th>Valeur de l'emetteur</th>
                            <th>Valeur du Technicien</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $maint)
                            <tr>
                                <td style="height: 40px;">
                                    {{ $maint->usersL }}
                                </td>
                                <td style="height: 40px;">
                                    {{ $maint->usersT }}
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
                {{ $entete->contenu_footer_col }}<br>
            </div>
            <div class="footer-text">
                {{ $entete->contenu_footer_col2 }}
            </div>
        </div>

    </body>

</html>
