<table>
    <tr>
        <th class="modal-title font-14" colspan="6"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 13px;">
            Liste des incidents déclarés
        </th>
    </tr>
</table><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Date Emission</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Modules</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Hiérachisation</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Emetteur</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Etat</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Date de résolution</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; font-size: 11,8px; height: 30px;">Affecter</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $inc)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 180px;"><b>{{ $inc['DateEmission']}}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['Module'] }}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['hierarchie'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 185px;">{{ $inc['emetteur'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 180px;">{{ $inc['etat'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 180px;">{{ $inc['DateResolue']}}</td>
                <td style="vertical-align:middle; text-align: left; width: 180px;">{{ $inc['affecter']}}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>