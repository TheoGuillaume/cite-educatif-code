<?php

if (!function_exists('warning_alert')) {
    function warning_alert()
    {
        $alert = "";
        if (session()->has('warning')) :
            $alert = "<div class='alert alert-danger' role='alert'>" . session('warning') . " </div>";
        endif;
        return $alert;
    }
}
