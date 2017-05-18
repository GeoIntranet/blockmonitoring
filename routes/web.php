<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PingController@ping')->name('ping');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pinger', 'PingController@ping')->name('ping');

Route::get('/ping', function () {
    $ip = '192.168.1.5';
    function pingAddress($ip) {
        $ping = exec("ping -n 2 $ip", $output, $status);
        if (strpos($output[2], 'unreachable') !== FALSE) {
            dump($output);
            return '<span style="color:#f00;">OFFLINE</span>';
        } else {
            dump($output);
            return '<span style="color:green;">ONLINE</span>';
        }
    }
    echo pingAddress($ip);

    //
    //function run($command) {
    //    $command .= ' 2>&1';
    //    $handle = popen($command, 'r');
    //    $log = '';
    //
    //    while (!feof($handle)) {
    //        $line = fread($handle, 1024);
    //        $log .= $line;
    //    }
    //
    //    pclose($handle);
    //    return $log;
    //}
    //
    //echo run('ping 192.168.1.110');
    return view('welcome');
});