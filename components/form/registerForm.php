<div class="fade-in">
    <form id="registerForm" hx-post="/api/form.php?action=register" hx-swap="beforeend" hx-indicator="#spinner" class="flex flex-col gap-2">
        <div class="flex flex-col gap-2">
            <label for="username">Username</label>
            <input class="px-2 rounded-md border-2 border-black" type="text" name="username" id="username" autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label for="email">Email</label>
            <input class="px-2 rounded-md border-2 border-black" type="email" name="email" id="email"  autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label for="password">Password</label>
            <input class="px-2 rounded-md border-2 border-black" type="password" name="password" id="password"  autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label for="passwordConfirm">Confirm Password</label>
            <input class="px-2 rounded-md border-2 border-black" type="password" name="passwordConfirm" id="passwordConfirm"  autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <button type="submit" class="px-2 rounded-md border-2 border-black">Register</button>
        </div>
    </form>
</div>
