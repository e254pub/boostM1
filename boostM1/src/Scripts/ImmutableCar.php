<?php

namespace App\Scripts;

use JetBrains\PhpStorm\Immutable;

/**
 * immutable array - это концепция, которая позволяет гарантировать, что содержимое массива не будет изменено после его создания.
 * В PHP 8 появилась возможность использовать неизменяемые массивы с помощью нового класса ImmutableArray.
 */
/** Благодаря атрибуту #[Immutable], этот массив становится неизменяемым. Попытка изменить его приведет к возникновению фатальной ошибки. */
#[Immutable]
class ImmutableCar {
    public function getArray(): array {
        return [1, 2, 3];
    }
}

$obj = new ImmutableCar();
$array = $obj->getArray();
$array[0] = 10; // Вызовет Fatal error: Uncaught Error: Cannot modify readonly array

/**
OPcache работает следующим образом:
1. Когда PHP-скрипт впервые выполняется, он компилируется в промежуточный код, называемый байт-кодом.
2. OPcache сохраняет этот байт-код в памяти сервера.
3. Когда PHP-скрипт повторно запускается, OPcache проверяет, есть ли скомпилированный байт-код в памяти.
   Если да, то он использует его, что позволяет избежать повторной компиляции.
 */