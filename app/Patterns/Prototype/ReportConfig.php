<?php

namespace App\Patterns\Prototype;

class ReportConfig
{
    public array $settings;
    public string $theme;

    public function __construct()
    {
        $this->settings = [];
        $this->theme = 'default';
    }
}
