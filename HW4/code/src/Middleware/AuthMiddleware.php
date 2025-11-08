<?php
// src/middleware/AuthMiddleware.php
namespace App\Middleware;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware {
    private string $secret;
    public function __construct(string $secret) { $this->secret = $secret; }

    /**
     * Returns decoded token object (stdClass) on success.
     * On failure, sends 401 JSON + exit.
     */
    public function handle() {
        $hdr = $_SERVER['HTTP_AUTHORIZATION'] ?? ($_SERVER['Authorization'] ?? '');
        if (preg_match('/Bearer\s(\S+)/', $hdr, $m)) {
            $token = $m[1];
            try {
                $decoded = JWT::decode($token, new Key($this->secret, 'HS256'));
                return $decoded;
            } catch (\Throwable $e) {
                http_response_code(401);
                echo json_encode(['error'=>'invalid_token','msg'=>$e->getMessage()]);
                exit;
            }
        }
        http_response_code(401);
        echo json_encode(['error'=>'missing_token']);
        exit;
    }
}
