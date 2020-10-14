vendor/propel/propel/bin/propel reverse "mysql:host=mysql;dbname=l6elite_core;user=root;password=root"
php enableIdentifierQuoting.php
vendor/propel/propel/bin/propel model:build --schema-dir=$(pwd)/generated-reversed-database --output-dir=$(pwd)/api/php_models
composer dumpautoload
