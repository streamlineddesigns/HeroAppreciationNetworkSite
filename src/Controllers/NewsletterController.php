<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class NewsletterController extends Controller
{
    /*
     * Send Endpoint
     */
    public function store($request, $response)
    {
        $form_data = $request->getParsedBody();
        $bot_protector = $form_data['protector'];

        if (! empty($bot_protector)) {
            $this->container->get('flash')->addMessage('error', "Could not send message... Try again?");
        } else {
            $this->send($form_data);
        }
        
        return $response->withStatus(302)->withHeader('Location', '/');
    }

    protected function send($form_data)
    {
        $error = null;

        if (! isset($form_data['email']) || $form_data['email'] == "") {
            $error = "The email field is required!";
        
        } else {
            $email = $form_data['email'];

            $body = "New newsletter subscriber: " . "Email: " . $email;
            $mail = new PHPMailer(false);//turns exceptions off
            $mail->isSMTP();
            $mail->SMTPDebug = false;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'streamlined.designed';
            $mail->Password = 'p4$$w0rd';
            $mail->setFrom("streamlined.designed@gmail.com", "HAN Newsletter");//WHO THE EMAIL IS 'COMING FROM'
            $mail->addAddress('streamlined.designed@gmail.com', 'Streamlined Designed');//WHO WE'RE SENDING THE EMAIL TO
            $mail->Subject = 'HAN Newsletter';
            $mail->Body = $body;
        
            if (!$mail->send()) {
                $error = "Newsletter subscription could not be completed. Try again?";
            }
        }

        if ($error != null) {
            $this->container->get('flash')->addMessage('error', $error);
        } else {
            $this->container->get('flash')->addMessage('success', "Successfully subscribed to our newsletter!");
        }

        return;
    }
}