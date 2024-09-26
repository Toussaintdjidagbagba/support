<style>
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
@php
    $outilName = $data->isNotEmpty() ? $data->first()->nameoutils : 'Outil inconnu';
@endphp
<table>
    <tr>
        <th class="modal-title font-14" colspan="1"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 16px;">
            L'historique de {{ $outilName }}
        </th>
    </tr>
</table><br><br>
<table>
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Date</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Traces</th>
            <th style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px; height: 30px;">Utilisateur</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $hist)
            <tr>
                <td style="vertical-align:middle; text-align: left; width: 50px; height:30px;" ><b>{{ $hist->created_at ?? '___' }}</b></td>
                <td style="vertical-align:middle; text-align: left; width: 120px; height:30px;">{{ $hist->libelle ?? '___' }}</td>
                <td style="vertical-align:middle; text-align: left; width: 30px; height:30px;">{{ $hist->nom . ' ' . $hist->prenom ?? '___' }}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>