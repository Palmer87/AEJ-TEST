<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Décision de projet</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #0d6efd; }
        .info { margin-bottom: 20px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Décision du comité de validation</h1>

    <div class="info">
        <p><span class="label">Projet :</span> {{ $projet->titre }}</p>
        <p><span class="label">Promoteur :</span> {{ $projet->promoteur->user->name }}</p>
        <p><span class="label">Date :</span> {{ $projet->updated_at }}</p>
        <p><span class="label">Statut :</span> {{ $projet->status }}</p>
        @if($justification)
        <p><span class="label">Justification :</span> {{ $justification }}</p>
        @endif
    </div>

    <p>La décision est enregistrée et archivée.</p>
</body>
</html>
