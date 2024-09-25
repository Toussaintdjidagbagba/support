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
            </tr>
        @endforeach
    </tbody>
    
</table>