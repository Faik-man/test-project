#!/bin/bash

if [ -d "/var/lib/mysql/bitrix" ]; then
    echo "Импорт базы данных завершен."
else
    echo "Ошибка: база данных не инициализирована."
fi

