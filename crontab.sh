#!/usr/bin/env bash

crontab -l > temp
echo "logfile=crontab-demo.log" >> temp
echo "0 9 * * 1-5 sleep $[RANDOM\%8]h ; wget -q --spider https://YOURURL.TLD/cron.php >> /var/log/file.log" > temp
crontab temp
rm temp