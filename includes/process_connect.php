<?php
require_once('config/config.php');
session_start();
if (isset($_POST['connect'])) {
    $email = $_POST['email'];
    $mdp =$_POST['mdp'];
    echo password_hash($mdp,PASSWORD_DEFAULT);
    if (empty($email) or empty($mdp)) {
        echo "<script>alert('Veillez remplir tous champs');</script>";
    } else {
        $countAno = $connexion->prepare("SELECT * FROM plaignant WHERE email_plaignant=?");
        // $countAno->execute([':email'=>$email]);
        $countAno->execute(array($email));
        if ($countAno->rowCount() > 0) {
            $data = $countAno->fetchAll();
            // $mdp_ = $nbr1[0]['mdp'];
            // die(password_verify($_POST['mdp'],$nbr1[0]['mdp']));
            if(password_verify($mdp,$data[0]['mdp'])){
                $_SESSION['email'] = $data[0]['email_plaignant'];
                header('Location: form_plainte.php');
            }else{
                echo "<script>alert('Mot de passe ou email incorrect !');</script>";
            }
        }
        
    }
}