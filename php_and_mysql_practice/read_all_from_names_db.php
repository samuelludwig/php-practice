<?php
$location = "localhost";
$username = "root";
$password = "i001254s44";
$db = "names";

$conn = connect_to_database($location, $username, $password, $db);

$result = mysqli_query($conn, "SELECT name FROM name");

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

write_query_result($data[0]);

function write_query_result($result) {
    foreach($result as $item) { echo "Returned rows are: " . $item . "\n"; }
}

function check_mysql_connection($conn) {
    if (!$conn) { die("connection failed: " . mysqli_connect_error()); }
}

function connect_to_database($location, $username, $password, $db) {
    $conn = mysqli_connect($location, $username, $password, $db);
    check_mysql_connection($conn);
    return $conn;
}

mysqli_close($conn);
?>
