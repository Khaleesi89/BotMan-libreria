<?php
$titulo = 'Instalación';
include_once('../Templates/header.php');
?>
<style>
    h1,
    h2,
    h3 {
        margin: 10px 0 10px 0;
        font-family:'Bebas Neue', cursive;
        text-shadow: 1px 2px #999;
        
    
    }

    .container img {
        margin: 10px 0 10px 0;
    }

    .imgCode{
        border: 1px solid #000;
        border-radius: 5px;
    }

    code {
        border: 1px solid #000;
        padding: 10px;
        border-radius: 5px;
    }

    .codeContainer {
        margin: 10px 0 10px 0;
    }
</style>
<!-- <head><link rel="stylesheet" href="../Css/estilo2.css"></head> -->
<div class="m-2 p-3 container">
    <div class="presentacion-botman">
        <br>
        <h1>Proceso de Instalación del Bot para su Proyecto Web</h1>
        <br>
        <p>
            Hay dos maneras de trabajar con ésta librería: Instalando el Botman Studio o usando Composer. Nosotros usamos al última opción y esa es la que detallaremos.</p>
        <em>Recuerde que debe tener instalado Composer para gestionar la librería de BotMan</em></p>
        <img class="rounded mx-auto d-block" src="../Archivos/botman.png" alt="botman" width="180px">

        <a class="btn btn-dark" href="https://botman.io/" target="_blank">Ir a BotMan</a>
    </div>
    <div class="presentacion-composer">
        <h3 class="mt-3">¿Qué es Composer?</h3>
        <p>Es una herramienta para la <strong>gestión de dependencias en PHP</strong>. Le permite declarar las bibliotecas de las que depende su proyecto y las administrará (instalará / actualizará) por usted</p>
        <img class="rounded mx-auto d-block" src="../Archivos/composer.png" alt="botman" width="180px">
        <a class="btn btn-dark" href="https://getcomposer.org/" target="_blank">Ir a Composer</a>
    </div>
    <div>
        <h2 class="text-center">Con esto listo ya podemos comenzar.</h2>
    </div>
    <div class="presentacion-composer">
        <h3>Instalación del DEMO</h3>
        <p>Dentro de la página BotMan, encontrará la documentación necesaria para el uso de la librería. Detallaremos lo que hicimos nosotros para la instalación del DEMO provisto por BotMan.</p>
    </div>
    <div>
        <h3>Requisitos para la instalación</h3>
        <ul>
            <li>PHP >= 7.1.3</li>
            <li>Composer</li>
        </ul>
        <h3>Instalando BotMan</h3>
        <p>Hay que tener en cuenta que en la página oficial de la librería, está detallada la instalación. Nosotros detallaremos como la realizamos nosotros.</p>
        <p>En esta forma de instalación, BotMan utiliza <a href="https://getcomposer.org/">Composer</a> para manejar las dependencias. Por eso, antes de utilizar BotMan, asegurese de que tenerlo instalado en su computadora.<br>Ya con todo listo lo que resta hacer es crear una nueva carpeta y con la terminal, debemos ubicarnos dentro de ella y ejecutamos este código :
        </p>
        <div class="codeContainer">
            <code class="language-sh">
                composer require botman/botman
            </code>
        </div>

        <p>Esto descargará el paquete BotMan y todas sus dependencias.</p>
        <img src="../Archivos/carpetasDescargadas.png">
        <p>Dentro de la carpeta "vendor" estarán el resto de dependencias de BotMan</p>
        <p>Ésto no es suficiente para que podamos ver en funcionamiento al BotMan, sino que tendremos que descargar algunas dependencias más y configurar algunos script. En el siguiente articulo veremos esto y como poner en funcionamiento el demo.</p>

        <p>Ésto no es suficiente para que podamos ver en funcionamiento al BotMan, sino que tendremos que descargar algunas dependencias más y configurar algunos script. </p>

        <h2>Driver WEB</h2>
        <p>Luego, instalamos el <strong>Drive-Web</strong>. Ponemos el siguiente comando en la terminal:</p>
        <div class="codeContainer">
            <code class="language-sh">
                composer require botman/driver-web
            </code>
        </div>
        <p>Ésto nos creará la carpeta "driver-web" en "botman", dentro de la carpeta vendor </p>
        <img src="../Archivos/driver web.jpg" alt="driverweb">

        <h2>Symfony Cache</h2>
        <p>Al no usar el Botman Studio, para el funcionamiento del bot, es necesario que utilicemos <strong>Symfony Cache</strong> (hay otras opciones pero nosotros elegimos ésta)</p>
        <p>Si desea utilizar la función de conversación de BotMan, debe utilizar un controlador de caché persistente, donde BotMan puede almacenar y recuperar las conversaciones. Si no se especifica lo contrario, BotMan utilizará el array de memoria caché que no es persistente.</p>
        <p>Para la instalación del Symfony, utilizaremos el comando:</p>
        <div class="codeContainer">
            <code class="language-sh">
                composer require symfony/cache
            </code>
        </div>
        <p>Encontrará más información en <a href="http://https://symfony.com/doc/current/components/cache.html">Aquí</a></p>
        <p>A medida que se van agregando componentes para que funcione el bot, el controlador se va modificando , quedando de ésta manera: </p>
        <img class="img-fluid" src="../Archivos/controller.jpg" alt="php Controlador" width="600">
        <h2>Configuración de script y estilos</h2>

        <p>Ya tenemos los componentes necesarios, ahora hay que crear un index o página principal que tendrá nuestro Bot y poner en su head, el siguiente código: </p>
        <img class="imgCode img-fluid" src="../Archivos/botEnIndex.jpg" alt="codigo del head">
        <p>Es posible acceder a esos archivos de la etiqueta LINK, copiarlos y crearlos directamente en nuestro proyecto.</p>
        <div class="codeContainer">
            <code>
                href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"
            </code>
        </div>
        <br>
        <div class="codeContainer mt-3">
            <code>
                src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'
            </code>
        </div>
        <p>El archivo <strong>chat.js</strong> será el marco de chat.</p>
        <p>Debemos agregar el widget a nuestro sitio y decirle que marco de chat usará (Es el que creamos anteriormente).</p>
        <img class="img-fluid" src="../Archivos/widget.jpg" alt="widget" width="600">
        <p>Dentro del script, la variable <strong>botmanWidget</strong> contendrá todas las propiedades que se pueden agregar en su bot. Para saber los atributos que tiene, presione <a href="https://botman.io/2.0/web-widget">aquí</a> y verá en la página de la librería como personalizarlo. </p>
        <p>El archivo <strong>widget.js</strong> también se puede descargar y personalizar, sino también puede agregarlo en su head de la siguiente manera:</p>
        <img class="imgCode img-fluid" src="../Archivos/archivoJSwidget.jpg" alt="direccion de widget.js">
        <p>En <strong>frameEndpoint</strong> hay que colocar la ruta al archivo del chat. Esto último se puede personalizar con el archivo widget.js.</p>
    </div>
</div>

<?php
include_once('../Templates/footer.php');
