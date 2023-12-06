<?php
function RegisterCustomer($name, $password, $confPassword, $mobile, $pin, $state, $city, $street, $door, $validatePass=true){
// Validate Password: Must contain 1 Uppercase, 1
if($validatePass){
$uppercase = preg_match('@[A-Z]@', $password); $lowercase =
preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password); $specialChars =
preg_match('@[^\w]@',
$password);
if(!$uppercase || !$lowercase || !$number ||
!$specialChars || strlen($password) < 8) {
echo 'Password should be at least 8
characters in length and should include at least one upper
case letter, one number, and one special character.';
}
else{
echo 'Strong password.';
}
}
if ($password != $confPassword){
exit("Error: Password and Confirm Password
does not match.");
}
$query = "INSERT INTO customer (cus_name,
cus_mob, cus_pass, pin, state, city, street, door) VALUES (?,
?, ?, ?, ?, ?, ?, ?)";
$this->resultObj =
$this->connection->prepare($query);
$this->resultObj->bind_param("sisissss", $name,
$mobile, sha1($password), $pin, $state, $city, $street,
$door); #encrypted password
$this->resultObj->execute();
if ($this->resultObj->error){
echo "Error: ";
exit($this->resultObj->error);
}
exit("Registered Successfully!");
}
function __destruct(){
$this->connection->close();
$this->resultObj->close();
echo " Connection closed".PHP_EOL;
}
?>