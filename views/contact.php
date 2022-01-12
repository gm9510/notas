<?php

?>

<h1> Contact </h1>

<form action="" method="POST">
  <div class="form-group">
    <label for="InputSubject">Subject</label>
    <input type="text" name="subject" class="form-control" id="InputSubject" aria-describedby="Subject">
  </div>
  <div class="form-group">
    <label for="InputEmail">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="InputPassword">Body</label>
    <textarea name="body" class="form-control" id="InputPassword">
    </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
