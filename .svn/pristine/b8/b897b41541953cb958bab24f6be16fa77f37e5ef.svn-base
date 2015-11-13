clear;
now="$(date +'%Y-%m-%d')"
printf "checking log-%s ...\n" "$now"
echo "Rsync Files ..."
sudo rsync -avz --no-p --no-o --no-g * /var/websites/ask_analytics/
echo "Files Copied Successfully .."
echo "Press any key to start log"
read -s key
tail -f /var/websites/ask_analytics/application/logs/log-"$now".php
#tail -f /var/log/apache2/error.log

