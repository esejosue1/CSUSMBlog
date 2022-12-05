<?php
    $title = "";
    $subtitle = "";
    $content = "";
    $thumbnail = "";

    // Check if it is POST request.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get variables from form submission.
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $content = $_POST['content'];
        // TODO: Replace with actual thumbnail from request
        $thumbnail = "https://picsum.photos/200";

        // Validate form data.
        try {
            if (!isset($title) || !is_string($title)) {
                throw new Exception("Title is not a string.");
            } else if (!isset($subtitle) || !is_string($subtitle)) {
                throw new Exception("Subtitle is not a string.");
            } else if (!isset($content) || !is_string($content)) {
                throw new Exception("Content is not a string");
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            die($message);
        }

        // Connect to SQL server
        try {
            $connString = "mysql:host=localhost; dbname=csusmblog";
            $user = "root";
            $pass = "root";
            $pdo = new PDO($connString, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //$pdo is the main SQL accessor variable
        } catch (Exception $e) {
            $message = $e->getMessage();
            die($message);
        }

        // Generate random postId
        $postID = rand();
        // Generate random adminID
        $adminID = 11; // adminID for justinyum

        // Get dates
        $createdAt = date("Y-m-d");
        $updatedAt = date("Y-m-d");

        // After connecting, insert a new post.
        $statement = $pdo->prepare("INSERT INTO Post (postID, adminID, title, subtitle, content, createdAt, updatedAt, thumbnail) VALUES (:postID, :adminID, :title, :subtitle, :content, :createdAt, :updatedAt, :thumbnail)");
        $statement->execute([
            'postID' => $postID,
            'adminID' => $adminID,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt,
            'thumbnail' => $thumbnail
        ]);

        // If fininshed, redirect to home page.
        header("Location: http://localhost:8888/blog-home.php");
    }
?>