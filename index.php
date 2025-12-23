<?php
session_start();
date_default_timezone_set('Asia/Yerevan');

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'config/Database.php';
require 'models/News.php';
require 'models/User.php';
require 'models/Comment.php';
require 'controllers/NewsController.php';
require 'controllers/UserController.php';

$database = new Database();
$db = $database->getConnection();

$newsController = new NewsController($db);
$userController = new UserController($db);

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$categoryName = $_GET['name'] ?? null;

switch ($action) {
    case 'view':
        $newsController->view($id);
        break;

        case 'delete_comment':
    $comment_id = $_GET['comment_id'] ?? null;
    $news_id = $_GET['news_id'] ?? null;
    if ($comment_id && isset($_SESSION['username'])) {
        $commentModel = new Comment($db);
        $commentModel->delete($comment_id);
    }
    header("Location: index.php?action=view&id=" . $news_id);
    exit;
    break;
        
    case 'add':
        if (!isset($_SESSION['username'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $newsController->add();
        break;

    case 'edit':
        if ($id) {
            if (!isset($_SESSION['username'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $newsController->edit($id);
        }
        break;

    case 'delete':
        if ($id) {
            if (!isset($_SESSION['username'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $newsController->delete($id);
        }
        break;

    case 'category':
        if ($categoryName) {
            $newsController->listByCategory($categoryName);
        } else {
            $newsController->list();
        }
        break;

    case 'add_comment':
        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = trim($_POST['comment_text'] ?? '');
            if (!empty($text)) {
                $author = $_SESSION['username'] ?? 'Անանուն';
                $commentModel = new Comment($db);
                $commentModel->add($id, $author, $text);
            }
            header("Location: index.php?action=view&id=" . $id);
            exit;
        }
        break;

    case 'login':
        $userController->login();
        break;

    case 'register':
        $userController->register();
        break;

    case 'logout':
        $userController->logout();
        break;

    default:
        $newsController->list();
        break;
}