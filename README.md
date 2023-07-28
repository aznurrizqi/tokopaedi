<p align="center">
    <h1 align="center">Tokopaedi</h1>
    <h4 align="center">Aplikasi dikembangkan menggunakan PHP Framework YII2</h4>
    <br>
</p>

INSTALLATION STEP
-------------------
1. Clone repository.
2. Run ```composer update``` in root project directory.
3. Export database file from ```./db``` directory.
4. Change database configuration in ```common/config/main-local.php```.
5. Access backend page using url ```http://localhost/tokopaedi/backend/web```.
6. Login using ```user:zidan pass:12345678```.


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
db
    database.sql         contains database file
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
