<?php
$location = "localhost";
$username = "root";
$password = "i001254s44";
$db = "names";

$conn = connect_to_database($location, $username, $password, $db);

$insert_statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($insert_statement, "INSERT INTO name (id, name) VALUES (null, ?)");

$file_containing_names = "names.txt";
$file = fopen($file_containing_names, "r") or die("Unable to open file!");

insert_names_from_file_into_db_with_statement($file, $insert_statement);

function insert_names_from_file_into_db_with_statement($file, $insert_statement) {
    while (not_at_end_of_file($file)) { 
        $name = get_next_line_of_file($file);
        insert_name_into_db_with_statement($name, $insert_statement);
    }
}

function connect_to_database($location, $username, $password, $db) {
    $conn = mysqli_connect($location, $username, $password, $db);
    check_mysql_connection($conn);
    return $conn;
}

function get_next_line_of_file($file) { return trim(fgets($file)); }

function check_mysql_connection($conn) {
    if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
}

function insert_name_into_db_with_statement($name, $insert_statement) {
    mysqli_stmt_bind_param($insert_statement, "s", $name);
    mysqli_stmt_execute($insert_statement);
}

function not_at_end_of_file($file) { return !feof($file); }

fclose($file);
mysqli_close($conn);
?>
