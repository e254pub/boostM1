<?php

namespace App\Scripts;

/**
Создание объекта
Создание объекта
Уничтожение объекта
Уничтожение объекта
Уничтожение объекта
Конец скрипта
 */

class GarbageCollector
{
    public function __construct() {
        echo "Создание объекта\n";
    }

    public function __destruct() {
        echo "Уничтожение объекта\n";
    }
}

// Создаем объекты
$obj1 = new GarbageCollector();
$obj2 = new GarbageCollector();

// Уничтожаем ссылки на объекты
unset($obj1);
unset($obj2);

// В этой точке сборщик мусора может быть активирован,
// так как оба объекта больше не используются

// Создадим еще один объект
// но перед тем, как скрипт завершится, срабатывает сборщик мусора и удаляет неиспользуемые объекты.
$obj3 = new GarbageCollector();

// Завершаем выполнение скрипта
echo "Конец скрипта\n";

/**
Zend Garbage Collector (ZGC) срабатывает в нескольких моментах во время выполнения скрипта:

1. При превышении заданного лимита использования памяти (определенного в php.ini параметром memory_limit).
 * Если текущее количество используемой памяти превышает этот лимит, то сборщик мусора автоматически запускается для освобождения неиспользуемых объектов и освобождения памяти.

2. При достижении времени жизни объекта. В PHP каждому объекту назначается время жизни (lifetime),
 * которое определяется во время создания объекта. Когда время жизни объекта истекает, сборщик мусора может удалить его и освободить использованную им память.

3. При вызове функции gc_collect_cycles(). Это явный способ выполнить ручную активацию сборщика мусора.
 * Вызов этой функции приведет к обходу всех доступных объектов и удалению неиспользуемых.

Кроме того, в PHP 8 введены новые функции для контроля над сборщиком мусора, такие как gc_disable() и gc_enable().
 * Можно использовать эти функции для временного отключения и включения сборщика мусора соответственно.
 */