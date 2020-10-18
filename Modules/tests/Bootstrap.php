<?php declare(strict_types=1);

\ini_set('memory_limit', '2048M');
\ini_set('display_errors', 1);
\ini_set('display_startup_errors', 1);
\error_reporting(\E_ALL);

if (\is_file('vendor/autoload.php')) {
    include_once 'vendor/autoload.php';
} elseif (\is_file('../../vendor/autoload.php')) {
    include_once '../../vendor/autoload.php';
}

require_once __DIR__ . '/Autoloader.php';

use phpOMS\DataStorage\Database\DatabasePool;
use phpOMS\DataStorage\Database\DataMapperAbstract;
use phpOMS\DataStorage\Session\HttpSession;

$CONFIG = [
    'db'       => [
        'core' => [
            'masters' => [
                'admin'  => [
                    'db'       => 'mysql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '3306', /* db host port */
                    'login'    => 'root', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'insert'  => [
                    'db'       => 'mysql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '3306', /* db host port */
                    'login'    => 'root', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'select'  => [
                    'db'       => 'mysql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '3306', /* db host port */
                    'login'    => 'root', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'update'  => [
                    'db'       => 'mysql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '3306', /* db host port */
                    'login'    => 'root', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'delete'  => [
                    'db'       => 'mysql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '3306', /* db host port */
                    'login'    => 'root', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'schema'  => [
                    'db'       => 'mysql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '3306', /* db host port */
                    'login'    => 'root', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
            ],
            'postgresql' => [
                'admin'  => [
                    'db'       => 'pgsql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'prefix'   => 'om_', /* db table prefix */
                    'weight'   => 1000, /* db table prefix */
                ],
                'insert'  => [
                    'db'       => 'pgsql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'prefix'   => 'om_', /* db table prefix */
                    'weight'   => 1000, /* db table prefix */
                ],
                'select'  => [
                    'db'       => 'pgsql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'prefix'   => 'om_', /* db table prefix */
                    'weight'   => 1000, /* db table prefix */
                ],
                'update'  => [
                    'db'       => 'pgsql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'prefix'   => 'om_', /* db table prefix */
                    'weight'   => 1000, /* db table prefix */
                ],
                'delete'  => [
                    'db'       => 'pgsql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'prefix'   => 'om_', /* db table prefix */
                    'weight'   => 1000, /* db table prefix */
                ],
                'schema'  => [
                    'db'       => 'pgsql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'prefix'   => 'om_', /* db table prefix */
                    'weight'   => 1000, /* db table prefix */
                ],
            ],
            'sqlite' => [
                'admin'  => [
                    'db'       => 'sqlite', /* db type */
                    'database' => __DIR__ . '/test.sqlite', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'insert'  => [
                    'db'       => 'sqlite', /* db type */
                    'database' => __DIR__ . '/test.sqlite', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'select'  => [
                    'db'       => 'sqlite', /* db type */
                    'database' => __DIR__ . '/test.sqlite', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'update'  => [
                    'db'       => 'sqlite', /* db type */
                    'database' => __DIR__ . '/test.sqlite', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'delete'  => [
                    'db'       => 'sqlite', /* db type */
                    'database' => __DIR__ . '/test.sqlite', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'schema'  => [
                    'db'       => 'sqlite', /* db type */
                    'database' => __DIR__ . '/test.sqlite', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
            ],
            'mssql' => [
                'admin'  => [
                    'db'       => 'mssql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'insert'  => [
                    'db'       => 'mssql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'select'  => [
                    'db'       => 'mssql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'update'  => [
                    'db'       => 'mssql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'delete'  => [
                    'db'       => 'mssql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
                'schema'  => [
                    'db'       => 'mssql', /* db type */
                    'host'     => '127.0.0.1', /* db host address */
                    'port'     => '5432', /* db host port */
                    'login'    => 'postgres', /* db login name */
                    'password' => 'root', /* db login password */
                    'database' => 'oms', /* db name */
                    'weight'   => 1000, /* db table prefix */
                ],
            ],
        ],
    ],
    'cache' => [
        'redis' => [
            'db'   => 1,
            'host' => '127.0.0.1',
            'port' => 6379,
        ],
        'memcached' => [
            'host' => '127.0.0.1',
            'port' => 11211,
        ],
    ],
    'mail' => [
        'imap' => [
            'host'     => '127.0.0.1',
            'port'     => 143,
            'ssl'      => false,
            'user'     => 'test',
            'password' => '123456',
        ],
        'pop3' => [
            'host'     => '127.0.0.1',
            'port'     => 25,
            'ssl'      => false,
            'user'     => 'test',
            'password' => '123456',
        ],
    ],
    'log'      => [
        'file' => [
            'path' => __DIR__ . '/Logs',
        ],
    ],
    'page'     => [
        'root'  => '/',
        'https' => false,
    ],
    'socket'   => [
        'master' => [
            'host'  => '127.0.0.1',
            'limit' => 300,
            'port'  => 4310,
        ],
    ],
    'language' => [
        'en',
    ],
    'apis'     => [
    ],
];

// Reset database
$db = new \PDO($CONFIG['db']['core']['masters']['admin']['db'] . ':host=' .
    $CONFIG['db']['core']['masters']['admin']['host'],
    $CONFIG['db']['core']['masters']['admin']['login'],
    $CONFIG['db']['core']['masters']['admin']['password']
);
$db->exec('DROP DATABASE IF EXISTS ' . $CONFIG['db']['core']['masters']['admin']['database']);
$db->exec('CREATE DATABASE IF NOT EXISTS ' . $CONFIG['db']['core']['masters']['admin']['database']);
$db = null;

$db = new \PDO($CONFIG['db']['core']['postgresql']['admin']['db'] . ':host=' .
    $CONFIG['db']['core']['postgresql']['admin']['host'],
    $CONFIG['db']['core']['postgresql']['admin']['login'],
    $CONFIG['db']['core']['postgresql']['admin']['password']
);
$db->exec('DROP DATABASE ' . $CONFIG['db']['core']['postgresql']['admin']['database']);
$db->exec('CREATE DATABASE ' . $CONFIG['db']['core']['postgresql']['admin']['database']);
$db = null;

$httpSession        = new HttpSession();
$GLOBALS['session'] = $httpSession;

$GLOBALS['dbpool'] = new DatabasePool();
$GLOBALS['dbpool']->create('admin', $CONFIG['db']['core']['masters']['admin']);
$GLOBALS['dbpool']->create('select', $CONFIG['db']['core']['masters']['select']);
$GLOBALS['dbpool']->create('update', $CONFIG['db']['core']['masters']['update']);
$GLOBALS['dbpool']->create('delete', $CONFIG['db']['core']['masters']['delete']);
$GLOBALS['dbpool']->create('insert', $CONFIG['db']['core']['masters']['insert']);
$GLOBALS['dbpool']->create('schema', $CONFIG['db']['core']['masters']['schema']);

DataMapperAbstract::setConnection($GLOBALS['dbpool']->get());
