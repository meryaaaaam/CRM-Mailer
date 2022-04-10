<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMailService
{
    private $replyTo;
    public function __construct(private MailerInterface $mailer ) {
        $this->mailer = $mailer;
       // $this->replyTo = $replyTo;
        
       // $this->replyTo = $replyTo;
        
    }
    public function send(
        string $from,
        string $to,
        string $subject,
        //string $template,
      
        string $texte,
        array $context
    ): void
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
             //->cc('cc@example.com')
            //->bcc('bcc@example.com')
          //  ->replyTo($this->replyTo)
          //->priority(Email::PRIORITY_HIGH)
 
         ->subject($subject)
         ->text($texte);

        // ->html($content);
             $this->mailer->send($email);
        // ...
    }

}