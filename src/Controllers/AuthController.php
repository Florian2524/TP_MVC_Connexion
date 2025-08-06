<?php
namespace App\Controllers;

use App\Models\UserModel;


class AuthController
{
    public function login()
    {
        $errors = [];
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            if (empty($data['login']) || !preg_match('/^[a-zA-Z\-]{2,}$/', $data['login'])) {
                $errors['login'] = "Nom d'utilisateur invalide";
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email invalide";
            }

            if (empty($data['password']) || strlen($data['password']) < 4) {
                $errors['password'] = "Mot de passe trop court";
            }

            // Vérification réelle non encore implémentée
        }

        require_once __DIR__ . '/../Views/login.php';
    }

    public function register()
    {
        $errors = [];
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            if (empty($data['login']) || !preg_match('/^[A-Z][a-z\-]{1,}$/', $data['login'])) {
                $errors['login'] = "Utilisateur invalide (1ère lettre majuscule, min 2 lettres)";
            }

            if (empty($data['password']) || strlen($data['password']) < 4) {
                $errors['password'] = "Mot de passe trop court (min 4 caractères)";
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email invalide";
            }

            if (empty($data['fonction']) || !preg_match('/^[a-zA-Z\- ]{2,}$/', $data['fonction'])) {
                $errors['fonction'] = "Fonction invalide (lettres uniquement)";
            }

            if (empty($errors)) {
                $userModel = new UserModel();
                $success = $userModel->create(
                    $data['login'],
                    $data['email'],
                    $data['password'],
                    $data['fonction']
                );

                if ($success) {
                    header('Location: ?route=login&success=1');
                    exit;
                } else {
                    $errors['global'] = "Erreur lors de l'enregistrement en base de données.";
                }
            }
        }

        require_once __DIR__ . '/../Views/register.php';
    }
}
