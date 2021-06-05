<?php

    require 'db.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM people WHERE id=:id";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['id' => $id]);
    header('Location: /pdo/crud-pdo/index.php');