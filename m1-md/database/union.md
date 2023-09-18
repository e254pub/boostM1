## UNION
- Оператор UNION используется для объединения результатов SELECT-запросов без включения дублирующихся строк.
- Результат объединения будет содержать только уникальные строки.
- Столбцы в результирующей таблице будут выбраны из первого SELECT-запроса.
- Столбцы во всех SELECT-запросах должны быть одинакового типа и должны быть указаны в одинаковом порядке.
```mysql
SELECT brand, color FROM car
UNION
SELECT brand, color FROM car WHERE color = 'red';
```

## UNION ALL
- Оператор UNION ALL также используется для объединения результатов SELECT-запросов, но с включением дублирующихся строк.
- Результат объединения будет содержать все строки из всех SELECT-запросов.
- Столбцы в результирующей таблице будут выбраны из первого SELECT-запроса.
- Столбцы во всех SELECT-запросах должны быть одинакового типа и должны быть указаны в одинаковом порядке.
```mysql
SELECT brand, color FROM car
UNION ALL
SELECT brand, color FROM car WHERE color = 'red';
```