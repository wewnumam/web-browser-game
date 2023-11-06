# Match Game

## Localhost Installation
1. Install XAMPP 7.4.8 or higher
2. Copy this folder to `YOURINSTALLLOCATION/xampp/htdocs/`
3. Start Apache & MySQL in XAMPP Control Panel
4. Open http://localhost/phpmyadmin/server_sql.php, copy query text from [match_game.sql](./match_game.sql) to query box, then click Go
5. Done.
`
## Table Structure
### Record
\# | name | type | extra
--- | --- | --- | --- 
1 | id | int(11) | PRIMARY KEY, AUTO_INCREMENT 
2 | username | varchar(12) | NOT NULL
3 | time | int(11) | NOT NULL
4 | flip | int(11) | NOT NULL
5 | created_at | bigint(13) | NOT NULL

## API Spec
### Create Record
#### Request:
- Method: POST
- Endpoint: `system/create.php`
- Header:
  - Content Type: application/x-www-form-urlencoded
- Body:
```json
{
    "username": "string",
    "time": "integer",
    "flip": "integer",
    "created_at": "long, unixtime"
}
```
#### Response:
```json
{
  "status": "integer, status code",
  "message": "string"
}
```
