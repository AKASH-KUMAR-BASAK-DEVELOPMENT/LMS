<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\LaravelDriver\MailerSendTrait;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels, MailerSendTrait;


    public $name;
    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = Arr::get($this->to, '0.address');

        return $this->view('email.email')
//            ->text('email.text')
//            ->attachFromStorageDisk('public', 'topic_images/1712122209_6mM1ysolXt.png')
            ->mailersend(
            // Template ID
                null,
                // Variables for simple personalization
                [
                    new Variable($to, ['name' => 'Your Name'])
                ],
                // Tags
                ['tag'],
                // Advanced personalization
                [
                    new Personalization($to, [
                        'var' => 'variable',
                        'number' => 123,
                        'object' => [
                            'key' => 'object-value'
                        ],
                        'objectCollection' => [
                            [
                                'name' => 'John'
                            ],
                            [
                                'name' => 'Patrick'
                            ]
                        ],
                    ])
                ]
            );
    }
}
