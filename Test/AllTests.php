<?php

$PHP_LIBS_DIR = '/opt/lampp/lib/php';
$TEST_DIR = dirname(__FILE__);
$PROJECT_DIR = dirname(__FILE__).'/..';

require_once $PHP_LIBS_DIR. '/PHPUnit/Framework.php';

require_once $TEST_DIR. '/Model/entity/PageEntityTest.php';
require_once $TEST_DIR. '/Model/dao/EntityManagerTest.php';

class AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite();
        $suite->addTestSuite('PageEntityTest');
        $suite->addTestSuite('EntityManagerTest');

        return $suite;
    }
}

