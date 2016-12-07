<?php
/**
 * Created by PhpStorm.
 * User: roee
 * Date: 06/12/2016
 * Time: 17:51
 */
require('vendor/autoload.php');

$to = [$_GET['to']];

if (isset($_GET['recipient']))
{
    $to = [ $_GET['to'] => $_GET['recipient'] ];
}

$body = $_GET['body'];

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('127.0.0.1', 25)
    ->setUsername('support@amentraffic.com')
    ->setPassword('Abc1234');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance($subject)
    ->setFrom(array('support@amentraffic.com' => 'George Berg'))
    ->setTo(array($to))
    ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);