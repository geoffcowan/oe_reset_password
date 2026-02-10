<?php

return array(
    'author' => 'Orionesque',
    'author_url' => '',
    'name' => 'OE Reset Password',
    'description' => 'CLI command to reset a member password',
    'version' => '1.0.0',
    'namespace' => 'Orionesque\OeResetPassword',
    'settings_exist' => true,
    'commands' => array(
        'member:reset-password' => Orionesque\OeResetPassword\Commands\CommandResetPassword::class,
    ),
);
