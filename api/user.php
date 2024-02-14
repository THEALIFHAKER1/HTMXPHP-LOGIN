<?php
include __DIR__ . '/../lib/database.php';
session_start();
switch( $_GET['action'] ) {
    case "getUser":
        if (isset($_SESSION['user_id'])) {
            $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch();
            ?>
            <div class="flex flex-row justify-between">
                <div>
                    <p>Username: <?php echo $user['username']; ?></p>
                    <p>Email: <?php echo $user['email']; ?></p>
                    <p>Password: <?php echo $user['password']; ?></p>
                    <p>Register Date: <?php echo $user['registration_date'] ?></p>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div>
                You haven't logged in yet!
            </div>
            <?php
        }
        break;
}