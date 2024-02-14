<div class="fade-in">
    <form id="loginForm" hx-post="/api/form.php?action=login"  hx-indicator="#spinner" hx-swap="beforeend" class="flex flex-col gap-2">
    <div class="flex flex-col gap-2">
            <label for="email">Email</label>
            <input class="px-2 rounded-md border-2 border-black" type="email" name="email" id="email"  autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label for="password">Password</label>
            <input class="px-2 rounded-md border-2 border-black" type="password" name="password" id="password"  autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <button type="submit" class="px-2 rounded-md border-2 border-black">Login</button>
        </div>
    </form>
</div>
