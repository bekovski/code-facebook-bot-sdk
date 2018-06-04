<?php

namespace CodeBot\Message;

use PHPUnit\Framework\TestCase;

Class TextTest extends TestCase
{
    public function testRetornaUmArray()
    {
        $actual = (new Text(1))->message('OIIII');
        $expected = [
            'recipient' => [
                'id' => 1
            ],
            'message' => [
                'text' => 'OIIII',
                'metadata' => 'DEVELOPER_DEFINED_METADATA'

            ]
        ];
        $this->assertEquals($expected, $actual);
    }
}