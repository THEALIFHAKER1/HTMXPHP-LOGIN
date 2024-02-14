<?php
include 'Components/head.php';
?>
<div 
    id="userInformation" 
    hx-get="/api/user.php?action=getUser" 
    hx-trigger="load" 
    hx-swap="outerHTML"
>
    <h1 class="text-3xl font-bold">
        Loading...
    </h1>
</div>