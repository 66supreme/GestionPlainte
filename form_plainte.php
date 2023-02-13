<?php
if($_POST['enregistrer']){

    $dateEn = $_POST['dateEn'];
    $objet = $_POST['objet'];
    $description = $_POST['description'];
    $modeEm = $_POST['modeEm'];

    $nom_pl = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];
    


    if (isEmpty($dateEn) OR isEmpty($objet) OR isEmpty($description) OR isEmpty($modeEm)) {

    }else{
        if (isEmpty($nom_pl) OR isEmpty($adresse) OR isEmpty($email) OR isEmpty($telephone)){
            $query_plg = "INSERT INTO plaignant(anonyme) VALUES(TRUE)";
            $query_plt = "INSERT INTO plainte(date_plainte,objet_plainte,description_plainte,modeEmission,num_plaignant) VALUES(:date_p,:objet,:descript,:mode,:num)";

        }else {
            $query_plg = "INSERT INTO plaignant(nom_plaignant,adresse_plaignant,email_plaignant,tel_plaignant,anonyme) VALUES(:nom,:adresse,:email,:tel,TRUE)";
            $query_plt = "INSERT INTO plainte(date_plainte,objet_plainte,description_plainte,modeEmission,num_plaignant) VALUES(:date_p,:objet,:descript,:mode,:num)";
        }
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION DE PLAINTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <form action="index.html" method="post">
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
                        <option value="Email">E-mail</option>
                    </select>
                </div><br>
                <div class="alert alert-warning">
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
