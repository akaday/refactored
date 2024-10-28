<?php

use PHPUnit\Framework\TestCase;

class WP_Site_Health_Test extends TestCase
{
    protected $siteHealth;

    protected function setUp(): void
    {
        $this->siteHealth = new WP_Site_Health();
    }

    public function testGetTestWordPressVersion()
    {
        $result = $this->siteHealth->get_test_wordpress_version();
        $this->assertArrayHasKey('label', $result);
        $this->assertArrayHasKey('status', $result);
        $this->assertArrayHasKey('badge', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('actions', $result);
        $this->assertArrayHasKey('test', $result);
    }

    public function testGetTestPluginVersion()
    {
        $result = $this->siteHealth->get_test_plugin_version();
        $this->assertArrayHasKey('label', $result);
        $this->assertArrayHasKey('status', $result);
        $this->assertArrayHasKey('badge', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('actions', $result);
        $this->assertArrayHasKey('test', $result);
    }

    public function testGetTestThemeVersion()
    {
        $result = $this->siteHealth->get_test_theme_version();
        $this->assertArrayHasKey('label', $result);
        $this->assertArrayHasKey('status', $result);
        $this->assertArrayHasKey('badge', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('actions', $result);
        $this->assertArrayHasKey('test', $result);
    }

    public function testGetTestPhpVersion()
    {
        $result = $this->siteHealth->get_test_php_version();
        $this->assertArrayHasKey('label', $result);
        $this->assertArrayHasKey('status', $result);
        $this->assertArrayHasKey('badge', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('actions', $result);
        $this->assertArrayHasKey('test', $result);
    }
}
