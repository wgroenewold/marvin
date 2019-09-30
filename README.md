# Marvin
#### Slackbot to measure "werkgeluk".

![Marvin shaking head](https://media.giphy.com/media/9AeRnRRNQokeI/giphy-downsized.gif "Marvin shaking head")


 *"Here I am, brain the size of a planet, and they tell me to take you up to the bridge. Call that job satisfaction? 'Cos I don't."*

## Setup
- Clone repo
- ```composer install/update```
- Create Slack App and get App ID 
- Activate [incoming webhooks](https://api.slack.com/apps/YOURAPPID/incoming-webhooks)
- Create dialog with [Block Kit Builder](https://api.slack.com/tools/block-kit-builder) and dump in ```dialog.json```
- Setup [interactive components](https://api.slack.com/apps/YOURAPPID/interactive-messages)
- Rename ```.env.example``` to ```.env``` and fill with your settings
- Setup random trigger to ```cron.php``` with cron [Tutorial](https://github.com/taw00/howto/blob/master/howto-schedule-cron-jobs-to-run-at-random-intervals.md)

## Todo:
- ~~Send dialog.json to Slack.~~ 
- ~~Use Guzzle to send POST request~~
- ~~Catch callback from buttons - https://api.slack.com/messaging/interactivity~~
- ~~Use Medoo https://medoo.in/api/new to write catches to db (stamped!)~~
- ~~Alles nog aan elkaar beunen en voorzien van wat leuke grapjes enzo.~~
- ~~Dotenv implementeren~~
- ~~Add results to hook~~
- ~~Stage 0.1~~
- Add random trigger example
- SLACK_EXPIREDTXT implementeren
- Add option for tags
- Add extra table with userid meta       
- Draw results on grafana dashboard.
 

## Someday:
- Document .env template vars
- Say something about scope  
- Replace MySQL with InfluxDB for better performance/scalability. 
- Remove stuff about channels