# Marvin
#### Slackbot to measure "werkgeluk".

![Marvin shaking head](https://media.giphy.com/media/9AeRnRRNQokeI/giphy-downsized.gif "Marvin shaking head")


 *"Here I am, brain the size of a planet, and they tell me to take you up to the bridge. Call that job satisfaction? 'Cos I don't."*

## Setup
- Clone repo
- ```composer install/update```
- Setup DB (you could use ```db_structure.sql``` to simplify this for yourself)
- Create Slack App and get App ID 
- Activate [incoming webhooks](https://api.slack.com/apps/YOURAPPID/incoming-webhooks)
- Create dialog with [Block Kit Builder](https://api.slack.com/tools/block-kit-builder) and dump in ```dialog.json```
- Set scope with [OAuth & Permissions](https://api.slack.com/apps/AKRSMC3FY/oauth)
    - chat:write:bot
    - im:write
    - incoming-webhook
    - bot
    - users:read

- Setup [interactive components](https://api.slack.com/apps/YOURAPPID/interactive-messages)       
- Rename ```.env.example``` to ```.env``` and fill with your settings. You can use several template-vars to make responses pretty:
    - ```{TODAY}``` - Dinsdag 1 oktober 2019 - (date)
    - ```{NOW}``` - 3 (personal score today)
    - ```{USER_AVG}``` - 3.2 (personal average score)
    - ```{USER_COUNT}``` - 12 (count of personal scores)
    - ```{DAILY_AVG}``` - 3 (score average today of organisation)
    - ```{DAILY_COUNT}``` - 12 (count of organisation scores today)
    - ```{TOTAL_AVG}``` - 3 (score average total of organisation)
    - ```{TOTAL_COUNT}``` - 12 (count of organisation scores total)

- Setup random trigger to ```cron.php``` with cron (you could use ```crontab.sh``` to simplify this for yourself)

## I can haz demo?
https://youtu.be/Je0Pg8ITvu8

## Todo:
- ~~Send dialog.json to Slack.~~ 
- ~~Use Guzzle to send POST request~~
- ~~Catch callback from buttons - https://api.slack.com/messaging/interactivity~~
<<<<<<< HEAD
- ~~Use Medoo https://medoo.in/api/new to write catches to db (stamped!)~~
- ~~Alles nog aan elkaar beunen en voorzien van wat leuke grapjes enzo.~~
- ~~Dotenv implementeren~~
- ~~Add results to hook~~
- ~~Stage 0.1~~
- ~~SLACK_EXPIREDTXT implementeren~~
- ~~chat.update ipv ephemeral doen~~
- ~~Hook nog weer aanpassen~~
- ~~Add random trigger example~~
- ~~Scriptje maken om die db structuur klaar te rossen voor launch~~
- ~~Remove stuff about channels from README.md~~
- ~~Say something about scope in Slack~~
- ~~Release v0.2~~
- Add option for tags
    - ~~Load tags.json~~
    - ~~die tags.json maken met de db, dan kan je dat leidend houden~~
    - ~~Make trigger connected to prev results~~
    - ~~index.php verder splitten zodat emotions en decline eigen states hebben voor afvangen~~       
    - ~~Meta table maken voor tags~~
    - ~~Emotions opslaan~~
    - ~~db_structure.sql aanpassen~~
    - ~~.env.example aanpassen~~    
- ~~Release v0.3~~
- ~~Capture text input~~

#### Why is it called Marvin?
Because [HHGTTG](https://en.wikipedia.org/wiki/Marvin_the_Paranoid_Android)

#### Why is the scale 1-11?
Because [This is Spinal Tap](https://www.youtube.com/watch?v=KOO5S4vxi0o) 
 
## Someday: 
- Meta table maken voor users          
- Draw results on grafana dashboard.
- Replace MySQL with InfluxDB for better performance/scalability. 
