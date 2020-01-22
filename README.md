Setup:

1) Extract zip file
2) Edit .env file
3) In terminal and project directory, run "composer install"
4) Create DB depending on .env file
5) In terminal and project directory, run "php artisan migrate"
6) Optional: Run "php artisan key:generate" if asked

To run "Data Importer":
1) In terminal and project directory, run "php artisan populatePlayers"

To view all players with only ID and Full Name:
1) It will be in the "/players" route (For me running built in server: http://localhost:8000/players)

To view a single player:
1) It will be in the "/player/{id}" route (For me running built in server: http://localhost:8000/player/{id})

Others:
1) Also added unit test, run "vendor/bin/phpunit"