<?php

namespace App\Models;

use PDO;
use App\Tools\DB;

class UserModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM utilisateurs WHERE email_user = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function create(string $login, ?string $email, string $motDePasse, string $fonction): bool
    {
        $sql = "INSERT INTO utilisateurs (login_user, email_user, pwd_user, fonction) 
                VALUES (:login, :email, :pwd, :fonction)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':login' => strtoupper($login),
            ':email' => $email ?: null,
            ':pwd' => password_hash($motDePasse, PASSWORD_DEFAULT),
            ':fonction' => $fonction
        ]);
    }
}
