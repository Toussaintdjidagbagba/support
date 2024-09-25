<style>
    @page {
        size: A4 landscape;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 5px;
        text-align: left;
        font-size: 13px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
<table>
    <tr>
        <th class="modal-title font-14" colspan="1"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 50px;">
            Liste des incidents déclarés
        </th>
    </tr>
</table><br><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Date Emission</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Modules</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Hiérachisation</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Emetteur</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Etat</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Date de résolution</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $inc)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 80px;"><b>{{ $inc['DateEmission']}}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 60px;">{{ $inc['Module'] }}</td>
                <td style="vertical-align:middle; text-align: left; width: 70px;">{{ $inc['hierachie'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 178px;">{{ $inc['emetteur'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 80px;">{{ $inc['etat'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 80px;">{{ $inc['DateResolue']}}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>