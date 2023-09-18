# Join`ы
## INNER JOIN
INNER JOIN: Возвращает только те строки, в которых есть совпадения в обеих таблицах.
```mysql
SELECT c.*, b.name AS brand_name
FROM car c
INNER JOIN brand b ON c.brand_id = b.id;
```
## LEFT JOIN
LEFT JOIN: Возвращает все строки из левой таблицы и только совпадающие строки из правой таблицы. Если в правой таблице нет совпадений, то возвращается NULL.
```mysql
SELECT c.*, b.name AS brand_name
FROM car c
LEFT JOIN brand b ON c.brand_id = b.id;
```
## RIGHT JOIN
RIGHT JOIN: Возвращает все строки из правой таблицы и только совпадающие строки из левой таблицы. Если в левой таблице нет совпадений, то возвращается NULL.
```mysql
SELECT c.*, b.name AS brand_name
FROM car c
RIGHT JOIN brand b ON c.brand_id = b.id;
```
## FULL JOIN
FULL JOIN: Возвращает все строки из обеих таблиц. Если нет совпадений, то для недостающих значений в таблице будет NULL.
```mysql
SELECT c.*, b.name AS brand_name
FROM car c
FULL JOIN brand b ON c.brand_id = b.id;
```
## CROSS JOIN
CROSS JOIN: Возвращает все возможные комбинации строк из обеих таблиц. В результате будет произведено декартово произведение таблиц.
```mysql
SELECT c.*, b.name AS brand_name
FROM car c
CROSS JOIN brand b;
```
