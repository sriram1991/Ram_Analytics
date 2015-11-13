#! /bin/bash
echo "::::: ASK ANALYTICS DataBase Setup :::::"
echo -n "Please Enter your MySQL Root Password $"
# Read Password
read -s passwd
echo
echo "--> ASK ANALYTICS DataBase is Setting up ..."
# Setup the MySQL
mysql -uroot -p$passwd < ask_analytics_db.sql
echo "--> DataBase Installed ..."

mysql -uroot -p$passwd < ask_analytics_data.sql
echo "--> Inserting Data ..."

echo "--> Inserting Indian Pincode Records ..."
mysql --local-infile -p$passwd -uroot < pincodes.sql

echo "--> Creating Views ..."
mysql -uroot -p$passwd < ask_analytics_view.sql
echo "--> Creating Triggers ..."
mysql -uroot -p$passwd < ask_analytics_triggers.sql 

echo "--> ASK ANALYTICS System is Ready to use ."

