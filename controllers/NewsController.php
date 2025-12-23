<?php

class NewsController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function list() {
        $stmt = $this->db->query("SELECT * FROM news ORDER BY created_at DESC");
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/news_list.php';
    }

    public function listByCategory($category) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE category = ? ORDER BY created_at DESC");
        $stmt->execute([$category]);
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/news_list.php';
    }

    public function view($id) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$item) {
            die("Լուրը չի գտնվել:");
        }

        $stmt = $this->db->prepare("SELECT id, author, comment_text, created_at FROM comments WHERE news_id = ? ORDER BY created_at DESC");
        $stmt->execute([$id]);
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/news_detail.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $category = $_POST['category'] ?? '';
            $author = $_SESSION['username'] ?? 'Անանուն';

            $image = "";
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = time() . "_" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . "/../uploads/" . $image);
            }

            $stmt = $this->db->prepare("INSERT INTO news (title, content, category, author, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $content, $category, $author, $image]);
            header("Location: index.php");
            exit;
        }
        include __DIR__ . '/../views/news_add.php';
    }

    public function delete($id) {
        if (isset($_SESSION['username'])) {
            $stmt = $this->db->prepare("SELECT image FROM news WHERE id = ?");
            $stmt->execute([$id]);
            $item = $stmt->fetch();
            if ($item && !empty($item['image'])) {
                @unlink(__DIR__ . "/../uploads/" . $item['image']);
            }

            $stmt = $this->db->prepare("DELETE FROM news WHERE id = ?");
            $stmt->execute([$id]);
        }
        header("Location: index.php");
        exit;
    }

    public function edit($id) {
        if (!isset($_SESSION['username'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $stmt = $this->db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $image = $item['image']; 

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                if (!empty($item['image'])) {
                    @unlink(__DIR__ . "/../uploads/" . $item['image']);
                }
                $image = time() . "_" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . "/../uploads/" . $image);
            }

            $stmt = $this->db->prepare("UPDATE news SET title=?, content=?, category=?, image=? WHERE id=?");
            $stmt->execute([$title, $content, $category, $image, $id]);
            
            header("Location: index.php?action=view&id=" . $id);
            exit;
        }

        include __DIR__ . '/../views/news_edit.php';
    }
}