

<?php
require "blocks/header.php";

?>

<div class="container mt-2"></div>
<h> Заполните форму! </h><br>

<h> * - поля, обязательные для заполнения!</h><br>


<form action="allright.php" method="post" enctype="multipart/form-data" >
    <input type="text" name="user" placeholder="имя пользователя *" class="form-control" required><br>
    <input type="email" name="email" placeholder="введите email *" class="form-control" required><br>
    <input type="text" name="message" placeholder="сообщение *" class="form-control" required><br>
    <input type="file" name="file">
    <div class="text-danger">
        <?=$_SESSION['error_file']?></div><br>
    <button type="submit" >Отправить форму</button>

</form>

<?php
require "blocks/footer.php";
?>