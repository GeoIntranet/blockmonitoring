<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PingController extends Controller
{
    public function ping()
    {
        $ips = [
            'free' => ['192.168.1.5'],
            'routeur' => '192.168.1.5',
            'fail' => '192.168.1.80',
            'zebra-FLM' => '192.168.1.145',
            'etiquetteuse- 1er étage' => '192.168.1.149',
        ];

       $result=[];
        foreach ($ips as $nom => $ip) $result[$nom] = $this->makePing($ip);

        return view('ping',[
            'result' => $result
        ]);

    }

    public function makePing($ip)
    {
        $ping = exec("ping -n 2 $ip", $output, $status);

        if(isset($output[8])){
            return ['online'];
        }
        else{
            return ['offline'];
        }
    }
}
