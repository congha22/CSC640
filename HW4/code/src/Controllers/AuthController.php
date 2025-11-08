<?php
// src/controllers/AuthController.php
namespace App\Controllers;

use App\DB;
use Firebase\JWT\JWT;

class AuthController {
    private array $config;
    public function __construct(array $config) { $this->config = $config; }

    public function register(array $data): void {
        $pdo = DB::get();
        if (empty($data['email']) || empty($data['password'])) {
            http_response_code(400); echo json_encode(['error'=>'email+password required']); return;
        }
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        if ($stmt->fetch()) { http_response_code(409); echo json_encode(['error'=>'email exists']); return; }

        $pw = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$data['name'] ?? '', $data['email'], $pw]);
        $id = (int)$pdo->lastInsertId();
        http_response_code(201);
        echo json_encode(['id' => $id, 'email' => $data['email']]);
    }

    public function login(array $data): void {
        $pdo = DB::get();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$data['email'] ?? '']);
        $user = $stmt->fetch();
        if (!$user || !password_verify($data['password'] ?? '', $user['password'])) {
            http_response_code(401); echo json_encode(['error'=>'invalid credentials']); return;
        }
        $now = time();
        $payload = [
            'iss' => $this->config['jwt']['issuer'],
            'iat' => $now,
            'exp' => $now + $this->config['jwt']['expire_seconds'],
            'sub' => (int)$user['id'],
            'email' => $user['email']
        ];
        $jwt = JWT::encode($payload, $this->config['jwt']['secret'], 'HS256');
        echo json_encode(['access_token' => $jwt, 'token_type' => 'Bearer', 'expires_in' => $this->config['jwt']['expire_seconds']]);
    }
}
