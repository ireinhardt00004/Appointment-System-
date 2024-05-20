@echo off

rem Change directory to your Laravel project directory
cd "D:\project system\Offline System\app-depedsys"
echo Opening http://127.0.0.1:8000 in your default web browser...
start "chrome" "http://127.0.0.1:8000"

start Npm_Run_dev.bat "D:\project system\Offline System\app-depedsys"
rem Start PHP Artisan Serve
echo Starting PHP Artisan Serve...
php artisan serve


