Dadblv2 App
-----------

The dadblvd app. An app to help aspiring men and
current fathers how to be good parents.

The app uses:
- Sensio Labs' Twig
- Silex
- PHP ActiveRecord
- Bootstrap
- Migrations: Ruckus' Ruckusing-migrations
- Monolog
- Silex (Symfony) Web Profiler & Debugger
- Tons of other Symfony libraries
- Ruckus & Ruckusing for Active Record and DB Migrations
- Twig for HTML
- Angular JS
- DART
- BDD: Behat, Mink, Gherkin, and Selenium
- PHPUnit for unit tests


Instructions
------------

1. Setup DB by crating it using the docs/*.schema.sql

2. Setup Vendor libraries: "composer update --dev"

3. Make sure that the composer's autoload_namespaces.php are in place

4. Run Ruckusing DB Migrations: "php ruckus.php db:migrate"
   ( Make sure the DB settings are placed in ruckusing.conf.php )
   
   
BDD Execution
-------------

From the public dir execute: php ./bin/behat -c behat.yaml

