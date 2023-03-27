<?php require_once('includes/header.php'); ?>
<?php require_once('includes/process_connect.php'); ?>
<div class="row">
<form class="m-lg-1" action="" method="post">
  <div>BINVENUE A VOUS !</div>
  <!-- Email input -->
  <div class="col-5 form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" name="email" />
    <label class="form-label" for="form2Example1">Adresse e-mail</label>
  </div>

  <!-- Password input -->
  <div class="col-5 form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="mdp" />
    <label class="form-label" for="form2Example2">Mot de passe</label>
  </div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="connect">Se connecter</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Vous navez pas de compte? <a href="inscription_page.php">Creer compte</a> Ou <a href="form_plainte.php">faire une plainte anonyme</a></p>
  </div>
</form>
</div>
<?php require_once('includes/footer.php'); ?>