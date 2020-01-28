<?php

class DatabaseManager extends PDO
{
    public function __construct($file = 'database.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
       
        $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'] .
        ';charset=UTF8';

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
}
