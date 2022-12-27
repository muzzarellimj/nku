# Foober

Foober is a simple PHP web application and emulation of Uber meant to serve as the final project for Server-Side Development (ASE 230) at Northern Kentucky University in Fall '22.

## Installation Instructions

Foober can be cloned to a local device via `https://github.com/muzzarellimj/foober.git` and database setup can be completed via import into PhpMyAdmin with the provided init script - [database-structure.sql](/asset/init/database-structure.sql). This database setup script will create a new database `foober` should it not exist and drop and create tables as needed to structure and populate the database. A note: FK constraints sometimes interferes with database setup and the database may need to be manually removed. All configurable fields are stored in [conf.php](/src/conf.php) to include the application name and database host options.

There are three test accounts provided in the database setup script: (1) rider@foober.com, a standard user with ride request capabilities; (2) driver@foober.com, a standard user with ride accept capabilities; and (3) admin@foober.com, an elevated user with all above capabilities as well as moderation capabilities via an administrative dashboard. All accounts share a common password: *password*.