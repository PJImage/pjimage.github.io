<?
// ----------------------------конфигурация-------------------------- //

$adminemail="paveldenysov@gmail.com, 2kie.co@gmail.com";  // e-mail админа

$email="paveldenysov@gmail.com, 2kie.co@gmail.com"; // почта пользователя по умолчанию

$date=date("d.m.y"); // число.месяц.год

$time=date("H:i"); // часы:минуты:секунды

$backurl="/spasibo/?utm_source=Звонок&utm_medium=конверсия&utm_campaign=заявка";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы



$phone=$_POST['lead_phone'];

$name=$_POST['lead_name'];

$message=$_POST['lead_text'];

$msg="
Я у вас на сайте. Хочу стать вашим клиентом.

Имя компании: $name
Телефон: $phone

---
";



 // Отправляем письмо админу

mail("$adminemail", "$date $time [Заявка DeLife] Перезвоните мне $phone ", "$msg");



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Заявка с формы 'перезвоните мне' от $phone");

fwrite($f,"\n $msg ");

fwrite($f,"\n ---------------");

fclose($f);



// Выводим сообщение пользователю

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 0);
//--></script>
";
exit;



?>
