<?php

namespace CodeBot\TemplatesMessage;

Use CodeBot\Element\ElementInterface;

class GenericTemplate implements TemplateInterface {

    protected $recipientId;
    protected $products;

    public function __construct(string $recipientId){
        $this->recipientId = $recipientId;
    }

    public function add(ElementInterface $element){
        $this->products[] = $element->get();
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
                        'template_type' => 'generic',
                    //  'text' => $messageText,
                        'elements' => $this->products
                    ]
                ]
            ]
        ];
    }
}

