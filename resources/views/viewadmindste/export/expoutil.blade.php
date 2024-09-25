<table>
    <tr>
        <th class="modal-title font-14" colspan="5"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 13px;">
            Liste des outils
        </th>
    </tr>
</table><br>
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
            <td style="vertical-align:middle; text-align: left; width: 180px;"><b>{{ $out['reference'] ?? '___' }}</b></td>
            <td style="vertical-align:middle; text-align: left; width: 180px;">{{ $out['dateacquisition'] ?? '___' }}</td>
            <td style="vertical-align:middle; text-align: left; width: 100px;">{{ $out['nameoutils'] ?? '___' }}</td>
            <td style="vertical-align:middle; text-align: left; width: 178px;">{{ $out['categorie'] ?? '___'}}</td>
            <td style="vertical-align:middle; text-align: left; width: 180px;">{{ $out['user'] ?? '___'}}</td>
        </tr>
    @endforeach
    </tbody>
    
</table>