#!/usr/bin/env bash

crontab -l > temp
echo "logfile=crontab-demo.log" >> temp
echo "t0to8hours=\"RANDOM % 8\""
echo "0 */9 * * 1-5 r=$((t0to8hours)) ; sleep ${r}h ; /usr/bin/php -q /usr/share/nginx/marvin/public/cron.php >> $logfile 2>&1"
crontab temp
rm temp