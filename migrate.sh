#!/usr/bin/env bash

CWD=$(pwd)

if [ $1 = "migrate" ]
then
    ./console.php --configuration=${CWD}/migrations.yml migrations:migrate --no-interaction
elif [ $1 = "status" ]
then
    ./console.php --configuration=${CWD}/migrations.yml migrations:status
elif [ $1 = "help" ]
then 
    ./console.php help
elif [ $1 = "revert" ] 
then 
    ./console.php --configuration=${CWD}/migrations.yml migrations:execute $2 --down
elif [ $1 = "generate" ]
then
    ./console.php --configuration=${CWD}/migrations.yml migrations:generate
else
    echo "incorrect command. migrate, status, help, revert \$1, generate"
fi