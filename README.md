# Geluksdubbeltje
Tool to measure "werkgeluk"

- Setup random trigger to index.php with cron https://github.com/taw00/howto/blob/master/howto-schedule-cron-jobs-to-run-at-random-intervals.md 
- create dialog with https://api.slack.com/tools/block-kit-builder


Todo:
- Send slack.json to Slack (should be renamed to dialog.json)
- Use Guzzle to send POST request
- Catch callback from buttons - https://api.slack.com/messaging/interactivity
- Use Medoo https://medoo.in/api/new to write catches to db (stamped!)
- Draw results on grafana dashboard 

Wish: 
- Replace MySQL with InfluxDB for better performance/scalability. 