<?php require_once('config/config.php'); ?>

<?php require_once('includes/process.php'); ?>

<?php require_once('includes/header.php'); ?>

<form action="form_plainte.php" method="post">
    <div>
        <h1>Description plainte</h1>

        <div class="mb-3 mt-3">
            <label for="dateEn" class="form-label">En date du:</label>
            <input type="date" class="form-control" id="dateEn" placeholder="01/01/2023" name="dateEn">
        </div>
        <div class="mb-3">
            <label for="objet" class="form-label">Objet:</label>
            <input type="text" class="form-control" id="objet" placeholder="Objet" name="objet">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
        </div><br>
        <div class="form-group">
            <label for="sel1">Mode émission</label>
            <select class="form-control" id="sel1" name="modeEm">
                <option value="Courier">Courier</option>
                <option value="Email" selected>E-mail</option>
            </select>
        </div><br>
        <div class="mb-3">
            <button type="submit" name="enregistrer" class="btn btn-primary">Envoyer</button>
            <button type="submit" class="btn btn-danger">Annuler</button>
        </div>

</form>

<?php require_once('includes/footer.php'); ?>