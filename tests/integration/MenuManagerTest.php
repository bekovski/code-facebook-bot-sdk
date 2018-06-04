<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;


class MenuManagerTest extends TestCase
{
    const ACCESS_TOKEN = '';

    public function testMakeMenu(){
        $menu = new MenuManager('default');

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

        foreach ($callToAction as $action){
            $menu->callToAction($action['id'], $action['type'], $action['title'], $action['parent_id'], $action['value']);
        }

        $callSendApi = new CallSendApi(self::ACCESS_TOKEN);
        $result = $callSendApi->make($menu->toArray(), CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));
    }
}