<?php

namespace Alura\Cursos\Infra\Persistence;

use PDO;

class ConnectionCreator
{
    /**
     * Classe que realize a conexão única com o banco de dados utilizando
     * a design pattern de Static Creation Method
     */
    public static function createConnection()
    {
        $db_path = __DIR__.'/../../../db.sqlite';
        
        return new PDO('sqlite:'.$db_path);
    }
}