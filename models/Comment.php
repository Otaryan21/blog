<?php

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($news_id, $author, $text) {
        $stmt = $this->db->prepare("INSERT INTO comments (news_id, author, comment_text) VALUES (?, ?, ?)");
        return $stmt->execute([$news_id, $author, $text]);
    }

    public function delete($comment_id) {
    $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
    return $stmt->execute([$comment_id]);
}

    public function getByNewsId($news_id) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE news_id = ? ORDER BY created_at DESC");
        $stmt->execute([$news_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}