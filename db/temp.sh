#! /bin/bash
echo " Enter MySQL Root Passwd"
read -s passwd
mysql -uroot -p$passwd < skoldb.sql 2>&1 
if [ $? -eq 1 ] 
then
    echo "mysql error" 
fi
