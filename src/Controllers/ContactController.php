<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'contact.twig';
        return $this->container->get('view')->render($response, $view);
    }

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
        
        return $response->withStatus(302)->withHeader('Location', '/contact');
    }

    protected function send($form_data)
    {
        $error = null;

        if (! isset($form_data['fname']) || $form_data['fname'] == "") {
            $error = "The first name field is required!";
        
        } else if (! isset($form_data['lname']) || $form_data['lname'] == "") {
            $error = "The last name field is required!";
        
        } else if (! isset($form_data['email']) || $form_data['email'] == "") {
            $error = "The email field is required!";
        
        } else if (! isset($form_data['message']) || $form_data['message'] == "") {
            $error = "The message field is required!";
        
        } else {
            $fname = $form_data['fname'];
            $lname = $form_data['lname'];
            $email = $form_data['email'];
            $message = $form_data['message'];

            $body = "First Name: " . $fname . "\n\n" . "Last Name: " . $lname .  "\n\n" . "Email: " . $email . "\n\n" . "Message: " . $message  . "\n\n";
            $mail = new PHPMailer(false);//turns exceptions off
            $mail->isSMTP();
            $mail->SMTPDebug = false;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'streamlined.designed';
            $mail->Password = 'p4$$w0rd';
            $mail->setFrom("streamlined.designed@gmail.com", "Website");//WHO THE EMAIL IS 'COMING FROM'
            $mail->addAddress('streamlined.designed@gmail.com', 'Streamlined Designed');//WHO WE'RE SENDING THE EMAIL TO
            $mail->Subject = 'Website contact form submission';
            $mail->Body = $body;
        
            if (!$mail->send()) {
                $error = "Your message could not be sent. Try again?";
            }
        }

        if ($error != null) {
            $this->container->get('flash')->addMessage('error', $error);
        } else {
            $this->container->get('flash')->addMessage('success', "Successfully sent message. We will contact you shortly!");
        }

        return;
    }
}