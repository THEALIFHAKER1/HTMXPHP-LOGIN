<?php
include __DIR__ . '/../lib/database.php';
session_start();
switch( $_GET['action'] ) {
    case "register":
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            // Check if user already exists
            $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                ?>
            <div id="message" hx-swap-oob="true">
                <div class="text-red-700">User already register!</div>
            </div>
            <?php
            exit;
            } elseif ($password === $passwordConfirm) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $db->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$username, $email, $passwordHash]);
                ?>
                <div id="message" hx-swap-oob="true">
                    <div class="text-green-700">User Register!</div>
                </div>
                <?php
                header( "HX-Trigger: #loginForm click");
                exit;
            } else {
                ?>
            <div id="message" hx-swap-oob="true">
                <div class="text-red-700">Password do not Match!</div>
            </div>
            <?php
            exit;
            }
        } else {
            ?>
            <div id="message" hx-swap-oob="true">
                <div class="text-red-700">Please fill in all fields!</div>
            </div>
            <?php
            exit;
        }
        break;
    case "login":
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 3000);</script>";
                ?>
                <div id="message" hx-swap-oob="true">
                    <div class="text-green-700">
                        Login Success! Redirecting...
                    </div>
                </div>
                <?php
                exit;
            } else {
                ?>
                <div id="message" hx-swap-oob="true">
                    <div class="text-red-700">
                        Invalid username or password!
                    </div>
                </div>
                <?php
                exit;
            }
        } else {
            ?>
            <div id="message" hx-swap-oob="true">
                <div class="text-red-700">Please fill in all fields!</div>
            </div>
            <?php
            exit;
        }
        break;
    default:
        echo "default";
        break;
}