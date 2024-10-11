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
        font-size: 14px;
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
<table>
    <tr>
        <th class="modal-title font-14" colspan="1"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 16px;">
            Liste des outils
        </th>
    </tr>
</table><br><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Référence</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Date d'acquisition</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Libelle</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Catégorie d'outil</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Utilisateur</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Etat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $out)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 80px;"><b>{{ $out['reference'] ?? '___' }}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 60px;">{{ $out['dateacquisition'] ?? '___' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 70px;">{{ $out['nameoutils'] ?? '___' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $out['categorie'] ?? '___'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 80px;">{{ $out['user'] ?? '___'}}</td>
                <td style="vertical-align:middle; text-align: left; width: 80px;">{{ $out['etat'] ?? 'N/A'}}</td>
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