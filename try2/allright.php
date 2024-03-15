
<?php
require "blocks/header.php";

function pic()
{
    $target_dir = "uploads/"; // Папка, куда будет сохранен файл
    $target_file = $target_dir . basename($_FILES["file"]["name"]); // Полный путь к файлу на сервере
    // Проверяем тип файла
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
        $_SESSION["error_file"] = "Только JPG, JPEG, PNG файлы разрешены.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "Файл успешно загружен.";
        } else {
            echo "Произошла ошибка при загрузке файла.";
        }
    }
}

?>



<h1>вы прошли дальше</h1>
<?php
$user = $_POST["user"];
$email = $_POST["email"];
$message = $_POST["message"];


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
$name = $_FILES["file"]["name"];



if(strlen($user) == 0 || strlen($email) == 0 || strlen($message) == 0) {
    $_SESSION["error_message"] = "заполните все обязательные поля";


}
else if(strpos($email, "@") == false){
    $_SESSION["error_message"] = "укажите электронную почту";

}

else{

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
        $target_dir = "uploads/"; // Папка, куда будет сохранен файл

        if(is_dir($target_dir)) {
            pic();

        } else {
            mkdir("uploads/");
            pic();

        }

    }

    $_SESSION['success'] = "отправлено";
    $f = fopen("$user.txt", "w");
    fwrite($f, $user. "\t".$email. "\t".$message. "\t".$_SERVER["DOCUMENT_ROOT"]."/".
        "/"."uploads/".basename($_FILES["file"]["name"]));
    fclose($f);
    echo "Ваши данные сохранены";



}

require "blocks/footer.php";

?>