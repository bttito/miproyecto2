<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $correct_email = "60021891@lasalleurubamba.edu.pe";
    $correct_password = "123456";

    if ($email === $correct_email && $password === $correct_password) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>
                alert('VERIFIQUE BIEN SU CORREO O CONTRASEÑA');
                window.location.href = 'login.php'; // Redirige de nuevo a la página de login
              </script>";
    }
}
?>
