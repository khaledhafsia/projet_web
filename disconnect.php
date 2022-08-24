<?php
session_start();
unset($_SESSION['e']);
unset($_SESSION['Nom']);
unset($_SESSION['Prenom']);
unset( $_SESSION['Sexe']);
unset($_SESSION['Email']);
unset($_SESSION['Date']);
unset($_SESSION['Login']);
unset($_SESSION['Password']);
unset($_SESSION['Facture']);
unset($_SESSION['role']);
session_destroy();
header("Location: Views/Acceuil.php");
?>