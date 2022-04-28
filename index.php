<?php
    require "db.php";
    if (isset($_POST['send'])) {
        if (trim($_POST['name']) == "" || trim($_POST['message']) == "" || trim($_POST['subject'])) 
            {
            $err = "Заполните все поля";
        } else {
    
    $koments = R::dispense('koments');
    $koments->name = $_POST['name'];
    $koments->message = $_POST['message'];
    $koments->date = date("Y.m.d h:m:s");
    R::store($koments);
    header('location: /');
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <form action="" method="post" class="form">
        <input type="text" name="name" placeholder="Имя"><br><br>
        <textarea type="text" name="message" placeholder="Сообщение"></textarea>
        <div style="clear:both"><br><br></div>
        <input type="submit" name="send">
        <?= '<div style="color": red">' .$err. '</div>' ?>

    </form>
    <?php $komen = mysqli_query($con, "SELECT * FROM `koments` ORDER BY `id`") ?>
    <?php while($kom = mysqli_fetch_assoc($komen)) { ?>
        <div class="koment">
            <div class="name"><?= $kom['name'] ?>
            <hr>
            <div class="message"><?= $kom['message'] ?>
            </div>
            <hr>
            
            <div class="i">
                <?= $kom['date'] ?>
                </div>
            </div>

    </div>
    <?php } ?>
</body>
</html>