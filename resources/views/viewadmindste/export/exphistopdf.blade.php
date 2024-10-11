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
<!-- Footer -->
<div class="footer">
    <div class="title-footer">
        Date d'exportation : {{ now()->format('d/m/Y') }}
    </div>
</div>