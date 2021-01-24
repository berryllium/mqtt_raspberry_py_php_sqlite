Инструкция по развертыванию сервиса на MQTT с хранением данных
Есть пример тут https://iotbytes.wordpress.com/store-mqtt-data-from-sensors-into-sql-database/
Репозиторий с ним https://github.com/pradeesi/Store_MQTT_Data_in_Database


Наш вариант:
Устанавливаем mosquito. Есть инструкция https://robot-on.ru/articles/ystanovka-mqtt-brokera-mosquitto-raspberry-orange-pi
Записываем заданные учетные данные (логин, пароль, адрес и порт)

Устанавливаем если нет Python версии 3
sudo apt-get install python3

Устанавливаем менеджер пакетов pip3
sudo apt-get install python3-pip

Запускаем скрипт на питоне, который будет прослушивать топики, создавать соответствующие таблицы и наполнять их.

Затем с использованием веб-сервера и PHP вытаскиваем данные в нужном виде из базы.




