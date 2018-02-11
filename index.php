<?php

function is_email ($email) {
  return preg_match("/.+@.+\..+/", $email) ;
}
function is_email_exists($email) {
  return false ;
   // $user = User::where('email', $email)->first();
   // return !empty($user);
}
$errors = [];
$old_values = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (strlen($name) < 4) {
    $errors['name'] = "name value can't be less than 4 character";
    $old_values['name'] = $name;
  }
 if (strlen($email) < 4) {
    $errors['email'] = "email value can't be less than 4 character";
    $old_values['email'] = $email;
  } else if (!is_email($email)) {
    $errors['email'] = "provided email is not valid email";
    $old_values['email'] = $email;
  } else if (is_email_exists($email)) {
    $errors['email'] = "email already exist in database";
    $old_values['email'] = $email;
  }
  
  if (strlen($password) < 4) {
    $errors['password'] = "password value can't be less than 4 character";
    $old_values['password'] = $password;
  }
  if (!count($errors)) {
    //do register
  }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="mt-5">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="card mb-5">
              <div class="card-header">
                <h2>Register</h2>
              </div>

              <div class="card-body">
                <form method="post" action="">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input value="<?php echo $old_values['name'] ?? ''; ?>" type="text" name="name" id="name" class="form-control">
                      <?php if(isset($errors['name'])): ?>
                        <small class="text-danger"><?php echo $errors['name'] ?></small>
                      <?php endif; ?>
                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input value="<?php echo $old_values['email'] ?? ''; ?>" type="text" name="email" id="email" class="form-control">
                      <?php if(isset($errors['email'])): ?>
                        <small class="text-danger"><?php echo $errors['email'] ?></small>
                      <?php endif; ?>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input value="<?php echo $old_values['password'] ?? ''; ?>" type="password" name="password" id="password" class="form-control">
                      <?php if(isset($errors['password'])): ?>
                        <small class="text-danger"><?php echo $errors['password'] ?></small>
                      <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <p>
                      Already have a account ? <a href="#">Login here</a>
                    </p>
                    <button type="submit" class="btn btn-outline-primary">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>