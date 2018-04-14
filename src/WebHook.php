<?php

namespace CodeBot;


class WebHook
{
    public function check(string $token)
    {
        $hubMode = filter_input(INPUT_GET, 'hub.mode');
        $hubVerifyToken = filter_input(INPUT_GET, 'hub.verify_token');

        if ($hubMode === 'subscribe' && $hubVerifyToken === $token)
            return filter_input(INPUT_GET, 'hub.challenge');

        return false;
    }
}