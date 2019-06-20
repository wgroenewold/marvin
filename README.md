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



Eerst aanzetten:
    https://api.slack.com/apps/AKRSMC3FY/event-subscriptions?
Daarna moet je voldoen aan de challenge
    https://api.slack.com/events/url_verification
Daarom kunnen we niet meer die simpele zooi, maar moeten we iets als:
    https://inside.getambassador.com/serverless-creating-a-webhook-consumer-in-5-minutes-4136adab06b0    
        
    

