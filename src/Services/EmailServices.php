<?php 
namespace App\Services;

use Mailjet\Client;
use App\Entity\User;
use Mailjet\Resources;
use App\Entity\EmailModel;

class EmailServices
{

    public function sendEmail(User $user, EmailModel $email)
    {
        
        $mj = new Client($_ENV["API_MAILJET_KEY"], $_ENV["API_MAILJET_SECRET"],true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "aouekoffi88@gmail.com",
                        'Name' => "DevWeb Contact"
                    ],

                    'To' => [
                        [
                            'Email' => $user->getEmail(),
                            'Name' => $user->getName()
                        ]
                    ],

                    'TemplateID' => 3946686,
                    'TemplateLanguage' => true,
                    'Subject' => $email->getSubject(),
                    'Variables' =>[
                        "title" => $email->getTitle(),
                        "content" => $email->getContent()
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && dd($response->getData());
        
    }
}