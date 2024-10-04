<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche d'intervention</title>
    <style>

.details-container {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
}

h4 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

h5 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
}

.details-section {
    margin-top: 10px;
}

.details-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.details-grid div {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.details-grid div strong {
    font-weight: 600;
    display: block;
}

.details-grid div p {
    margin: 5px 0 0;
    font-size: 14px;
    color: #333;
}

    </style>
</head>
<body>
    <div class="details-container">
        <h4>Détails des outils</h4>
    
        <div class="details-section">
            <h5>Caractéristiques de {{ $outil->nameoutils}} :</h5><br><br>
            <div class="details-grid">
                @foreach($details as $detail)
                <div>
                    <strong>{{ $detail->libelle }}</strong>
                    <p>{{ isset($carct[$detail->code]) ? $carct[$detail->code] : 'N/A' }}</p>
                </div>
             @endforeach
                
            </div>
        </div>
       
    </div>
    
</body>
</html>
