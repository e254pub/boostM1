<?php

namespace App\Scripts;

/**
 * В PSR-4, который является одной из рекомендаций PSR, определены стандарты для автозагрузки классов на основе их пространств имен.
 * Стандарт PSR-4 указывает, что каждый пространство имен должно быть соответствующим каталогу в файловой системе.
 */

class MbString
{
    /** mbstring-расширения */
    /** Проверить, является ли строка многобайтовой */
    public function checkManyByte(): string
    {
        $string = 'Toyota Corolla';
        if (mb_check_encoding($string, 'UTF-8')) {
            return 'Строка является многобайтовой.';
        } else {
            return 'Строка не является многобайтовой.';
        }
    }

    /** Получить количество символов в многобайтовой строке */
    public function symbolManyByte(): string
    {
        $string = 'Toyota Corolla';
        $length = mb_strlen($string, 'UTF-8');
        return 'Длина строки: ' . $length;
    }

    /** Перекодировать однобайтовую строку в многобайтовую строку */
    public function recodeSingleByteString(): string
    {
        $string = 'Toyota Corolla';
        $convertedString = mb_convert_encoding($string, 'UTF-8', 'ISO-8859-1');
        return 'Перекодированная строка: ' . $convertedString;
    }

    /** Получить подстроку из многобайтовой строки */
    public function getSubstringFromMultibyteString(): string
    {
        $string = 'Toyota Corolla';
        $substring = mb_substr($string, 0, 7, 'UTF-8');
        return 'Подстрока: ' . $substring;
    }

}