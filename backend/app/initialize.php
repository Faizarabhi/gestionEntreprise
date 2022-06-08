<?php
// Load Config
require_once 'config/config.php';
// Load Helpers
require_once "../vendor/autoload.php";
require_once "helpers/index.php";

// Autoload Core Libraries
spl_autoload_register(function ($className) {
  require_once __DIR__."/libraries/$className.php";
});


