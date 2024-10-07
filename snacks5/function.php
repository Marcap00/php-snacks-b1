<?php
function isPalindrome($text)
{
    strrev($text);
    if ($text === strrev($text)) {
        return true;
    } else {
        return false;
    }
}
