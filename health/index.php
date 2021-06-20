<?php

include '../admin/includes/dbconfig.php';

if($con){
    echo "DB Health: OK";
}else{
    echo "DB Health: None";
}

function get_server_memory_usage(){

    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]/$mem[1]*100;

    return $memory_usage;
}

echo "<br> Memory Usage: ".get_server_memory_usage();

?>