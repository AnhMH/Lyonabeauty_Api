<?php
return array(
    'defaults' => array(
        'phpmailer' => array(
            'Mailer' => 'smtp',
            'SMTPAuth' => true,
            'SMTPDebug' => 2,
            'SMTPSecure' => 'tls',
            'Host' => 'mail.lyonabeauty.com',
            'Port' => 587,
            'Username' => 'admin@lyonabeauty.com',
            'Password' => '1@Hoanganh',
            'Timeout' => 30, // 30 seconds
        ),
        'wordwrap' => 0,
    ),
);