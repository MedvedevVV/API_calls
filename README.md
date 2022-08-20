**Описание задачи:** 

Компания пользуется облачной АТС. Возникла потребность дать доступ к прослушиваю звонков для одного из сотрудников, однако, данный сотрудник не должен видеть номера клиентов компании. 

**Реализация:**

Так как штатный функционал облачной АТС не предоставляет такой возможности, то было принято решение реализовать скрипт на основе REST API облачной АТС для решения задачи. 

**Описание сервиса:** 

Данный скрипт "ловит" POST - запрос от виртуальной АТС, обрабатывает его, а затем выполняет постинг записи разговора и информации о нем на веб - страничку. Время хранения записи - сутки. Добавлен минимальный интерфейс и авторизация.
