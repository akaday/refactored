<?php

use PHPUnit\Framework\TestCase;

class CoreUpgraderTest extends TestCase
{
    protected $coreUpgrader;

    protected function setUp(): void
    {
        $this->coreUpgrader = new Core_Upgrader();
    }

    public function testUpgradeStrings()
    {
        $this->coreUpgrader->upgrade_strings();
        $this->assertArrayHasKey('up_to_date', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('locked', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('no_package', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('downloading_package', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('unpack_package', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('copy_failed', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('copy_failed_space', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('start_rollback', $this->coreUpgrader->strings);
        $this->assertArrayHasKey('rollback_was_required', $this->coreUpgrader->strings);
    }

    public function testUpgrade()
    {
        $current = (object) [
            'response' => 'latest',
            'packages' => (object) [
                'partial' => 'partial_package_url',
                'new_bundled' => 'new_bundled_package_url',
                'no_content' => 'no_content_package_url',
                'full' => 'full_package_url',
                'rollback' => 'rollback_package_url',
            ],
            'partial_version' => '5.8.1',
            'new_bundled' => '5.9',
            'version' => '5.8.2',
        ];

        $result = $this->coreUpgrader->upgrade($current);
        $this->assertInstanceOf(WP_Error::class, $result);
        $this->assertEquals('up_to_date', $result->get_error_code());
    }

    public function testShouldUpdateToVersion()
    {
        $this->assertTrue(Core_Upgrader::should_update_to_version('5.8.2'));
        $this->assertFalse(Core_Upgrader::should_update_to_version('5.8.1'));
    }

    public function testCheckFiles()
    {
        $this->assertTrue($this->coreUpgrader->check_files());
    }
}
