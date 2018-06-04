<?php
namespace CodeBot\TemplatesMessage;

use PHPUnit\Framework\TestCase;
use CodeBot\Element\Button;


class ButtonsTemplateTest extends TestCase
{
    public function TestRetornoBotaoArray(){

        $buttonsTemplate = new ButtonsTemplate('123');
        $buttonsTemplate->add(new Button('postback','Title Button', 'Resposta'));

        $actual = $buttonsTemplate->message('Exemplo template button');

        $expected = [
            'recipient' => [
                'id' => '123'
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Exemplo template button',
                        'buttons' => [
                            [
                                "type" => "postback",
                                "title" => "Title Button",
                                "payload" => "Resposta",
                            ],
                        ]
                    ]
                ]
            ]
        ];

        return $this->assertEquals($expected, $actual);
    }
}
