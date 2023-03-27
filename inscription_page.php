<?php require_once('config/config.php'); ?>
<?php include_once('includes/process_inscrip.php'); ?>
<?php require_once('includes/header.php'); ?>

<form action="inscription_page.php" method="post">

    <h1>Inscription plaignant</h1>
    <div class="row">

        <div class="col-7">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Raki" name="nom">
        </div>
        <div class="col-7">
            <label for="adresse" class="form-label">Adresse:</label>
            <input type="text" class="form-control" id="adresse" placeholder="Abidjan,Yopougon" name="adresse">
        </div>
        <div class="col-7">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="rakis0gmail.com" name="email">
        </div>
        <div class="col-7">
            <label for="tel" class="form-label">Numéro de téléphone:</label>
            <input type="text" class="form-control" id="tel" placeholder="0544529711" name="tel">
        </div>
        <div class="col-7">
            <label for="nom" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="nom" name="mdp">
        </div>
        <div class="col-7">
            <label for="nom" class="form-label">Confirmer mot de passe:</label>
            <input type="password" class="form-control" id="nom" name="cmdp">
        </div> <br><br>
        <div class="mb-3">
            <button type="submit" name="enregistrer" class="btn btn-success">Enregistrer</button>
            <button type="submit" class="btn btn-danger">Annuler</button>
        </div>
    </div>
</form>

<?php require_once('includes/footer.php'); ?>