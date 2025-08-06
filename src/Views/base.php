<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion MVC</title>
    <link rel="stylesheet" href="../public/style.css">

</head>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const resetBtn = document.getElementById('reset-btn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            // Vider les champs
            const inputs = document.querySelectorAll('form input');
            inputs.forEach(input => {
                if (input.type === 'text' || input.type === 'password' || input.type === 'email') {
                    input.value = '';
                }
            });

            // Vider les messages d'erreur
            const errors = document.querySelectorAll('.error');
            errors.forEach(span => {
                span.textContent = '';
            });
        });
    }
});
</script>


<body>
