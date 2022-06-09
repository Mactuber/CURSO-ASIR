<?php
    include("conexion.php");
    $nombre = $_POST["usuario"];
    $pass = $_POST["pass"];

    // LOGIN

    if(isset($_POST["btningresar"])){
        $query = mysqli_query ($conn, "SELECT * FROM login WHERE Email = '$nombre' AND Contraseña = '$pass'");
        $nr = mysqli_num_rows($query);
        if($nr == 1){
            echo "<script>alert('Bienvenido a la web $nombre'); window.location = 'principal.html'</script>";
        }else{
            echo "<script>alert('Error, Usuario no válido');window.location='index.html' </script>";
        }
    }

    // REGISTRAR

    if(isset($_POST["btnregistrar"])){
        $sqlgrabar = "INSERT INTO login(Email, Contraseña) value ('$nombre', '$pass')";
        if(mysqli_query($conn, $sqlgrabar)){
            echo "<script>alert('Enhorabuena, Usuario registrado con éxito: $nombre'); window.location='index.html'</script>";
        }else{
            echo "Error: ".$sql."<br>".mysql_error($conn);
        }
    }

?>