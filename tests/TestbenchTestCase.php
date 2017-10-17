<?php

namespace :uc:vendor\:uc:package\Tests;

use Orchestra\Testbench\TestCase as Testbench;

abstract class TestbenchTestCase extends Testbench
{
    /**
     * Setup before each test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Tear down after each test.
     * @return  void
     */
    public function tearDown()
    {
       parent::tearDown();
    }

    /**
     * Tell Testbench to use this package.
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [':uc:vendor\:uc:package\:uc:packageServiceProvider'];
    }
}
