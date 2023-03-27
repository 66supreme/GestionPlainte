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