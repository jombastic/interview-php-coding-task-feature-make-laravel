<?php

use App\Patterns\Prototype\Report;

$baseReport = new Report();
$baseReport->addColumn('date');
$baseReport->addColumn('user_id');
$baseReport->config->theme = 'dark'; // Modify config

$dailyReport = clone $baseReport;
$dailyReport->setTitle('Daily Active Users');
$dailyReport->config->theme = 'light'; // Change theme

// Without __clone(), this would also change $dailyReport->config->theme!
// With proper __clone(), each report has its own independent config
echo $baseReport->config->theme;  // 'dark'
echo $dailyReport->config->theme; // 'light' - independent!
