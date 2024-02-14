<?php
session_start();
include __DIR__ . '/../lib/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTMX LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
</head>
<style>
    .fade-in {
      animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    .htmx-indicator{
        opacity:0;
        display: none;
        transition: opacity infinite ease-in;
    }
    .htmx-request .htmx-indicator{
        display: block;
        opacity:1
    }
    .htmx-request.htmx-indicator{
        display: block;
        opacity:1
    }
  </style>
<body class="p-5 space-y-4 fade-in">
<nav class="">
        <div class="flex flex-row justify-between">
          <div class="flex items-center gap-4">
            <ul class=" md:flex hidden items-center space-x-4 text-sm  ">
            <?php
                $menuItems = [
                    ['href' => '/', 'text' => 'Home'],
                ];

                foreach ($menuItems as $menuItem) {
                    echo '<li>';
                    echo '<a href="' . $menuItem['href'] . '">';
                    echo $menuItem['text'];
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
          </div>
        <?php if ($_SERVER['REQUEST_URI'] !== '/login.php') { ?>
            <div>
                <ul class="md:flex hidden items-center space-x-4 text-sm  ">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<li>';
                        echo '<a href="/logout.php"  >';
                        echo 'Logout';
                        echo '</a>';
                        echo '</li>';
                    } else {
                        echo '<li>';
                        echo '<a href="/login.php"  >';
                        echo 'Login';
                        echo '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>
        </div>
      </nav>