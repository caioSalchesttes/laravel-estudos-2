<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

abstract class NetAuthController
{
    protected function getUserAttributes($ewc_ip, $ewc_port, $mu_ip_addr, $token): array
    {
        $url         = sprintf('https://%s:%s/get_vsa_xml.php', $ewc_ip, $ewc_port);
        $queryString = Crypt::encryptString("mu_ip_addr=$mu_ip_addr,token=$token");

        try {
            $response = Http::get($url, [
                'query' => $queryString
            ]);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        return $response->json();
    }

    protected function getLogin($ewc_ip, $ewc_port, $mu_ip_addr, $token): array
    {
        $url = sprintf('https://%s:%s/approval.php', $ewc_ip, $ewc_port);
        $queryString = Crypt::encryptString($this->make_query_string($token, $mu_ip_addr, null, null, null, ","));

        try {
            $response = Http::get($url, [
                'param' => $queryString
            ]);

            return $response->json();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    protected function make_query_string(
        $token,
        $mu_ip_addr,
        $userid,
        $assigned_role,
        $max_duration,
        $separator
    ) {
        $q_str = "token=".$token;
        if (!empty($mu_ip_addr)) {
            $q_str = $q_str.$separator."mu_ip_addr=".$mu_ip_addr;
        }
        if (!empty($userid)) {
            $q_str = $q_str.$separator."username=".$userid;
        }
        if (!empty($assigned_role)) {
            $q_str = $q_str.$separator."filter=".$assigned_role;
        }
        if (!empty($max_duration)) {
            $q_str = $q_str.$separator."opt27=".$max_duration;
        }
        return $q_str;
    }
}
