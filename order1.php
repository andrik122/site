<?php
//***************** Страница с завершением заказа ******************
session_start();

// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    0 => array(
        'product_id' => '482',    //код товара 2 (из каталога CRM)
        'price'      => '249', //цена товара 2
        'count'      => '1',                     //количество товара 1
    ),
);

$products = urlencode(serialize($products_list));
$sender = urlencode(serialize($_SERVER));
// параметры запроса
$data = array(
    'key'             => 'token_lpcrm', //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',                         // Географическое направление заказа
    'office'          => '1',                          // Офис (id в CRM)
    'products'        => $products,                    // массив с товарами в заказе
    'bayer_name'      => $_REQUEST['name'],            // покупатель (Ф.И.О)
    'phone'           => $_REQUEST['phone'],           // телефон
    'email'           => $_REQUEST['email'],           // электронка
    'comment'         => $_REQUEST['product_name'],    // комментарий
    'delivery'        => $_REQUEST['delivery'],        // способ доставки (id в CRM)
    'delivery_adress' => $_REQUEST['delivery_adress'], // адрес доставки
    'payment'         => '',                           // вариант оплаты (id в CRM)
    'sender'          => $sender,
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'],// utm_campaign
    'additional_1'    => '',                               // Дополнительное поле 1
    'additional_2'    => '',                               // Дополнительное поле 2
    'additional_3'    => '',                               // Дополнительное поле 3
    'additional_4'    => ''                                // Дополнительное поле 4
);

// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://tiilest.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON
?>
<!DOCTYPE html>
<html lang="ru">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ВІТАЄМО! Ваше замовлення прийнято!</title>
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/style.css"> 
	<link rel="shortcut icon" href="https://6bags.space/favic.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/styles1.css">
    <link type="text/css" rel="stylesheet" href="css/style0001.css"/>
</head>
	<body>
		<div class="wrap_block_success" style="background: url(https://1bags-ua.com.ua/mob4.png); height: 4875px;">
			<div style="position: absolute; margin-top: 835px; margin-left: 54px; font-size: 25px;">
				<p style="padding-bottom: 12px; margin-left: 6px;">Бейлері Форевер</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">500грн</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">249грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 10px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold; line-height: 27px;">Стильний та дуже зручний гаманець<br>
					Кольори: Блакитний та Бордо<br> </span>
				</div>
				<section class="order_section" style="top: 7px; height: 169px; position: relative; margin: 0;">
					<form id="1" name="order_form" class="order_form" action="zakaz1.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
						<input class="input" type="text" name="name" value="Бейлері Форевер знижка" readonly>
						<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
						<button class="button">Замовити</button>
					</form>
				</section>
			</div>
			<div style="position: absolute; margin-top: 1560px; margin-left: 64px; font-size: 25px;">
				<p style="padding-bottom: 12px; margin-left:-20px;">Бейлері форевер міні</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">460грн</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">229грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 10px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold;">Зручний маленький гаманець</span>
					<Br>Кольори: Блакитний, Бордо, Червоний, Сірий, Світло-Сірий, Чорний
				</div>
				<section class="order_section" style="top: 7px; height: 169px; position: relative; margin: 0;">
						<form id="2" name="order_form" class="order_form" action="zakaz2.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
							<input class="input" type="text" name="name" value="Форевер міні знижка" readonly>
							<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
							<button class="button">Замовити</button>
						</form>
				</section>
			</div>
			<div style="position: absolute; margin-top: 2035px; margin-left: 64px; font-size: 25px;">
				<p style="padding-bottom: 134px; margin-left: 30px;">Гаманець Сімпл</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">480грн</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">239грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 2px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold;">Стильний гаманець. </br>Якість, якій можна довіритися. </br>Кольори: Рожевий, Червоний, Чорний<br></span>
				</div>
				<section class="order_section" style="top: 7px; height: 169px; position: relative; margin: 0;">
					<form id="3" name="order_form" class="order_form" action="zakaz3.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
						<input class="input" type="text" name="name" value="Гаманець Сімпл знижка" readonly>
						<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
						<button class="button">Замовити</button>
					</form>
				</section>
			</div>
			<div style="position: absolute; margin-top: 2790px; margin-left: 64px; font-size: 25px;">
				<p style="padding-bottom: 12px; margin-left: 20px;">Бейлері Італія	</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">538грн</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">269грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 10px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold;">Чоловічий гаманець Бейлері Італія,<br> Чудовий подарунок для чоловіка </span>
				</div>
				<section class="order_section" style="top: 7px; height: 169px; position: relative; margin: 0;">
						<form id="4" name="order_form" class="order_form" action="zakaz4.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
							<input class="input" type="text" name="name" value="Бейлері Італія знижка" readonly>
							<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
							<button class="button">Замовити</button>
						</form>
				</section>
			</div>
			<div style="position: absolute; margin-top: 3378px; margin-left: 64px; font-size: 25px;">
				<p style="padding-bottom: 12px; margin-left: 10px;">Рюкзак Евелін</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">1080</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">539грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 10px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold;">Стильні жіночі шкіряні рюкзаки <br> Найнижча ціна! Кольори: Бордо, Блакитний</span>
				</div>
				<section class="order_section" style="top: 20px; height: 169px; position: relative; margin: 0;">
					<form id="5" name="order_form" class="order_form" action="zakaz5.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
						<input class="input" type="text" name="name" value="Рюкзак Евелін знижка" readonly>
						<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
						<button class="button">Замовити</button>
					</form>
				</section>
			</div>
			<div style="position: absolute; margin-top: 3970px; margin-left: 64px; font-size: 25px;">
				<p style="padding-bottom: 12px; margin-left: 70px;">Зокілор</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">1080грн</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">539грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 10px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold;">Цей рюкзак це абсолютно нове дизайнерське рішення. Залишився останній колір - Червоний</span>
				</div>
				<section class="order_section" style="top: 20px; height: 169px; position: relative; margin: 0;">
					<form id="6" name="order_form" class="order_form" action="zakaz6.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
						<input class="input" type="text" name="name" value="Рюкзак Зокілор знижка" readonly>
						<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
						<button class="button">Замовити</button>
					</form>
				</section>
			</div>
			<div style="position: absolute; margin-top: 4565px; margin-left: 64px; font-size: 25px;">
				<p style="padding-bottom: 12px; margin-left: 70px;">Верона</p>
				<span style="color: red; text-decoration: line-through; font-style: italic; ">1300грн</span>
				<span style="padding-left: 36px; color: green; font-style: italic;">599грн</span>
				<div style="font-style: italic; width: 335px; margin-left: -58px; text-align: center; margin-top: 10px; font-size: 15px; line-height: 24px; ">
					<span style="font-weight: bold;">Вмістй і дуже зручний рюкзак. <br>Кольори: Бордовий, Пурпуровий</span>
				</div>
				<section class="order_section" style="top: 20px; height: 169px; position: relative; margin: 0;">
					<form id="7" name="order_form" class="order_form" action="zakaz7.php" method="post" onsubmit="if(this.name.value==''){alert('Введіть Ваше імя');return false}if(this.phone.value==''){alert('Введіть Ваш номер телефона');return false}return true;">
						<input class="input" type="text" name="name" value="Верона знижка" readonly>
						<input class="input" type="text" name="phone" placeholder="Введіть Ваш телефон" required value="<?php echo isset($_REQUEST['phone']) ? htmlspecialchars($_REQUEST['phone']) : ''; ?>">
						<button class="button">Замовити</button>
					</form>
				</section>
			</div>
		</div>
	</body>
</html>