<?php
function validate($arr, $val)
{
    if (!isset($arr[$val])) {
        return false;
    }
    return htmlspecialchars(trim(stripslashes($arr[$val])));
}

function validateEmail($arr, $val)
{
    $email = validate($arr, $val);
    if (!$email)
        return false;
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}