[![Build Status](https://travis-ci.org/rogatec/zf3-tutorial.svg?branch=master)](https://travis-ci.org/rogatec/zf3-tutorial)

# Zend Framework 3 Tutorial

- Documentation can be found here: https://zendframework.github.io/tutorials

## I'm using this project...

- to get to know zf2 & zf3 styles (I only used ZF 1 and other php frameworks)
- to test `multi db` adapters with ZF3
- how phpunit works with ZF3
- for best practise in creating controller plugin's / factories ..
- to include db migration scripts (like [liquibase](liquibase.org/quickstart.html)/[flyway](https://flywaydb.org/getstarted/)/[php-dbmigration by newcron](https://github.com/newcron/dbmigration))
- to test a proper communication between a ZF 1 project and a newly developing project based on ZF 3


## Installation

1. Fork / clone it and just use composer install
2. edit the `$ROOT_DIR/config/autoload/global.php` for database connection
3. create a `local.php` in the same folder for sensitive data.
