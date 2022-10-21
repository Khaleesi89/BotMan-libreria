<?php


use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class PagosYdeudas extends Conversation{

    public function pagosYdeudas(){
        //creamos una pregunta que contendra botones
        $preguntas = Question::create('opciones de consulta')
        ->addButtons([ //arreglo de los botones de opciones
                Button::create('Debito automatico de Monotributo')->value('1'),
                Button::create('Deuda de Monotributo')->value('2'),
                Button::create('CCMA')->value('3'),
                
            ]);
        $this->ask($preguntas, function ($answer) {
            //pregunta a traves de los botones y el usuario responde
            if ($answer->isInteractiveMessageReply()) {
                //es valido xq el usuario respondio con los botones
                if ($answer->getValue() == '1') {
                    //selecciono el boton Formulario SIRADIG y hacemos un say por cada opción
                    $this->say('Para realizar debito automático del monotributo <a href=\'https://serviciosweb.afip.gob.ar/genericos/guiasPasoPaso/VerGuia.aspx?id=286\' target=\'_blank\'> Ingrese Aquí</a>');
                } elseif ($answer->getValue() == '2') {
                    $this->say('Para consultar la deuda del monotributo <a href=\'https://serviciosweb.afip.gob.ar/genericos/guiasPasoPaso/VerGuia.aspx?id=430\' target=\'_blank\'> Ingrese Aquí</a>');
                } elseif ($answer->getValue() == '3') {
                    $this->say('Para aprender a utilizar el CCMA <a href=\'https://serviciosweb.afip.gob.ar/genericos/guiasPasoPaso/VerGuia.aspx?id=100\' target=\'_blank\'> Ingrese Aquí</a>');
                } 
            } else {
                //el usuario no respondio a traves de los botones dados, si queremos leer ambas, solo sacamos la condicion
                $this->say('Seleccione una opción para seguir o si quiere salir ponga "chau"');
                $this->repeat();//se repite esta funcion
            }
        });
    }


    public function run(){
        $this->pagosYdeudas();
    }
}