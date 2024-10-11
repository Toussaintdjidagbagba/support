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
            Liste des incidents
        </th>
    </tr>
</table><br><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Date Emission</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Modules</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Description</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Hiérachisation</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Categorie</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Temps restant</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Etat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $inc)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 110px;"><b>{{ $inc['DateEmission'] ?? 'N/A'}}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 60px;">{{ $inc['Module'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 60px;">{{ $inc['Description'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 70px;">{{ $inc['hierarchie'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $inc['categorie'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 80px;">{{ $inc['temps'] ?? 'N/A'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 80px;">{{ $inc['etat'] ?? 'N/A'}}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>