# API_calls

Бизнес - задача клиента: 

Планируется наем сотрудника, который должен будет прослушивать звонки и контролировать работу операторов, однако, он не должен видеть номера клиентов компании.

Реализация: 

Так как штатный функционал ItooLabs не предоставляет такой возможности, то было принято решение реализовать скрипт на основе REST API платформы ItooLabs. 

Описание сервиса: 

Данный скрипт "ловит" POST запрос от виртуальной АТС, обрабатывает его и выкладывает на страничку. Время хранения записи - сутки. Добавлен минимальный интерфейс и авторизация.
