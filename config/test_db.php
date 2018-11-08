<?php
$defaults = require __DIR__ . '/defaults.php';
// test database! Important not to run tests on production or development databases
$defaults['components']['db']['dsn'] = 'mysql:host=localhost;dbname=yii2_basic_tests';

return $defaults;
