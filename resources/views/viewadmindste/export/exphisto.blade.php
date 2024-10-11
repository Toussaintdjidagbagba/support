@php
    $outilName = $data->isNotEmpty() ? $data->first()->nameoutils : 'Outil inconnu';
@endphp
<table>
    <tr>
        <th class="modal-title font-14" colspan="3"
            style="vertical-align:middle; text-align: center; background-color: black; color: white; font-size: 13px;">
            L'historique de {{ $outilName }}
        </th>
    </tr>
</table><br>
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
            <td style="vertical-align:middle; text-align: left; width: 180px; height:50px;"><b>{{ $hist->created_at ?? '___' }}</b></td>
            <td style="vertical-align:middle; text-align: left; width: 551px; height:50px;">{{ $hist->libelle ?? '___' }}</td>
            <td style="vertical-align:middle; text-align: left; width: 200px; height:30px;">{{ $hist->nom . ' ' . $hist->prenom  ?? '___' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
