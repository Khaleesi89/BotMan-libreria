<?php

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class Inscripcion extends Conversation
{


    public function mostrarOpciones()
    {
        $opciones = Question::create('Opciones de ayuda')
            ->addButtons([ //arreglo de los botones de opciones
                Button::create('Hacer Cuit')->value('1'),
                Button::create('Inscripcion de Monotributo')->value('2'),
                Button::create('Inscripcion empleada domestica')->value('3')
            ]);
        $this->ask($opciones, function ($answer) {
            //pregunta a traves de los botones y el usuario responde
            if ($answer->isInteractiveMessageReply()) {
                //es valido xq el usuario respondio con los botones
                if ($answer->getValue() == '1') {
                    //selecciono el boton Crear Cuenta
                    $this->say('Para realizar el CUIT, Ingrese <a href=\'https://www.afip.gob.ar/inscripcion/default.asp\' target=\'_blank\'>Aquí</a>');
                } elseif ($answer->getValue() == '2') {
                    $this->say('Para realizar la inscripción en Monotributo, Ingrese <a href=\'https://monotributo.afip.gob.ar/Public/landing-monotributo.aspx
                        \' target=\'_blank\'>Aquí</a>');
                } elseif ($answer->getValue() == '3') {
                    $this->say('Para realizar la inscripción de su empleada doméstica, Ingrese <a href=\'https://casasparticulares.afip.gob.ar/ayuda/empleador/registroRelacion.aspx
                        \' target=\'_blank\'>Aquí</a>');
                }
            } else {
                //el usuario no respondio a traves de los botones dados, si queremos leer ambas, solo sacamos la condicion
                $this->say('Por favor, seleccione una opción para seguir o para concluir, ponga "chau"');
                $this->repeat(); //se repite esta funcion
            }
        });
    }

    public function run()
    {
        $this->mostrarOpciones();
    }
}
