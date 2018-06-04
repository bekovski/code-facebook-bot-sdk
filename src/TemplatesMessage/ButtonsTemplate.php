<?php

namespace CodeBot\TemplatesMessage;

Use CodeBot\Element\ElementInterface;

class ButtonsTemplate implements TemplateInterface {

    protected $recipientId;
    protected $buttons = [];

    public function __construct(string $recipientId){
        $this->recipientId = $recipientId;
    }

    public function add(ElementInterface $element){
        $this->buttons[] = $element->get();
    }

    public function message(string $messageText): array {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => $messageText,
                        'buttons' => $this->buttons
                    ]
                ]
            ]
        ];
    }
}

