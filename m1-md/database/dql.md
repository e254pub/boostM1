# DQL запросы: GRANT, REVOKE
## GRANT
GRANT: Этот запрос предоставляет одному или нескольким пользователям определенные привилегии в базе данных
```mysql
GRANT <privileges> ON <database>.<table> TO <user>@<host>; SELECT, INSERT

GRANT ALL PRIVILEGES ON database.my_table TO 'tim'@'localhost';
```
## REVOKE
REVOKE: Этот запрос отзывает одну или несколько привилегий у пользователя или группы пользователей в базе данных.
```mysql
REVOKE <privileges> ON <database>.<table> FROM <user>@<host>;

REVOKE ALL PRIVILEGES ON database.my_table FROM 'tim'@'localhost';
```