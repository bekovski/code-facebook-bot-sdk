<?php

namespace CodeBot\Element;

class Button implements ElementInterface {
    private $title;
    private $type;
    private $value;
    private $config;

    public function __construct(string $type, ? string $title = null, ? string $value = null, array $config = []){
        $this->title = $title;
        $this->type = $type;
        $this->value = $value;
        $this->config = $config;
    }

    public function get():array {
        $data['type'] = $this->type;

        if($this->title !== null){
            $data['title'] = $this->title;
        }

        if($this->type === 'web_url'){
            $data['url'] = $this->value;
        }

        if($this->type === 'postback' || $this->type === 'phone_number'){
            $data['payload'] = $this->value;
        }

        if($this->type === 'share_contents'){
            if($this->value !== null){
                $data['share_contents'] = $this->value;
            }
            unset($data['title']);
        }

        return array_merge($data, $this->config);
    }

}