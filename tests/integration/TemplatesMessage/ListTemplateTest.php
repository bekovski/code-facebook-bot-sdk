<?php
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 02/06/18
 * Time: 00:32
 */

namespace CodeBot\TemplatesMessage;

use CodeBot\Element\Button;
use CodeBot\Element\Product;
use PHPUnit\Framework\TestCase;

class ListTemplateTest extends TestCase
{
    public function testListaDoisProdutos(){

        $template = new ListTemplate(1234);

        $button  = new Button('web_url', null, 'http://www.google.com');
        $product = new Product('Produto Google','image.jpg','Google', $button);
        $template->add($product);

        $button  = new Button('web_url', null, 'http://mail.google.com');
        $product = new Product('Produto Gmail','image.jpg','Gmail', $button);
        $template->add($product);

        // OBS: Refatorar para não usar o method message nesse caso.
        $actual = $template->message('abc');

        $expeted = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'list',
                        'elements' => [
                            [
                                'title'          => 'Produto Google',
                                'subtitle'       => 'Google',
                                'image_url'      => 'image.jpg',
                                'default_action' => [
                                    'type'=> 'web_url',
                                    'url' => 'http://www.google.com',
                                ],
                            ],
                            [
                                'title'          => 'Produto Gmail',
                                'subtitle'       => 'Gmail',
                                'image_url'      => 'image.jpg',
                                'default_action' => [
                                    'type'=> 'web_url',
                                    'url' => 'http://mail.google.com',
                                ],
                            ],
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expeted, $actual);
    }
}