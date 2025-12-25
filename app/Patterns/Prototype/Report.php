<?php

namespace App\Patterns\Prototype;

class Report implements ReportPrototype
{
    public string $title;
    public array $filters;
    public array $columns;
    public bool $includeCharts;
    public ReportConfig $config; // Object property - needs deep cloning!

    public function __construct()
    {
        $this->filters = [];
        $this->columns = [];
        $this->includeCharts = false;
        $this->config = new ReportConfig();
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function addFilter(string $filter): void
    {
        $this->filters[] = $filter;
    }

    public function addColumn(string $column): void
    {
        $this->columns[] = $column;
    }

    public function enableCharts(): void
    {
        $this->includeCharts = true;
    }

    public function __clone()
    {
        // CRITICAL: Deep clone the object property
        // Without this, both clones would share the same ReportConfig instance!
        $this->config = clone $this->config;

        // Arrays are already deep-copied, but you can reset them if needed
        $this->filters = array_values($this->filters);
        $this->columns = array_values($this->columns);
    }
}
