<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function is_login($is_true = false)
{
    $CI =& get_instance();
    if (!@$CI->session->is_login && !$is_true) {
        redirect('auth/');
    } elseif ($CI->session->is_login && $is_true) {
        redirect('dashboard');
    }

    return;
}

function is_level($level)
{
    $CI =& get_instance();
    if ($CI->session->level == $level) {
        return true;
    }

    return false;
}

function redirect_if_level_not($level)
{
    $CI =& get_instance();
    $is_match = false;
    if (is_array($level)) {
        if (in_array($CI->session->level, $level)) {
            $is_match = true;
        }
    } else {
        $is_match = is_level($level);
    }

    if (!$is_match) {
        return redirect('dashboard/');
    }

    return;
}
