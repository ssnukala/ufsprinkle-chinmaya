<?php

    /**
     * Core configuration file for Chinmaya.  You must override/extend this in your site's configuration file.
     *
     * Sensitive credentials should be stored in an environment variable or your .env file.
     * Database password: DB_PASSWORD
     * SMTP server password: SMTP_PASSWORD
     */

return [
        'timezone' => 'America/Chicago',
        'site' => [
            'title'     =>      'Chinmaya',
            'author'    =>      'Registration Sevak'
        ],
        'db'      =>  [
            'default' => [
                'options'   => [\PDO::ATTR_EMULATE_PREPARES => true] //need this to aviod View Query errors 
            ]
        ]
    ];