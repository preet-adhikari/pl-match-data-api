## Premier League data on fixtures(2000-2022), with betting data included.

Contains the necessary data for Premier League matches of all the teams and their statistics from 2000 onwards to 2022.

This application uses Laravel Passport for OAuth authentication. In order to use the APIs the user must create an account using the endpoints that are given below. 

### APIs 

#### Create an account :

`POST /api/register` 

| Variable  | Description |
| ------------- |:-------------:|
| `name`      | Enter your name     |
| `email`      | Enter a valid email     |
| `password`      | Create a valid password, minimum 6 characters     |
| `password_confirmation`      | Repeat the password     |

You will be immediately logged in and will have the bearer token from which you can access the APIs.

#### Login :

`POST /api/login` 

| Variable  | Description |
| ------------- |:-------------:|
| `email`      | Enter your email     |
| `password`      | Enter your password |


#### Logout :

Incase you want to logout : 

`POST /api/logout`

with the Authorization token. 

#### Get data from an Individual season :

`GET /api/season/{season}`

Where the season is the year between 2000 to 2021. 

The season is usually two years like 2000 is actually 2001/2002 but if you enter a single year it shows you season where the first year is the starting season. So, if you enter 2014, then it'll show the 2014/15 season data. 

Here is an example: 

##### Request : 

`GET /api/season/2012`

#### Response :

```
{
        "division": "E0",
        "date": "8/16/2014",
        "home_team": "Leicester",
        "away_team": "Everton",
        "full_time_home_team_goals": 2,
        "full_time_away_team_goals": 2,
        "full_time_result": "D",
        "half_time_home_team_goals": 1,
        "half_time_away_team_goals": 2,
        "half_time_result": "A",
        "season": "2014/2015",   
    },
    {
        "division": "E0",
        "date": "8/16/2014",
        "home_team": "Man United",
        "away_team": "Swansea",
        "full_time_home_team_goals": 1,
        "full_time_away_team_goals": 2,
        "full_time_result": "A",
        "half_time_home_team_goals": 0,
        "half_time_away_team_goals": 1,
        "half_time_result": "A",
        "season": "2014/2015",
    }, ...
```
It'll show you the full result of the entire season that year. 