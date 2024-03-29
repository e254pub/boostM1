<?php

namespace App\Scripts;

/**
 * Output buffering в PHP 8 - это механизм, который позволяет временно сохранять выводимые данные скрипта в буфере памяти, прежде чем они будут отправлены клиенту.
 * Это может быть полезно в различных ситуациях, например, если хотим изменить или добавить что-то к выводу перед его отправкой,
 * или можно отложить отправку данных до определенного момента.
 */

/**
 * Вложенность механизма буферизации означает, что можно использовать несколько уровней output buffering внутри других, чтобы создать иерархию буферов вывода.
 * Можно начать буферизацию с помощью ob_start(), затем вызвать еще одну функцию ob_start() для создания вложенного буфера.
 * При вызове ob_end_flush() будут отправлены данные из вложенного буфера, а сам внешний буфер сохранит свое содержимое.
 */
class OutputBuffering
{
  public function nestedBuffering(): void
  {
      /** Функция начинает буферизацию вывода.
       * Все данные, отправляемые на вывод после вызова этой функции, будут сохраняться в буфере вместо немедленной отправки
       */
      ob_start();

      echo 'Toyota ';

      ob_start();

      echo 'Corolla';
      /** Функция очищает буфер вывода и возвращает его содержимое в виде строки */
      $innerBuffer = ob_get_clean();
      $outerBuffer = ob_get_clean();

      echo $innerBuffer; // Output: Toyota
      echo $outerBuffer; // Output: Corolla
  }

    /**
    1. ob_start(): Начинает буферизацию вывода. Все выводимые данные после вызова этой функции сохраняются в буфере.
    2. ob_get_contents(): Возвращает содержимое текущего буфера вывода, но при этом не очищает его. Можно использовать для получения данных из буфера.
    3. ob_clean(): Очищает текущий буфер вывода, удаляя все сохраненные в нем данные.
    4. ob_flush(): Выводит содержимое текущего буфера вывода и закрывает его, таким образом отправляя данные клиенту
     */
  public function outputBuffering()
  {
      ob_start(); // начинаем буферизацию вывода

      echo 'Toyota '; // выводим данные

      ob_get_contents(); // получаем содержимое буфера

      echo 'Corolla'; // изменяем данные

      ob_flush(); // выводим содержимое буфера и закрываем его
  }
}
