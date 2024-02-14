<?php

include 'Components/head.php';
if(isset($_SESSION['user_id'])) {
  header("Location: /");
  exit;
}

?>
  <h1 class="text-3xl font-bold">
    Welcome User!
  </h1>
  <div class="flex gap-2">
    <button hx-get="components/form/loginForm.php" hx-target="#FormContainer" hx-swap="innerHTML" hx-trigger="click" class="px-2 rounded-md border-2 border-black">Login</button>
    <button hx-get="components/form/registerForm.php" hx-target="#FormContainer" hx-swap="innerHTML" hx-trigger="click" class="px-2 rounded-md border-2 border-black">Register</button>
  </div>
  <div class="h-fit w-[300px] flex flex-col gap-2 relative ">
    <div id="FormContainer" class="form border-2 border-black rounded-md p-5">
      <div class="w-full h-full flex justify-center items-center text-center ">
        Please choose an action!
      </div>
    </div>
    <div id="message"></div>
    <img id="spinner" class=" htmx-indicator absolute w-[100px] h-[100px] left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/image/loading.gif"/>
  </div>
<?php include 'Components/foot.php' ?>