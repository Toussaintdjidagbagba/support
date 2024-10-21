<table>
    <tr>
        <th class="modal-title font-14" colspan="3"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 50px;">
            Liste gestion de la maintenance préventive
        </th>
    </tr>
</table><br><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Période</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Technicien</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Etat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $inc)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 180px;"><b>{{ $inc['periodedebut'] }} au {{ $inc['periodefin'] }}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 200px;">{{ $inc['usersL'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 160px;">{{ $inc['etat'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>