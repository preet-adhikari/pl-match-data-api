## Premier League data on fixtures(2000-2022), with betting data included.

Contains the necessary data for Premier League matches of all the teams and their statistics from 2000 onwards to 2022.

This application uses Laravel Passport for OAuth authentication. In order to use the APIs the user must create an account using the endpoints that are given below. 

### Installing it

After cloning the repository,
Run the command: 

`docker-compose up -d --build`

The containers will be created and let the database import all the data first.

### APIs 

#### Create an account :

##### Request :
`POST /api/register` 

| Variable  | Description |
| ------------- |:-------------:|
| `name`      | Enter your name     |
| `email`      | Enter a valid email     |
| `password`      | Create a valid password, minimum 6 characters     |
| `password_confirmation`      | Repeat the password     |

You will be immediately logged in and will have the bearer token from which you can access the APIs.

##### Response :

```
[
    {
    "access_token": "eyJ0....", // Your access bearer token
    "token_type": "Bearer",
    "expires_at": "20YY-MM-DD HH:MM:SS"
    }
]
```

#### Login :

##### Request :

`POST /api/login` 

| Variable  | Description |
| ------------- |:-------------:|
| `email`      | Enter your email     |
| `password`      | Enter your password |

The response is the same one as when you register :

##### Response :

```
[
    {
    "access_token": "eyJ0....", // Your access bearer token
    "token_type": "Bearer",
    "expires_at": "20YY-MM-DD HH:MM:SS"
    }
]
```

#### Logout :

Incase you want to logout : 

##### Request :

`POST /api/logout`

with the Authorization token. 

##### Response :

```
[
    {
        "message": "You have successfully been logged out."
    }
]    
```

#### Get data from an Individual season :

`GET /api/season/{season}`

Where the season is the year between 2000 to 2021. 

The season is usually two years like 2000 is actually 2001/2002 but if you enter a single year it shows you season where the first year is the starting season. So, if you enter 2014, then it'll show the 2014/15 season data. 

Here is an example: 

##### Request : 

`GET /api/season/2012`

#### Response :

```
[
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
    },
    // ...additional match data 
]   
```
It'll show you the full result of the entire season that year. 

#### Get individual team data :

Get the individual match result data of a single team from all the seasons present. 

`GET /api/team/{team}`

An example: 

##### Request : 

`GET /api/team/Chelsea`

#### Response :

```
 [
    {
        "division": "E0",
        "date": "8/19/2000",
        "home_team": "Chelsea",
        "away_team": "West Ham",
        "full_time_home_team_goals": 4,
        "full_time_away_team_goals": 2,
        "full_time_result": "H",
        "half_time_home_team_goals": 1,
        "half_time_away_team_goals": 0,
        "half_time_result": "H",
        "season": "2000/2001"
    },
    ...
    {
        "division": "E0",
        "date": "1/1/2001",
        "home_team": "Chelsea",
        "away_team": "Aston Villa",
        "full_time_home_team_goals": 1,
        "full_time_away_team_goals": 0,
        "full_time_result": "H",
        "half_time_home_team_goals": 1,
        "half_time_away_team_goals": 0,
        "half_time_result": "H",
        "season": "2000/2001"
    },
    ...
     {
        "division": "E0",
        "date": "8/29/2009",
        "home_team": "Chelsea",
        "away_team": "Burnley",
        "full_time_home_team_goals": 3,
        "full_time_away_team_goals": 0,
        "full_time_result": "H",
        "half_time_home_team_goals": 1,
        "half_time_away_team_goals": 0,
        "half_time_result": "H",
        "season": "2009/2010"
    },
    ...// and so on
]    
```

It gives the result across all the seasons of all the matches that the team is involved in.

#### Get a list of match results for an individual team for a particular season

Get the team results for a single season. Like for "Chelsea" in "2016" returns Chelsea's matches in 2016/17 season.

`POST /api/team_season`

An example: 

##### Request :

`POST /api/team_season` 

| Variable  | Description |
| ------------- |:-------------:|
| `season`      | Enter a valid year (from 2000 to 2021)     |
| `team`      | Enter the team name |


##### Response :

```
[
    {
        "division": "E0",
        "date": "8/12/2017",
        "home_team": "Chelsea",
        "away_team": "Burnley",
        "full_time_home_team_goals": 2,
        "full_time_away_team_goals": 3,
        "full_time_result": "A",
        "half_time_home_team_goals": 0,
        "half_time_away_team_goals": 3,
        "half_time_result": "A",
        "season": "2017/2018"
    },
    {
        "division": "E0",
        "date": "8/20/2017",
        "home_team": "Tottenham",
        "away_team": "Chelsea",
        "full_time_home_team_goals": 1,
        "full_time_away_team_goals": 2,
        "full_time_result": "A",
        "half_time_home_team_goals": 0,
        "half_time_away_team_goals": 1,
        "half_time_result": "A",
        "season": "2017/2018"
    },
    {
        "division": "E0",
        "date": "8/27/2017",
        "home_team": "Chelsea",
        "away_team": "Everton",
        "full_time_home_team_goals": 2,
        "full_time_away_team_goals": 0,
        "full_time_result": "H",
        "half_time_home_team_goals": 2,
        "half_time_away_team_goals": 0,
        "half_time_result": "H",
        "season": "2017/2018"
    },
    {
        "division": "E0",
        "date": "9/9/2020",
        "home_team": "Leicester",
        "away_team": "Chelsea",
        "full_time_home_team_goals": 1,
        "full_time_away_team_goals": 2,
        "full_time_result": "A",
        "half_time_home_team_goals": 0,
        "half_time_away_team_goals": 1,
        "half_time_result": "A",
        "season": "2017/2018"
    },
]
```

This results a response with an individual team's individual season data.