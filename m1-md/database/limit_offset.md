# LIMIT 
- Используется для ограничения количества строк, которые будут возвращены в результате запроса.
Он принимает один аргумент - число, которое указывает, сколько строк должно быть возвращено из результатов запроса
```mysql
SELECT * FROM car LIMIT 100;
```

# OFFSET
- Используется для указания смещения в результатах запроса.
  Он принимает один аргумент - число, которое указывает, с какой строки начать возвращать результаты.
```mysql
SELECT * FROM car LIMIT 100 OFFSET 5;
```