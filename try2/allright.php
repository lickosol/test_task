
<?php
require "blocks/header.php";


?>



<h1>вы прошли дальше</h1>
<?php
$user = $_POST['user'];
$email = $_POST['email'];
$message = $_POST['message'];


$user = htmlspecialchars($user);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);

$user = urldecode($user);
$email = urldecode($email);
$message = urldecode($message);

$user = trim($user);
$email = trim($email);
$message = trim($message);

$path_file = $_FILES["file"]["tmp_name"];
$name = $_FILES['file']['name'];
$type_of_file = pathinfo($name, PATHINFO_EXTENSION);
$allowed = array('png', 'jpg', '');

if(strlen($user) == 0 || strlen($email) == 0 || strlen($message) == 0) {
    $_SESSION['error_message'] = 'заполните все обязательные поля';


}
else if(strpos($email, "@") == false){
    $_SESSION['error_message'] = 'укажите электронную почту';

}
else if(!in_array($type_of_file, $allowed)){
    $_SESSION['error_file'] = 'Недопустимое разрешение файла';
    echo 'Недопустимое разрешение файла';
}
else{
    $_SESSION['success'] = "отправлено";
    $f = fopen("$user.txt", "w");
    fwrite($f, $user. "\t".$email. "\t".$message. "\t".$path_file);
    fclose($f);
    echo "Ваши данные сохранены";


}

require "blocks/footer.php";

?>