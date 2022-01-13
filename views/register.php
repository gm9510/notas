<?php

?>

<h1> Register </h1>

<form action="" method="POST">
  <div class="form-group">
    <label for="InputFirstname">Firstname</label>
    <input type="text" name="firstname" class="form-control" id="InputFirstname" aria-describedby="Firstname">
  </div>
  <div class="form-group">
    <label for="InputLastname">Lastname</label>
    <input type="text" name="lastname" class="form-control" id="InputLastname" aria-describedby="Lastname">
  </div>
  <div class="form-group">
    <label for="InputEmail">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="InputPassword">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword">
  </div>
  <div class="form-group">
    <label for="InputPasswordRepeat">Confirm Password</label>
    <input type="password" name="confirmPassword" class="form-control" id="InputPasswordRepeat">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
