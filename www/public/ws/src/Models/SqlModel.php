<?php
namespace App\Models;
use PDO;

class SqlModel{
    
    protected static $host      = "contenedor-slim-db-1";
    protected static $dbname    = "library";
    protected static $user      = "root";
    protected static $password  = "libr4ryroot";
    

    protected static function connect(){
        $cnx = new PDO("pgsql:host=". self::$host .";dbname=". self::$dbname .";user=". self::$user .";password=". self::$password);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnx;
    }

    protected static function executeFetchBooks($query_sql, $params = []) {
        $cnx = self::connect();

        $stm = $cnx->prepare($query_sql);
        foreach ($params as $key => $value) {
            $stm->bindValue($key, $value);
        }
        $result = $stm->execute();

        $rows = [];
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $rows["books"][] = array(
                "id"        => $row['id'],
                "titulo"    => $row["title"],
                "publicado" => $row["publication_year"],
                "isbn"      => $row["isbn"]
            );
        }
        return $rows;
    }

    protected static function executeCountBooks($query_sql) {
        $cnx = self::connect();

        $stm = $cnx->prepare($query_sql);
        $result = $stm->execute();
        $row[] = $stm->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row;
        }
    }

    protected static function executeInsertAuthor($query_sql, $params = []){
        $cnx = self::connect();

        $stm = $cnx->prepare($query_sql);
        foreach ($params as $key => $value) {
            $stm->bindValue($key, $value);
        }
        $result = $stm->execute();
        $rows[] = $stm->fetch(PDO::FETCH_ASSOC);

        if($rows) {
            return $rows;
        }
    }
}


?>