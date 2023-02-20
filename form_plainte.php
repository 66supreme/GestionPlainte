<?php require_once('config/config.php'); ?>
<?php
if (isset($_POST['enregistrer'])) {

    //Info sur mla plainte
    $dateEn = $_POST['dateEn'];
    $objet = $_POST['objet'];
    $description = $_POST['description'];
    $modeEm = $_POST['modeEm'];

    //Info sur le plaignant
    $nom_pl = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];

    if (empty($dateEn) or empty($objet) or empty($description) or empty($modeEm)) {
        echo "<script>alert('Veillez remplir tous champs');</script>";
    } else {
        if (empty($nom_pl) or empty($adresse) or empty($email) or empty($telephone)) {
            //Les différentes requête
            $query_plg = "INSERT INTO plaignant(anonyme) VALUES(TRUE)";
            $query_plt = "INSERT INTO plainte(date_plainte,objet_plainte,description_plainte,mode_emission,id_plaignant) VALUES(:date_p,:objet,:descript,:mode,:num)";

            $insert_plg = $connexion->query($query_plg);

            //Recherche du dernier plaignant enrégistré
            $countAno = $connexion->query("SELECT id_plaignant FROM plaignant ORDER BY id_plaignant DESC LIMIT 1");
            $countAno->execute();
            $nbr1 = $countAno->fetch(PDO::FETCH_ASSOC);
            $nbr = $nbr1['id_plaignant'];

            #Insertion de la plainte
            $insert_plt = $connexion->prepare($query_plt);
            $insert_plt->execute([
                ':date_p' => $dateEn,
                ':objet' => $objet,
                ':descript' => $description,
                ':mode' => $modeEm,
                ':num' => $nbr,
            ]);
            echo "<script>alert('Les informations ont bien été enrégistrées !');</script>";
        } else {
            //Les différentes requêtes
            $query_plg = "INSERT INTO plaignant(nom_plaignant,adresse_plaignant,email_plaignant,tel_plaignant,anonyme) VALUES(:nom,:adresse,:email,:tel,TRUE)";
            $query_plt = "INSERT INTO plainte(date_plainte,objet_plainte,description_plainte,mode_emission,id_plaignant) VALUES(:date_p,:objet,:descript,:mode,:num)";


            $insert_plg = $connexion->prepare($query_plg);
            $insert_plg->execute([
                ':nom' => $nom_pl,
                ':adresse' => $adresse,
                ':email' => $email,
                ':tel' => $telephone,
            ]);

            //Recherche du dernier plaignant enrégistré
            $countAno = $connexion->query("SELECT id_plaignant FROM plaignant ORDER BY id_plaignant DESC LIMIT 1");
            $countAno->execute();
            $nbr1 = $countAno->fetch(PDO::FETCH_ASSOC);
            $nbr = $nbr1['id_plaignant'];



            #Insertion de la plainte
            $insert_plt = $connexion->prepare($query_plt);
            $insert_plt->execute([
                ':date_p' => $dateEn,
                ':objet' => $objet,
                ':descript' => $description,
                ':mode' => $modeEm,
                ':num' => $nbr,
            ]);
            echo "<script>alert('Les informations ont bien été enrégistrées !');</script>";
        }
    }
}

?>


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
        <div class="alert alert-warning" id="interp">
            <strong>Attention!</strong> Vous êtes actuellement en mode anonyme. Vous pouvez continuer ou cliquez
            sur "M'identifier" pour renseigner vos informations.
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                M'identifier
            </button>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Identification du plaignant</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" placeholder="Raki" name="nom">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="adresse" class="form-label">Adresse:</label>
                            <input type="text" class="form-control" id="adresse" placeholder="Abidjan,Yopougon" name="adresse">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" id="email" placeholder="rakis0gmail.com" name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="tel" class="form-label">Numéro de téléphone:</label>
                            <input type="text" class="form-control" id="tel" placeholder="0544529711" name="tel">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="btnok" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" name="enregistrer" class="btn btn-primary">Envoyer</button>
            <button type="submit" class="btn btn-danger">Annuler</button>
        </div>
    </div>

</form>

<script>
    $(document).ready(function(){
        
        $(document).on('btnok',function(e){

        });
    });
</script>

<?php require_once('includes/footer.php'); ?>