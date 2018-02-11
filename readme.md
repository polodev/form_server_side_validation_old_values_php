# form serverside validation with errors and old value     

Basic validation for email   

~~~php
function is_email ($email) {
  return preg_match("/.+@.+\..+/", $email) ;
}
~~~

initialization  `$errors` and `$old_values` array for keeping track old value and errors  
~~~php
$errors = [];
$old_values = [];
~~~

checking form is submitted or not 

~~~php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // do something
}
~~~

generating error or old value on conditions  

~~~php
if (strlen($name) < 4) {
  $errors['name'] = "name value can't be less than 4 character";
  $old_values['name'] = $name;
}
~~~

showing old value in input field using shorthand ternary operator   
~~~html
<input value="<?php echo $old_values['name'] ?? ''; ?>" type="text" name="name" id="name" class="form-control">
~~~

showing error beneath the input field 

~~~html
<?php if(isset($errors['name'])): ?>
  <small class="text-danger"><?php echo $errors['name'] ?></small>
<?php endif; ?>
~~~

doing registration of login stuff

~~~php
if (!count($errors)) {
  //do register or login
}
~~~






