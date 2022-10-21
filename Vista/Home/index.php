<?php
$titulo = 'Inicio';
include_once('../Templates/header.php');
?>

<link rel="stylesheet" href="../Css/estilosMain.css">

<div class="container m-5">
    <div class="row align-items-center">
        <div class="col text-center">
            <h1 style="font-weight:400; font-size: 50px;">Soy BotMan!!!</h1>
        </div>
        <div class="col">
            <img src="../Archivos/botman.png" alt="botman" width="300px">
        </div>
    </div>
</div>
<div class="container presentacion">
    <div class="text-center p-3">
        <h1>Qué es BotMan?</h1>
    </div>
    <div class="row p-5">
        <div class="col botmanExp">
            <p>Es una <strong>librería de PHP</strong> que está diseñada para simplificar la tarea de desarrollar bots innovadores para múltiples plataformas de mensajería, incluyendo Slack, Telegram, Microsoft Bot Frameword, Nexmo, HipChat, Facebook Messenger,WeChat, etc.<br>
        Tiene un codigo muy <strong>legible</strong>, con una sintaxis expresiva pero poderosa que le permita centrarse en la logica empresarial.</p>
        </div>
        <div id="codigo" class="col">
            <pre><code class="language-php">&lt;?php
    $botman->hears('Hello BotMan!', function($bot) {
        $bot->reply('Hello!');
        $bot->ask('Whats your name?', function($answer, $bot) {
        $bot->say('Welcome '.$answer->getText());
        });
    }); 
    $botman->listen();
</code></pre>
        </div>
    </div>

</div>
<div class="container2 p-3 pt-2 pb-5" style="background-color:#F2EBE9 ;">
    <div class="text-center p-3">
        <h1>Servicios</h1>
        <p>Estos son los servicios que ofrecemos</p>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col align-self-center">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">BotMan</h5>
                    <p class="card-text">La libreria de PHP para la creación de chatBots mas importante del mundo</p>
                    <button style="background-color:#7C3E66 !important; border:none;" type="button" class="btn btn-primary"><a href="https://botman.io/">Sitio Oficial</a></button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">DEMO</h5>
                    <p class="card-text">Siga el paso a paso y haga funcionar el demo, descubriras lo facil que es</p>
                    <button style="background-color:#7C3E66 !important; border:none;" type="button" class="btn btn-primary"><a href="../Instalacion/index.php">Vamos</a></button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Aplicado al Sitio</h5>
                    <p class="card-text">Ponlo a prueba! Conversa con el botman y verifica por ti mismo la capacidad de este</p>
                    <button style="background-color:#7C3E66 !important; border:none;" type="button" class="btn btn-primary"><a href="../Aplicacion/index.php">Probar</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../Templates/footer.php');
?>

