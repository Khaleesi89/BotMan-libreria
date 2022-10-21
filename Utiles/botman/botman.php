<?php

require_once 'vendor/autoload.php';


use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;//adaptador de cache . Ahora puede recuperar y 
//eliminar datos almacenados en caché utilizando este objeto.para crear una memoria caché basada en un sistema de archivos,
// cree una instancia esta clase
use BotMan\BotMan\Cache\SymfonyCache;

//las distintas clases de conversaciones
require_once('../../Vista/Clases/Formularios.php');
require_once('../../Vista/Clases/Inscripcion.php');
require_once('../../Vista/Clases/PagosYdeudas.php');
require_once('../../Vista/Clases/charlaAmistosa.php');


//carga el controlador
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$config = [];

//creacion de la instancia botman y establece el array para el cache que guardará la información 
$botman = BotManFactory::create($config, new SymfonyCache($adapter));

//cuando no coincide con ningun 'hears' entra en fallback
$botman->fallback(function ($bot) {
    //del driver que utilizamos obtenemos el obj mensaje del usuario
    $mensaje = $bot->getMessage();
    //Para que su bot se sienta y actúe de forma más humana, puede hacer que envíe indicadores de "escribiendo...".
    $bot->typesAndWaits(2);
    //damos una respuesta inmediata con reply al usuario
    $bot->reply('No comprendo \'' . $mensaje->getText() . '\', sea más específico, por favor :)');
});

//hears es para escuchar lo que dice el usuario y compararlo con el primer parametro
$botman->hears('(.*)inscrip(.*)|(.*)alta(.*)', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new Inscripcion());
})->skipsConversation();

$botman->hears('(.*)SIRADIG(.*)|(.*)CETA(.*)|(.*)formular(.*)|(.*)ceta(.*)|(.*)siradig(.*)', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new Formularios());
})->skipsConversation();
/*skipsConversation, es para hacer un salto a este llamado si es que coincide,
no importa en que parte del hilo se encuentre, se realiza un salto a ese llamado y 
lo mas importante es que al finalizar continua en donde se encontraba antes de la coincidencia*/

$botman->hears('(.*)deuda(.*)|(.*)pag(.*)|(.*)CCMA(.*)|(.*)debito(.*)|(.*)débito(.*)', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new PagosYdeudas());
})->skipsConversation();

$botman->hears('(.*)chau(.*)|me voy(.*)|adios(.*)|nos vemos(.*)|gracias|nada', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Un placer, hasta pronto!');
})->stopsConversation();
/*stopConversation, realiza un salto a este llamado sin importar donde este pero
la diferencia es que se detiende el hilo de conversacion*/


$botman->hears('(.*)hola(.*)|(.*)hello(.*)|(.*)buenas(.*)|(.*)buenos(.*)|(.*)que onda(.*)', function ($bot) {
        $bot->typesAndWaits(2);
        $bot->startConversation(new CharlaAmistosa);
})->skipsConversation();

//el siguiente llamado es para que botman este atento a los ingresos de mensaje, esta atento para 'escuchar'
$botman->listen();
