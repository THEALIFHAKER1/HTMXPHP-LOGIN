<?php
include 'Components/head.php';
if (isset($_SESSION['user_id'])) {
    session_destroy();
}
header('Location: /');
exit;