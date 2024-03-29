#  Cross-Site Request Forgery
CSRF, или Cross-Site Request Forgery, это атака на веб-приложение, которая позволяет злоумышленнику выполнить несанкционированные действия от имени авторизованного пользователя. Атакующий создает поддельный запрос, который отправляется на целевое веб-приложение и выполняется от имени пользователя.

Вот как работает атака CSRF:

1. Жертва авторизуется в своем аккаунте на определенном веб-сайте.
2. Злоумышленник создает вредоносную страницу или встраивает злонамеренный код на доверенном сайте, на котором она может быть увидена жертвой.
3. Жертва посещает эту страницу или взаимодействует с доверенным сайтом, активируя вредоносный код.
4. Вредоносный код автоматически отправляет запросы на целевой веб-сайт от имени авторизованного пользователя без его ведома.
5. Целевой веб-сайт принимает запросы на выполнение определенных действий, таких как изменение пароля, отправка сообщений или совершение покупок.

Существуют различные меры безопасности, которые можно принять, чтобы защитить веб-приложение от CSRF-атак. Вот некоторые из них:

1. Использование токена CSRF: Веб-приложение должно генерировать уникальный токен каждый раз при отображении формы, и этот токен должен быть включен в все запросы, изменяющие состояние сервера. Таким образом, даже если злоумышленник пытается отправить поддельный запрос, он не будет иметь доступ к корректному токену и запрос будет отклонен.

2. Ограничение CORS: Веб-приложение может указать политику CORS (Cross-Origin Resource Sharing), чтобы ограничить доступ критическим операциям только для согласованных доменов. Таким образом, поддельные запросы с других доменов будут заблокированы.

3. Сайтовые cookies с флагом 'SameSite': Использование флага 'SameSite' в cookies помогает предотвратить отправку cookies на другие домены, что может помешать CSRF-атаке.

4. Анти-CSRF библиотеки: Существуют специальные библиотеки, которые автоматически добавляют защиту CSRF в веб-приложение, обнаруживая и предотвращая подобные атаки.
```shell
composer require symfony/security-csrf

go get github.com/gorilla/csrf
```