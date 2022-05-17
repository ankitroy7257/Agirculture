<?php
$con = mysqli_connect("localhost", "wt", "wt", "smartagri");
$uname = $_REQUEST['username'];
$pwd = md5($_REQUEST['password']);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = "SELECT * FROM user WHERE uname='$uname'";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $dbpwd = $row['pwd'];
    $uname = $row['uname'];
    $name = $row['name'];
}
if ($pwd == $dbpwd) {
    header('index.html');
} else {
    header("Account.html");
}