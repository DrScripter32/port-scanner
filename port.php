<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', -1);

$host = $_GET['url'];
$ports = array(21, 9999,19638,8443,10000,5432,8087,4643,8080,3306,22,23,43,53,70,2222,79,25,2096, 80,1433, 2082,81, 2083,2087,2095,990,110,465,993, 110,143,194,389,119,143, 443, 587, 2525, 3306);

foreach ($ports as $port)
{
    $connection = @fsockopen($host, $port, $errno, $errstr, 2);

    if (is_resource($connection))
    {
        echo '<h2>' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h2>' . "\n";

        fclose($connection);
    }
    else
    {
        echo '<h2>' . $host . ':' . $port . ' is not responding.</h2>' . "\n";
    }
}
