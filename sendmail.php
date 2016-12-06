<?php
/**
 * Created by PhpStorm.
 * User: roee
 * Date: 06/12/2016
 * Time: 17:51
 */
require('vendor/autoload.php');

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('127.0.0.1', 25)
    ->setUsername('manyak@amentraffic.com')
    ->setPassword('manyak');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom(array('manyak@amentraffic.com' => 'John Doe'))
    ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
    ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);