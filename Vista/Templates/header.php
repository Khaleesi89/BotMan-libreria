<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Bootstrap/5.2.0/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/estilosMain.css">
    <link rel="shortcut icon" href="../Archivos/botman.png">
    <script src="../../Utiles/botman/widget.js"></script>
    <script>
        var botmanWidget = {
            introMessage: 'Bienvenido Humano',
            frameEndpoint: '../../Utiles/botman/chat.php',
            chatServer: '../../Utiles/botman/botman.php',   
            introMessage: 'Bienvenid@ soy <b>Vikingo</b><br>En que puedo servirle?', //saludo inicial
            title: 'Asistente Vikingo', //titulo del chat
            dateTimeFormat: 'Y-m-d H:i:s', //formato con el cual trabajaremos
            placeholderText: 'Enviar mensaje...',
            mainColor: '#7C3E66', //encabezado
            bubbleBackground: '#243A73', //burbuja//el sobre es el icono predeterminado
            bubbleAvatarUrl: '../Archivos/icono.png',
            aboutText: 'Producido por Jero y Mar',
            
            
        }
    </script>
    <title><?php echo $titulo?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
</head>

<body>
  <nav class="humanoide navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
     
      <img src="../Archivos/botman.png" alt="simbolo botman" width=80px; height=80px>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../Home/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Instalacion/index.php">Instalación</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../Aplicacion/index.php">Aplicación</a>
          </li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </nav>