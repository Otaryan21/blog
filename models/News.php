<?php
class News {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function getAll() {
        return $this->conn->query("SELECT * FROM news ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCategory($category) {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE category = ? ORDER BY created_at DESC");
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $category, $image, $author) {
        $stmt = $this->conn->prepare("INSERT INTO news (title, content, category, image, author) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $content, $category, $image, $author]);
    }

    public function update($id, $title, $content, $category, $image = null) {
        if ($image) {
            $query = "UPDATE news SET title = ?, content = ?, category = ?, image = ? WHERE id = ?";
            $params = [$title, $content, $category, $image, $id];
        } else {
            $query = "UPDATE news SET title = ?, content = ?, category = ? WHERE id = ?";
            $params = [$title, $content, $category, $id];
        }
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getConnection() { return $this->conn; }
}