<?php
    require 'db.php';
    $sql = "SELECT * FROM people";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $people = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All People</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($people as $person): ?>
                    <tr>
                        <td><?= $person->id; ?></td>
                        <td><?= $person->name; ?></td>
                        <td><?= $person->email; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $person->id ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a
                                onclick="return confirm('Are you sure you want to delete this person?');"
                                href="delete.php?id=<?= $person->id ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>