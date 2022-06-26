<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <main id="main-holder">
         <h1 id="login-header">Login</h1>
         <div id="login-error-msg-holder">
            <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
         </div>
         <form id="login-form" method="post" action="index.php">
            <input type="text" name="email" id="username-field" class="login-form-field" placeholder="Username"/>
            <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password"/>
            <?php include('errors.php'); ?>
            <input type="submit" value="Login" name="login_user" id="login-form-submit"/> 
         </form>
      </main>
   </body>
</html>