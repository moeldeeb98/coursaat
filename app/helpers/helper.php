<?php

function is_active($routeName){
    return ( request()->segment(2) !== null && request()->segment(2) == $routeName ) ? 'active' : '';
}
