#! /bin/bash
echo "::::: ASK ANALYTICS User Bulk Entry :::::"
echo -n "Please Enter your MySQL Root Password $"
# Read Password
read -s passwd
echo
echo "--> ASK ANALYTICS User Enrolling up ..."
# Setup the MySQL
echo "--> Inserting User Course Records insertng ..."
mysql --local-infile -p$passwd -uroot < user_bulk.sql
echo "--> ASK ANALYTICS User Bulk Entry Compleated."

