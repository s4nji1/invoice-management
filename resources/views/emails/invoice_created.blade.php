<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Facture Créée</title>
</head>
<body>
    <h1>Nouvelle Facture Créée</h1>
    <p>Bonjour,</p>
    <p>Une nouvelle facture a été créée :</p>
    <ul>
        <li><strong>Client :</strong> {{ $invoice->client_name }}</li>
        <li><strong>Montant :</strong> {{ $invoice->amount }} MAD</li>
        <li><strong>Statut :</strong> {{ $invoice->status }}</li>
    </ul>
    <p>Merci de consulter votre tableau de bord pour plus de détails.</p>
</body>
</html>
