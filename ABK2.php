<?
// ----------------------------конфигурация-------------------------- //

$adminemail="eleven.krsk@gmail.com, liferenko@etlgr.com
";  // e-mail админа

$email="eleven.krsk@gmail.com"; // почта пользователя по умолчанию

$date=date("d.m.y"); // число.месяц.год

$time=date("H:i"); // часы:минуты:секунды

$backurl="/spasibo/?utm_source=%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D1%8C%20%D0%BD%D0%B0%20%D0%BF%D1%80%D0%B8%D1%91%D0%BC&utm_medium=%D0%BA%D0%BE%D0%BD%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%8F&utm_campaign=%D0%B7%D0%B0%D1%8F%D0%B2%D0%BA%D0%B0";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы



$phone=$_POST['lead_phone'];

$name=$_POST['lead_name'];

$message=$_POST['lead_text'];

$msg="
Я у вас на сайте. Интересует проекционная система.

Наш продукт: $name
Телефон: $phone

---
";



 // Отправляем письмо админу

mail("$adminemail", "$date $time [Заявка PJ Image форма2] $name на $message ", "$msg");



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Заявка с формы 2 от $phone");

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
