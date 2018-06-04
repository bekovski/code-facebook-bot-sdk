<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;

class GetStartedButtonTest extends TestCase
{
    const ACCESS_TOKEN = '';

    public function testAddGetStartedButton(){
        $data = (new GetStartedButton())->add('Iniciar');

        $callSendApi = new CallSendApi(self::ACCESS_TOKEN);
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));
    }

    public function testRemoveGetStartedButton(){
        $data = (new GetStartedButton())->remove();

        $callSendApi = new CallSendApi(self::ACCESS_TOKEN);
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE, 'DELETE');

        $this->assertTrue(is_string($result));
    }
}