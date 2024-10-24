<table>
    <tr>
        <th class="modal-title font-14" colspan="7"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 13px;">
            Liste des incidents
        </th>
    </tr>
</table><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Date Emission</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Modules</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Description</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Hiérachisation</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Categorie</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Temps restant</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Etat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $inc)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 170px;"><b>{{ $inc['DateEmission'] ?? 'N/A'}}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['Module'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 180px;">{{ $inc['Description'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 110px;">{{ $inc['hierarchie'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['categorie'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['temps'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['etat'] ?? 'N/A'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
