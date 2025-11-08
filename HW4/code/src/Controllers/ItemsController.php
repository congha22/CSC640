<?php
// src/controllers/ItemsController.php
namespace App\Controllers;
use App\DB;

class ItemsController {
    private array $config;
    public function __construct(array $config) { $this->config = $config; }

    public function index(): void {
        $pdo = DB::get();
        $stmt = $pdo->query("SELECT items.id, title, description, items.created_at, users.name as owner FROM items JOIN users ON items.user_id = users.id ORDER BY items.id DESC");
        echo json_encode($stmt->fetchAll());
    }

    public function show(int $id): void {
        $pdo = DB::get();
        $stmt = $pdo->prepare("SELECT items.id, title, description, items.created_at, users.name as owner FROM items JOIN users ON items.user_id = users.id WHERE items.id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) { http_response_code(404); echo json_encode(['error'=>'not_found']); return; }
        echo json_encode($row);
    }

    public function store(array $data, $user): void {
        $title = trim($data['title'] ?? '');
        if ($title === '') { http_response_code(400); echo json_encode(['error'=>'title required']); return; }
        $description = $data['description'] ?? '';
        $pdo = DB::get();
        $stmt = $pdo->prepare("INSERT INTO items (user_id, title, description) VALUES (?, ?, ?)");
        $stmt->execute([(int)$user->sub, $title, $description]);
        http_response_code(201);
        echo json_encode(['id' => (int)$pdo->lastInsertId(), 'title' => $title]);
    }

    public function update(int $id, array $data, $user): void {
        $pdo = DB::get();
        // ensure item belongs to user
        $stmt = $pdo->prepare("SELECT user_id FROM items WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) { http_response_code(404); echo json_encode(['error'=>'not_found']); return; }
        if ((int)$row['user_id'] !== (int)$user->sub) { http_response_code(403); echo json_encode(['error'=>'forbidden']); return; }

        $title = $data['title'] ?? null;
        $desc = $data['description'] ?? null;
        if ($title === null && $desc === null) { http_response_code(400); echo json_encode(['error'=>'nothing_to_update']); return; }

        $updates = [];
        $params = [];
        if ($title !== null) { $updates[] = "title = ?"; $params[] = $title; }
        if ($desc !== null) { $updates[] = "description = ?"; $params[] = $desc; }
        $params[] = $id;
        $sql = "UPDATE items SET " . implode(', ', $updates) . " WHERE id = ?";
        $pdo->prepare($sql)->execute($params);
        echo json_encode(['ok' => true]);
    }

    public function delete(int $id, $user): void {
        $pdo = DB::get();
        $stmt = $pdo->prepare("SELECT user_id FROM items WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) { http_response_code(404); echo json_encode(['error'=>'not_found']); return; }
        if ((int)$row['user_id'] !== (int)$user->sub) { http_response_code(403); echo json_encode(['error'=>'forbidden']); return; }
        $pdo->prepare("DELETE FROM items WHERE id = ?")->execute([$id]);
        echo json_encode(['ok' => true]);
    }
}
