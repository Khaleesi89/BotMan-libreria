<?php

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class Formularios extends Conversation
{

    /**
     * creamos un obj consulta, obj consulta contiene objetos botones,
     * preguntamos si la respuesta fue de forma interactiva (en este caso si respondio por botones)
     * y sino le insistimos que responda con botones, si es interactiva leemos el valor de la respuesta 
     * y le damos intrucciones, para href si no usamos target='_blank' se carga la pagina dentro del chat, probar jaja
     */
   
    public function mostrarOpc()
    {
        //creamos una pregunta que contendra botones
        //tener en cuenta que los value tienen que ser diferentes al valor que contienen dentro, sino no lo toma
        $preguntas = Question::create('opciones de consulta')
        ->addButtons([ //arreglo de los botones de opciones
                Button::create('Formulario SIRADIG')->value('1'),
                Button::create('Formulario CETA')->value('2'),
                Button::create('Formularios varios')->value('3'),
                
            ]);
        $this->ask($preguntas, function ($answer) {
            //pregunta a traves de los botones y el usuario responde
            //isInteractiveMessageReply para detectar si el usuario interactuó con el mensaje e hizo clic en un botón o simplemente ingresó texto.
            if ($answer->isInteractiveMessageReply()) {
                //es valido xq el usuario respondio con los botones
                if ($answer->getValue() == '1') {
                    //selecciono el boton Formulario SIRADIG y hacemos un say por cada opción
                    $this->say('Para saber cómo realizar el formulario SIRADIG encuentre el manual <a href=\'https://www.afip.gob.ar/572web/documentos/ManualSiRADIG.pdf\' target=\'_blank\'> Ingresando Aquí</a>');
                } elseif ($answer->getValue() == '2') {
                    $this->say('Para realizar el formulario CETA <a href=\' https://cetaweb.afip.gob.ar/#/\' target=\'_blank\'> Ingrese Aquí</a>');
                } elseif ($answer->getValue() == '3') {
                    $this->say('Encontrará los formularios vigentes <a href=\' https://serviciosweb.afip.gob.ar/genericos/formularios/default.asp\' target=\'_blank\'> Ingresando Aquí</a>');
                } 
            } else {
                //el usuario no respondio a traves de los botones dados, si queremos leer ambas, solo sacamos la condicion
                $this->say('Seleccione una opción para seguir o si quiere salir ponga "chau"');
                $this->repeat();//se repite esta funcion
            }
        });
    }
   
   
   
   
   
     public function run()
    {
        $this->mostrarOpc();
    }
}
