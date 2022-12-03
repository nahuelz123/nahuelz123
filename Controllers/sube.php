<?php
    include('header.php');
    include('nav.php');
    //print_r($_FILES);
    $nombre = $_FILES['file']['name'];
    $guardado = $_FILES['file']['tmp_name'];

    if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
        echo "<script> if(confirm('Archivo agregado!'));";
		echo "window.location = '../index.php'; //cambiar redireccion!
		</script>";
    }
    else{
        echo "No fue posible guardar el archivo.";
    }
?>