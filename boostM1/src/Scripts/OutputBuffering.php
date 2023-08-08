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
  public function bufferng(): void
  {
      /** Функция начинает буферизацию вывода.
       * Все данные, отправляемые на вывод после вызова этой функции, будут сохраняться в буфере вместо немедленной отправки
       */
      ob_start();

      echo "Toyota ";

      ob_start();

      echo "Corolla";
      /** Функция очищает буфер вывода и возвращает его содержимое в виде строки */
      $innerBuffer = ob_get_clean();
      $outerBuffer = ob_get_clean();

      echo $innerBuffer; // Output: Toyota
      echo $outerBuffer; // Output: Corolla
  }
}