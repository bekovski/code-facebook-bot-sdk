<?php

namespace CodeBot;

use CodeBot\Build\Solid;
use PHPUnit\Framework\TestCase;

class BotTest extends TestCase{

    public function testAddMenu(){
        $bot = Solid::factory();
        Solid::setPageAccessToken('');

        $callToAction = [
            [
                'id'        => 1,
                'parent_id' => 0,
                'type'      => 'nested',
                'title'     => 'O que devo fazer?',
                'value'     => null
            ],[
                'id'        => 2,
                'parent_id' => 0,
                'type'      => 'web_url',
                'title'     => 'Visite o Google',
                'value'     => 'https://www.google.com'
            ],[
                'id'        => 3,
                'parent_id' => 1,
                'type'      => 'web_url',
                'title'     => 'Visite a Setrem',
                'value'     => 'http://www.setrem.com.br'
            ],[
                'id'        => 4,
                'parent_id' => 0,
                'type'      => 'postback',
                'title'     => 'Deseja ver as opções iniciais?',
                'value'     => 'Iniciar'
            ],
        ];

        $bot->addMenu('default',false, $callToAction);

        $this->assertTrue(true);
    }

    public function testRemoveMenu(){
        $bot = Solid::factory();
        Solid::setPageAccessToken('');

        $bot->removeMenu();

        $this->assertTrue(true);
    }

    public function testAddGetStartedMenu(){
        $bot = Solid::factory();
        Solid::setPageAccessToken('');
        $bot->addGetStartedButton('Iniciar');

        $this->assertTrue(true);
    }

    public function testRemoveGetStartedMenu(){
        $bot = Solid::factory();
        Solid::setPageAccessToken('');
        $bot->removeGetStartedButton();

        $this->assertTrue(true);
    }
}