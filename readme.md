Краткое описание

Интернет-магазин фильмов с фильтрацией и сортировкой товаров 

Как установить

1. Скопировать репозиторий
2. Запустить локальный сервер
3. Прозвести настройку соединения с базой данных и выполнить импорт (в корне проекта дамп tp-films.sql)

Где и как тестировать

1. Открыть сайт в браузере и добавить /films в конце (например, localhost/tp-films/films/)
2. Проверить работу фильтрации, выбирая чекбоксы или меняя ценовой диапазон
3. Проверить работу добавления товара в корзину
4. Проверить работу сортировки

Особенности реализации

Реализация выполнена в рамках ТЗ, но с нюансами, о которых не говорилось и, которые обязательно были бы выполнены для продакшн-проекта.

1. Добавить прелоадер (или скелетон) при выполнении запросов к серверу
2. Корзина фактически есть, но перейти в нее нельзя, для демонстрации корректности добавления товаров в корзину был выведен счетчик.
3. В целом для продакшн-проекта фронтенд было бы хорошо организовать на базе webpack или gulp для более грамотной организации верстки и бизнес-логики на клиенте, а также использовать препроцессоры стилей с автопрефиксером для поддержки кроссбраузерности, и babel для компиляции js с целью поддержки большего количества версий браузеров.
4. Для большего количества фильмов потребуется пагинация или подгрузка при скролле новых постов.
5. Прочие доработки, которые позволили бы выглядеть проекту завершенным, не производились.
6. Для разметки и стилизации интерфейса был подключен bootstrap.
