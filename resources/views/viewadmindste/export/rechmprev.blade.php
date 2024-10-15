<table>
    <tr>
        <th class="modal-title font-14" colspan="7"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 50px;">
            Liste des maintenance préventive
        </th>
    </tr>
</table><br><br>
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
                <td style="vertical-align:middle; text-align: left; width: 180px;"><b>{{ $inc['periode'] }}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['nameoutils'] }}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['commentaireuser'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 185px;">{{ $inc['avisuser'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 200px;">{{ $inc['usersL'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 120px;">{{ $inc['etat'] }}</td>
                <td style="vertical-align:middle; text-align: left; width: 160px;">{{ $inc['commentaireinf'] }}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>