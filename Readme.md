<h1>Проблемы проекта НЭП:</h1>
<ul>
    <li>Невозможность тестирования на локалке</li>
    <li>Сервисная архитектура должна осуществлять взаимодействие через soap, xml, но лучше json.</li>
    <li>Избыточность репозиториев должна быть минимизирована:
        <ul>
            <li>То есть весь код нужно перенести в application как минимум. <br>(чтобы не было 200 репозиториев с а-ля общими функционалом, который только порождает огромное количество костылей и бессмысленного наследования)<br> 
            </li>
            <li>Как максимум, свести все к одному репозиторию для фронта, где бы были шаблоны, роутинги и все остальное. <br>
            Основной же функционал, вроде авторизации, данные для отдельных процедур или сервисов с отправки уведомлений, должен быть поднят отдельными сервисами.</li>
            <li>Избавиться от гидраторов, форм и гридов. Существенно проще контролировать фронт напрямую, либо через SPA.</li>
        </ul>
    </li>
    <li>Не должно быть разделений на две бд, нужно выпилить или полностью перейти на sphinx</li>
</ul>

<h1>Что сделано?</h1>
<ul>
    <li>Docker интеграция</li>
    <li>Интеграция сессий с zend на symfony по memcached</li>
    <li>Структура шаблонов и css файлов</li>
</ul>

<h1>Что нужно сделать еще?</h1>
<ul>
    <li>Сервис авторизации должен уметь вытаскивать роль, участника организации для тек пользователя и проверять права(опять же просто система join-ов для user entity)</li>
    <li>Я не допилил вывод каталога, там приколы с лотами, их просто нужно в entity вытаскивать, а потом вывести в шаблоне Twig catalog</li>
    <li>Не сделал воркеры под интеграции с росатомом и не только. (Но думаю, что сделать вывод функционал под работу с консолью на Symfony весьма просто)</li>
    <li>contracts clarifications</li> 
</ul>

<h1>Чтобы продвинуть идею переделывания проекта, аргументы:</h1>
<ul>
    <li>Предложить красивый фронт, сравнивая с аналогичными платформами.</li>
    <li>Сказать, к чему привело то, что проект столь устаревший(отсутствие возможности тестирования локально, избитая структура, отсутствие дискретности и самое ВАЖНОЕ -- изменения в одном месте не могут гарантировать то, что они не сломают что-то в другом(про поиск функционала, который ты не знаешь, где раскидан, я вообще молчу))</li>
    <li>Повышение эффективности выполнения задач</li>
    <li>Повышение уровня безопасности</li>
    <li>Поддержка zf 2 закончилась еще 4 года назад</li>
    <li>Интегрирование системы мониторинга ошибок(приурочить это к тому, что нужно на симфони переходить)</li>
</ul>

<h1>Как поднять проект?</h1>
<ul>
    <li>Устанавливаешь проект в свою папку с НЭП</li> 
    <li>Для Sectionks в nginx конфигурации добавляешь пример из sectionks.conf</li>
    <li>Запускаешь docker-compose</li>
    <li>заходишь на /beta/223/catalog/procedure</li>
    <li>???Profit</li>
</ul>