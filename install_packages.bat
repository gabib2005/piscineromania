@echo off
cd /d C:\laragon\www\piscineromania
composer require laravel/breeze laravel/socialite laravel/cashier maatwebsite/excel intervention/image spatie/laravel-permission spatie/laravel-sluggable barryvdh/laravel-dompdf guzzlehttp/guzzle --no-interaction
echo DONE
