<?php
const SERVER = 'localhost';
const DBNAME = 'jcl';
const USER = 'root';
const PASSWORD = '14789632';
class Connection
{

    public static $instance;


    private function __construct()
    {
        //
    }

    public static function getConexao()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=" . SERVER . "; dbname=" . DBNAME, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}