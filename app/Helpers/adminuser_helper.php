<?php

if (!function_exists('adminuser')) {
    function adminuser()
    {
        return session('admin');
    }
}
