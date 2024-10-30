<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
date_default_timezone_set('America/Sao_Paulo');
/**
 * Class Config
 */
class Config
{
    /**
     * @var bool
     */
    private static $sandbox = false;
    /**
     * @var string
     */
    private static $email = '';
    /**
     * @var string
     */
    private static $tokenProduction = "";
    /**
     * @var string
     */
    private static $tokenSandbox = "";
    /**
     * @return string
     */
    public static function getEmail()
    {
        return self::$email;
    }
    /**
     * @return string
     */
    public static function getToken()
    {
        return self::isSandbox() ? self::$tokenSandbox : self::$tokenProduction;
    }
    /**
     * @return bool
     */
    public static function isSandbox()
    {
        return self::$sandbox;
    }
    /**
     *
     */
    public static function setSandbox()
    {
        self::$sandbox = true;
    }
    /**
     *
     */
    public static function setProduction()
    {
        self::$sandbox = false;
    }
    public static function setAccountCredentials($email, $token, $isSandbox = true)
    {
        self::$email = $email;
        if($isSandbox === true) {
            self::setSandbox();
            self::$tokenSandbox = $token;
        }else{
            self::setProduction();
            self::$tokenProduction = $token;
        }
    }
}