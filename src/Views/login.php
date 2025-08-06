<?php require_once __DIR__ . '/base.php'; ?>

<h1 class="main-title">Connexion MVC</h1>

<div class="form-container login">

    <?php if (!empty($errors['global'])): ?>
        <div class="error global-error">
            <?= $errors['global'] ?>
        </div>
    <?php endif; ?>

    <form method="post" action="?route=login">
        <div class="switch">
            <a href="?route=register" class="btn-create">Créer un compte</a>
        </div>

        <div class="form-row">
            <label for="login">Utilisateur:</label>
            <input type="text" name="login" id="login" value="<?= htmlspecialchars($data['login'] ?? '') ?>">
            <?php if (!empty($errors['login'])): ?>
                <span class="error"><?= $errors['login'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-row">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>">
            <?php if (!empty($errors['email'])): ?>
                <span class="error"><?= $errors['email'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-row">
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password">
            <?php if (!empty($errors['password'])): ?>
                <span class="error"><?= $errors['password'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-actions">
            <button type="submit">Valider</button>
            <button type="reset" id="reset-btn">Annuler</button>
        </div>
    </form>
</div>
