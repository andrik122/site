<?php
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));
$color = stripslashes(htmlspecialchars($_POST['color']));
$count = stripslashes(htmlspecialchars($_POST['count']));

if($GET['product_id']) {
    $product_id = $_GET['product_id'];
}else{
    $product_id = $_POST['product_id'];
}

if(empty($name) || empty($phone)){
    echo '<h1 style="color:red;">Заповніть всі поля</h1>';
    echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'"</meta>';
}
else{
    $subject = 'jorna.6-gog.site'; // Заголовок листа
    $addressat = "admin@gmail.com";  // Ваша електронна адреса
    $success_url = 'order.php?name='.$_POST['name'].'&phone='.$_POST['phone'].'&time='.$_POST['Час_дзвінка'].'';

    $message = "ПІБ: {$name}\nКонтактний телефон: {$phone}\nТовар: {$product_id}\nКолір: {$color}\nКількість: {$count}";
    $verify = mail($addressat,$subject,$message,"Content-type:text/plain;charset=utf-8\r\n");
    if ($verify == 'true'){
        header('Location: '.$success_url);
        echo '<h1 style="color:green;">Вітаємо! Ваше замовлення прийнято</h1>';
        exit;
    }
    else
    {
        echo '<h1 style="color:red;">Виникла помилка</h1>';
    }
}
?>