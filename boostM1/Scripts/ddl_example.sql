/** 1 */
/** Оператор CREATE используется для создания новых объектов базы данных, таких как таблицы, индексы, процедуры и т. д */
CREATE TABLE my_table(id INT, name VARCHAR(50));
CREATE INDEX my_index ON my_table (id);

/** Оператор ALTER используется для изменения структуры существующих объектов базы данных. */
ALTER TABLE my_table ADD COLUMN age INT;
ALTER TABLE my_table MODIFY COLUMN name VARCHAR(100);

/** Оператор DROP используется для удаления объектов базы данных. */
DROP TABLE my_table;
DROP INDEX my_index ON my_table;

/** 2 */
/** GRANT: Этот запрос предоставляет одному или нескольким пользователям определенные привилегии в базе данных
  GRANT <privileges> ON <database>.<table> TO <user>@<host>; SELECT, INSERT
  */
GRANT ALL PRIVILEGES ON database.my_table TO 'tim'@'localhost';
/** REVOKE: Этот запрос отзывает одну или несколько привилегий у пользователя или группы пользователей в базе данных.
    REVOKE <privileges> ON <database>.<table> FROM <user>@<host>;
    */
REVOKE ALL PRIVILEGES ON database.my_table FROM 'tim'@'localhost';

/** 3 */
/** Операция TRUNCATE в базах данных используется для очистки данных из таблицы. DDL(Data Definition Language)
    1. Создается новая пустая таблица с такой же структурой, как у исходной таблицы.
    2. Удаляются все данные из исходной таблицы.
    3. Удаляется новая таблица и выполняется коммит транзакции
Отличия операции TRUNCATE от операции DELETE (DML(Data Manipulation Language)):
1. TRUNCATE удаляет все строки из таблицы одним оператором, в отличие от операции DELETE, которая удаляет строки одну за другой.
2. TRUNCATE выполняется быстрее, чем DELETE, особенно для больших таблиц, потому что он не записывает каждую удаленную строку в журнал транзакций и не сохраняет их в undo-логе.
3. TRUNCATE не может быть отменен или откатан. Когда операция TRUNCATE выполняется, все данные удаляются без возможности их восстановления.
  В то же время, операция DELETE может быть отменена с помощью операции ROLLBACK.
4. TRUNCATE также сбрасывает автоинкрементные значения (если они настроены) для данной таблицы.
5. При использовании операции TRUNCATE таблица остается существующей со структурой схемы и другими настройками.
  В отличие от операции DELETE, где таблица остается после удаления всех строк.
  */
TRUNCATE TABLE database.my_table;
DELETE FROM database.my_table WHERE name = 'value';

/** 5 */
/**
  Представление (VIEW) в MySQL является виртуальной таблицей, которая основана на результатах выполнения запроса SELECT.
  Представления не содержат фактических данных, они формируются динамически при обращении к ним.
  Представления могут использоваться для упрощения сложных запросов, сокрытия сложной логики запроса и повторного использования запросов.

  MERGE - это метод создания представлений, который позволяет оптимизировать запросы, объединяя их с внешними SQL-запросами.
  Он работает путем непосредственного вставления SQL-кода представления внутрь внешнего запроса.
  Недостатком этого метода является то, что он может быть недоступен, если представление содержит определенные конструкции SQL или функции.

  TEMPTABLE - это метод создания представлений, который создает временную таблицу с результатами запроса представления и затем выполняет операции над этой таблицей.
  После завершения операций результаты возвращаются как обычная таблица.
  */
CREATE VIEW car_view AS SELECT id, brand, model, year, color FROM car;
SELECT * FROM car_view WHERE year > 2008;
/** количество автомобилей, максимальной цене и среднем пробеге по маркам автомобилей */
CREATE VIEW car_summary AS
SELECT make, COUNT(*) AS total_cars, MAX(price) AS max_price, AVG(mileage) AS avg_mileage
FROM car
GROUP BY make;

/* MERGE: */
CREATE VIEW my_view AS SELECT * FROM my_table WHERE column = 'value';

/* Пример использования TEMPTABLE: */
CREATE VIEW my_view AS
SELECT column1, column2
FROM my_table
GROUP BY column1;

/** 6 */
/**
  LIMIT используется для ограничения количества строк, которые будут возвращены в результате запроса.
  Он принимает один аргумент - число, которое указывает, сколько строк должно быть возвращено из результатов запроса
 */
SELECT * FROM car LIMIT 100;
/**
  OFFSET используется для указания смещения в результатах запроса.
  Он принимает один аргумент - число, которое указывает, с какой строки начать возвращать результаты.
 */
SELECT * FROM car LIMIT 100 OFFSET 5;

/** 7 */
/**
  UNION:
   - Оператор UNION используется для объединения результатов SELECT-запросов без включения дублирующихся строк.
   - Результат объединения будет содержать только уникальные строки.
   - Столбцы в результирующей таблице будут выбраны из первого SELECT-запроса.
   - Столбцы во всех SELECT-запросах должны быть одинакового типа и должны быть указаны в одинаковом порядке.
 */
