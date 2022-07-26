<?php

return [
  'url' => env('SYBASE_HOST','localhost'),
  'database' => env('SYBASE__DATABASE', 'db'),
  'username' => env('SYBASE__USERNAME', 'dba'),
  'password' => env('SYBASE_PASSWORD', ''),
];
