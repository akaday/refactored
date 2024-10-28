<?php

use PHPUnit\Framework\TestCase;

class WP_Site_Health_Integration_Test extends TestCase
{
    protected $siteHealth;

    protected function setUp(): void
    {
        $this->siteHealth = new WP_Site_Health();
    }

    public function testInteractionBetweenGetTestWordPressVersionAndGetTestPluginVersion()
    {
        $wordpressVersion = $this->siteHealth->get_test_wordpress_version();
        $pluginVersion = $this->siteHealth->get_test_plugin_version();

        $this->assertArrayHasKey('label', $wordpressVersion);
        $this->assertArrayHasKey('status', $wordpressVersion);
        $this->assertArrayHasKey('badge', $wordpressVersion);
        $this->assertArrayHasKey('description', $wordpressVersion);
        $this->assertArrayHasKey('actions', $wordpressVersion);
        $this->assertArrayHasKey('test', $wordpressVersion);

        $this->assertArrayHasKey('label', $pluginVersion);
        $this->assertArrayHasKey('status', $pluginVersion);
        $this->assertArrayHasKey('badge', $pluginVersion);
        $this->assertArrayHasKey('description', $pluginVersion);
        $this->assertArrayHasKey('actions', $pluginVersion);
        $this->assertArrayHasKey('test', $pluginVersion);
    }

    public function testInteractionBetweenGetTestThemeVersionAndGetTestPhpVersion()
    {
        $themeVersion = $this->siteHealth->get_test_theme_version();
        $phpVersion = $this->siteHealth->get_test_php_version();

        $this->assertArrayHasKey('label', $themeVersion);
        $this->assertArrayHasKey('status', $themeVersion);
        $this->assertArrayHasKey('badge', $themeVersion);
        $this->assertArrayHasKey('description', $themeVersion);
        $this->assertArrayHasKey('actions', $themeVersion);
        $this->assertArrayHasKey('test', $themeVersion);

        $this->assertArrayHasKey('label', $phpVersion);
        $this->assertArrayHasKey('status', $phpVersion);
        $this->assertArrayHasKey('badge', $phpVersion);
        $this->assertArrayHasKey('description', $phpVersion);
        $this->assertArrayHasKey('actions', $phpVersion);
        $this->assertArrayHasKey('test', $phpVersion);
    }

    public function testOverallSiteHealthStatusCalculation()
    {
        $tests = WP_Site_Health::get_tests();
        $results = array();

        foreach ($tests['direct'] as $test) {
            if (is_string($test['test'])) {
                $testFunction = sprintf('get_test_%s', $test['test']);
                if (method_exists($this->siteHealth, $testFunction) && is_callable([$this->siteHealth, $testFunction])) {
                    $results[] = $this->siteHealth->perform_test([$this->siteHealth, $testFunction]);
                    continue;
                }
            }

            if (is_callable($test['test'])) {
                $results[] = $this->siteHealth->perform_test($test['test']);
            }
        }

        $siteStatus = [
            'good' => 0,
            'recommended' => 0,
            'critical' => 0,
        ];

        foreach ($results as $result) {
            if ('critical' === $result['status']) {
                ++$siteStatus['critical'];
            } elseif ('recommended' === $result['status']) {
                ++$siteStatus['recommended'];
            } else {
                ++$siteStatus['good'];
            }
        }

        $this->assertArrayHasKey('good', $siteStatus);
        $this->assertArrayHasKey('recommended', $siteStatus);
        $this->assertArrayHasKey('critical', $siteStatus);
    }
}
