<?php

    require "db.php";

    $id = $_GET['id'];
    $sql = 'SELECT * FROM people WHERE id=:id';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['id' => $id]);
    $person = $stmt->fetch(PDO::FETCH_OBJ);

    if ( isset($_POST['name']) && isset($_POST['email']) ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "UPDATE people SET name=:name, email=:email WHERE id=:id";
        $stmt = $connection->prepare($sql);
        if ( $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]) ) {
            header('Location: /pdo/crud-pdo/index.php');
        }
    }
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update Information</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input value="<?= $person->email; ?>" type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info mt-3 text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>