SELECT brand, color FROM car
UNION
SELECT brand, color FROM car WHERE color = 'red';
/**
  UNION ALL:
   - Оператор UNION ALL также используется для объединения результатов SELECT-запросов, но с включением дублирующихся строк.
   - Результат объединения будет содержать все строки из всех SELECT-запросов.
   - Столбцы в результирующей таблице будут выбраны из первого SELECT-запроса.
   - Столбцы во всех SELECT-запросах должны быть одинакового типа и должны быть указаны в одинаковом порядке.
 */
SELECT brand, color FROM car
UNION ALL
SELECT brand, color FROM car WHERE color = 'red';

/** 8 */
/** group by группирует строки и позволяет выполнять агрегатные функции для каждой группы,
    distinct возвращает только уникальные значения из столбца или комбинации столбцов */
/**
  Group by - это оператор, который используется для группировки строк в таблице на основе одного или нескольких столбцов.
  Он позволяет выполнить агрегатные функции (например, суммирование, подсчет, вычисление среднего значения) для каждой группы.
 */
/** группируем по brand и подсчитываем кол-во строк */
SELECT brand, COUNT(*) FROM car GROUP BY brand;
/**
  Distinct - это ключевое слово, используемое для выборки уникальных значений из столбца или комбинации столбцов.
  Он удаляет повторяющиеся значения и возвращает только уникальные.
 */
SELECT DISTINCT brand FROM car;

/** 9 */
/** INNER JOIN:
   - Возвращает только те строки, в которых есть совпадения в обеих таблицах. */
SELECT c.*, b.name AS brand_name
FROM car c
INNER JOIN brand b ON c.brand_id = b.id;

/** LEFT JOIN:
   - Возвращает все строки из левой таблицы и только совпадающие строки из правой таблицы.
     Если в правой таблице нет совпадений, то возвращается NULL. */
SELECT c.*, b.name AS brand_name
FROM car c
LEFT JOIN brand b ON c.brand_id = b.id;

/** RIGHT JOIN:
   - Возвращает все строки из правой таблицы и только совпадающие строки из левой таблицы.
     Если в левой таблице нет совпадений, то возвращается NULL. */
SELECT c.*, b.name AS brand_name
FROM car c
RIGHT JOIN brand b ON c.brand_id = b.id;

/** FULL JOIN:
   - Возвращает все строки из обеих таблиц. Если нет совпадений, то для недостающих значений в таблице будет NULL. */
SELECT c.*, b.name AS brand_name
FROM car c
FULL JOIN brand b ON c.brand_id = b.id;

/** CROSS JOIN:
   - Возвращает все возможные комбинации строк из обеих таблиц. В результате будет произведено декартово произведение таблиц. */
SELECT c.*, b.name AS brand_name
FROM car c
CROSS JOIN brand b;

/** 10 */
/** EXPLAIN
- id: порядковый номер для каждой строки вывода EXPLAIN (в общем плане запроса);
- selecttype: тип запроса, например, SIMPLE (самостоятельный SELECT) или SUBQUERY (подзапрос);
- table: имя таблицы;
- partitions: разделы таблицы, которые будут просканированы;
- type: тип соединения, вычисленный оптимайзером запросов;
- possiblekeys: список возможных индексов для данного запроса;
- key: индекс, который фактически будет использоваться для выполнения запроса;
- keylen: длина использованного индекса;
- ref: столбцы или константы, используемые вместе с индексом;
- rows: количество строк, которые будут просканированы;
- filtered: процент строк, которые останутся после применения условий WHERE;
- Extra: дополнительная информация о выполнении запроса, такая как использование временных таблиц или файловых сортировок.
1. Можно проверить тип соединения (type). Наиболее оптимальным типом является "eqref", который указывает на использование уникальных индексов.
  Если тип соединения не является оптимальным, можно рассмотреть создание дополнительных индексов или изменение запроса.
2. Можно проверить значения столбца "rows". Если это число очень большое, то запрос потребляет много ресурсов.
  В таком случае можно рассмотреть добавление индексов или изменение условий запроса.
3. Проверить значения столбца "Extra". Если в запросе используются временные таблицы или файловые сортировки, это может быть замедляющим фактором.
  Можно рассмотреть изменения в структуре таблицы или запросе для удаления использования временных структур.
 */
EXPLAIN SELECT * FROM car WHERE brand = 'Ford' AND color = 'red';
/** К примеру, используется константный тип соединения (const), и индексы brand и color используются оптимально.
  id | selecttype | table | partitions | type  | possiblekeys | key  | keylen | ref  | rows | filtered | Extra
  1  | SIMPLE     | car   |            | const | brand,color  | const| 185    | const| 1    |   100.00 | Using index
 */

/** А тут, используется тип соединения по индексу (index), но при этом индекс не используется в полном объеме.
    Можно создать составной индекс на столбцы brand и color для более оптимального выполнения запроса.
  id | selecttype | table | partitions | type  | possiblekeys | key  | keylen | ref  | rows | filtered | Extra
  1  | SIMPLE     | car   |            | index | brand,color  | NULL | 185    | NULL | 3    |   33.33  | Using where; Using index
*/