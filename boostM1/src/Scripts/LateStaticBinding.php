<?php

namespace App\Scripts;
/** Позднее статическое связывание */

/**
 * Вызывать статические методы или обращаться к статическим свойствам класса из методов, наследуемых в дочерних классах.
 * Ранее это было возможно только с использованием ключевого слова "self", которое привязывалось к классу, в котором оно было определено.
 */
class Car {
    protected static string $type = 'vehicle';

    public static function getType(): string
    {
        return static::$type;
    }
}

class Sedan extends Car {
    protected static string $type = 'sedan';
}

class SUV extends Car {
    protected static string $type = 'SUV';
}

echo Car::getType(); // выведет 'vehicle'
echo Sedan::getType(); // выведет 'sedan'
echo SUV::getType(); // выведет 'SUV'