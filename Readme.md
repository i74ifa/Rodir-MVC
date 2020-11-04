
### Languages 

[العربية](https://github.com/i74ifa/dbsystem/blob/main/Readme-ar.md) - 
[English](https://github.com/i74ifa/dbsystem/)


# Document

## Features

- SELECT DATA
- INSERT DATA
- File Config `define` - config/app.php
- how to make `Config` app and database
- functions `Query()`
- BluePrint Queries
  - INT
  - TEXT
  - VARCHAR
  - BigIneger
  - Timestamps [created_at & updated_at]

## How to Setup

- Install Library
  composer require i74ifa/dbsystem

## how to Use

- `you need Session because the error storage on $_SESSION['errors']`

        session_start();
        require "vendor/autoload.php";
        use DBsystem74I\Database\DB;

        $DB = new DB;

* You have var `$DB`

### SELECT DATA

      $result = $DB->table('nametable')->Select(['*'])->run();

      foreach ($result as $row) {
        echo $row['nameCol1'] . '<br>';
        echo $row['nameCol2'] . '<br>';
      }

### Insert Data

  - you have two method to insert INSERT() & INSERTCol()
  - `INSERT()`

    - this function to insert all Columns

      - you don't need type name Column

              //Data in Table users
              |---------------------------------|
              | id | name | username | password |

      - INSERT to All Columns :

            $DB->table('users')->INSERT([1, 'anyName', 'username', 'Password'])->run();

  - `INSERTCol()`

    - Use this Method if you don't need insert Columns NULL or id is AUTO_INCREMENT()

           $DB->table('users')->INSERTCol(['name', 'username'], ['value name', 'value username'])->run();
  
### Migration Data Table

+ This Option is Beta I use it 
* Go in vendor/i74ifa/dbsystem/Migration/Migrate.php

