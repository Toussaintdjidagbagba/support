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
        font-size: 12px;
    }
    th {
        background-color: #f2f2f2;
    }
   
    /* Footer styles */
    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 10px;
    }

    .footer .title-footer {
        flex: 1;
        font-size: 12px;
        white-space: normal;
        font-weight: bold;
        text-align: left;
        padding-left: 83%;
        position: relative;
        top: 130%;
    }
</style>
<table>
    <tr>
        <th class="modal-title font-14" colspan="1"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 16px;">
            Liste gestion de la maintenance currative
        </th>
    </tr>
</table><br><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Date de réception</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Durée d'arret</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Outils</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Technicien</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; height: 30px;">Etat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $inc)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 180px;"><b>{{ $inc['date_debut'] }}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 200px;">{{ $inc['heures'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 200px;">{{ $inc['nameoutils'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 200px;">{{ $inc['usersL'] ?? 'N/A' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 160px;">{{ $inc['etat'] ?? 'N/A' }}</td>
            </tr>
        @endforeach
    
    </tbody>
</table>

<!-- Footer -->
<div class="footer">
    <div class="title-footer">
        Date d'exportation : {{ now()->format('d/m/Y') }}
    </div>
</div>