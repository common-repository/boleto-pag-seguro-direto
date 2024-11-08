<?php
/**
 * Created by PhpStorm.
 * User: leode
 * Date: 22/07/2017
 * Time: 15:49
 */
class Utils
{
    static public function onlyNumbers($number)
    {
        return preg_replace('/[^0-9]/', '', $number);
    }
    static public function checkCPF($cpf = null)
    {
        if (empty($cpf)) {
            return false;
        }
        $cpf = self::onlyNumbers($cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
        }
        for ($verifier = 9; $verifier < 11; $verifier++) {
            for ($digit = 0, $position = 0; $position < $verifier; $position++) {
                $digit += $cpf{$position} * (($verifier + 1) - $position);
            }
            $digit = ((10 * $digit) % 11) % 10;
            if ($cpf{$position} != $digit) {
                return false;
            }
        }
        return true;
    }
}
?>