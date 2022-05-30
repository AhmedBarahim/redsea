<?php

namespace App\Helpers;

class MacAddress  {
    public static function get() {
        // Mac Config
        $ip =  $_SERVER['REMOTE_ADDR'];
        $mac_address = trim(shell_exec("arp -n " . $ip . "| cut -f 4 -d ' ' "));
        return strtoupper($mac_address);

        // Windows Config
    }
}

?>
