<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page non trouvée</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center">Erreur 404</h1>
    <p class="text-center">La page que vous recherchez n'existe pas.</p>
    <div class="text-center">
        <a href="{{ url('/books') }}" class="btn btn-primary">Retour à la liste des livres</a>
    </div>
</div>

</body>
</html>
