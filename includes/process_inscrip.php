<?php
if (isset($_POST['enregistrer'])) {
    //Info sur le plaignant
    $nom_pl = htmlspecialchars($_POST['nom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['tel']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $cmdp = htmlspecialchars($_POST['cmdp']);

    if (empty($nom_pl) or empty($adresse) or empty($email) or empty($telephone) or empty($mdp) or  empty($cmdp)) {
        echo "<script>alert('Veillez remplir tous champs');</script>";
    } else {
        if ($mdp !== $cmdp) {
            echo "<script>alert('Les mots de passe ne correspondent pas!');</script>";
        } else {
            $mdp_h = password_hash($mdp, PASSWORD_DEFAULT);
            if (password_verify($mdp, $mdp_h)) {
                # code...

                $query_plg = "INSERT INTO plaignant(nom_plaignant,adresse_plaignant,email_plaignant,tel_plaignant,mdp,anonyme) VALUES(:nom,:adresse,:email,:tel,:mdp,TRUE)";
                $insert_plg = $connexion->prepare($query_plg);
                $insert_plg->execute([
                    ':nom' => $nom_pl,
                    ':adresse' => $adresse,
                    ':email' => $email,
                    ':tel' => $telephone,
                    ':mdp' => $mdp_h,
                ]);
                echo "<script>alert('Vous avez été bien inscrit !');</script>";
                header('Location: index.php');
            }
        }
    }
}
