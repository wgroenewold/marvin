# Geluksdubbeltje
Tool to measure "werkgeluk". Now interfaces with Slack, can be expanded later.

- Setup random trigger to index.php with cron https://github.com/taw00/howto/blob/master/howto-schedule-cron-jobs-to-run-at-random-intervals.md 
- Create dialog with https://api.slack.com/tools/block-kit-builder
- First Slack hoop jumping with challenge
Eerst aanzetten:
    https://api.slack.com/apps/AKRSMC3FY/event-subscriptions?
Daarna moet je voldoen aan de challenge
    https://api.slack.com/events/url_verification

Todo:
- Send dialog.json to Slack. 
# Use Guzzle to send POST request
- Catch callback from buttons - https://api.slack.com/messaging/interactivity
- Use Medoo https://medoo.in/api/new to write catches to db (stamped!)
- Draw results on grafana dashboard 

Wish: 
- Replace MySQL with InfluxDB for better performance/scalability. 


    

