<?php

// table posts, columns: id, title, body, author, is_published, created_at

// Connection details
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pdoposts';

// Set DSN
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // default fetch attr
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // enable limit in sql queries like variable

// -------------------------------------------------------

# PDO QUERY
// $stmt = $pdo->query('SELECT * FROM posts');

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['title'].'<br>';
// }

// while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
//     echo $row->title . '<br>';
// }

// while ($row = $stmt->fetch()) {
//     echo $row->title . '<br>';
// }

// -------------------------------------------------------

// -------------------------------------------------------

# PREPARED STATEMENTS (prepare & execute)

// UNSAFE
// $sql = "SELECT * FROM posts WHERE author= '$author'";

// FETCH MULTIPLE POSTS
// User Input -> Dynamically through frontend
$author = 'john';
$is_published = true;
$id = '1';
$limit = 2;

// Positional params
// $sql = "SELECT * FROM posts WHERE author = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $posts = $stmt->fetchAll();

// Named Params
// $sql = "SELECT * FROM posts WHERE author = :author && is_published = :is_published";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['author' => $author, 'is_published' => $is_published]);
// $posts = $stmt->fetchAll();

// foreach ($posts as $post) {
//     echo $post->title . '<br>';
// }

// -------------------------------------------------------

// -------------------------------------------------------

// FETCH SINGLE POST
// $sql = "SELECT * FROM posts WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $post = $stmt->fetch();

// echo $post->body;

// -------------------------------------------------------

// -------------------------------------------------------

// GET ROW COUNT
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
// $stmt->execute([$author]);
// $postCount = $stmt->rowCount();

// echo $postCount;

// -------------------------------------------------------

// -------------------------------------------------------

// INSERT DATA
// $title = 'Post 5';
// $body = 'Text for post 5';
// $author = 'Kevin';

// $sql = "INSERT INTO posts(title, body, author) VALUES (:title, :body, :author)";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);

// echo 'Post Added';

// -------------------------------------------------------

// -------------------------------------------------------

// UPDATE DATA
// $id = 1;
// $body = 'Text for post 5 updated';

// $sql = "UPDATE posts SET body = :body WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id, 'body' => $body]);

// echo 'Post Updated';

// -------------------------------------------------------

// -------------------------------------------------------

// DELETE DATA
// $id = 3;

// $sql = "DELETE FROM posts WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);

// echo 'Post Deleted';

// -------------------------------------------------------

// -------------------------------------------------------

// SEARCH DATA
// $search = '%post%';
// $sql = "SELECT * FROM posts WHERE title LIKE ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$search]);
// $posts = $stmt->fetchAll();

// foreach($posts as $post) {
//     echo $post->title . '<br>';
// }

// -------------------------------------------------------

// -------------------------------------------------------

// LIMIT POSTS
// $sql = "SELECT * FROM posts LIMIT ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$limit]);
// $posts = $stmt->fetchAll();

// foreach ($posts as $post) {
//     echo $post->title . '<br>';
// }