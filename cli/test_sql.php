<?php 
//инициируем соединение 
// $conn = mysqli_init();
// //уст-вка стандартных параметров для соединения, но лучше опции не трогать
// if($conn){
//    if(!mysqli_options($conn, MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT=0')){

//        die("Error set Auto Commit");
//    }
// } else{
//    die("Error not init");
// }
// //уст-м соединение с БД mysqli_real_connect($conn - соединение, 
// //'localhost' -хост, 'root' - пользователь,'' -пароль, 'shop' - название БД)
// if(!mysqli_real_connect($conn, 'localhost', 'root','', 'shop')){
// die("Error Connection (".mysqli_connect_errno().')'.mysqli_connect_error());
// }
// //посмотрим в консоли  установилось ли соединение (вызываем php cli/test_sql.php)
// var_dump($conn);

//закрываем БД
//mysqli_close($conn);


//Но есть интегрируемая версия данного сценария - ф-ция msqli_connect


// $host ="localhost";
// $user = "root";
// $password = "";
// $dbname = "test";

// $conn = mysqli_connect($host, $user, $password, $dbname);

// //проверяем на ошибку

// if(mysqli_connect_error()){
//     die("Error connection");
// // или echo("Error connection");  а потом exit()
//     }
//     echo mysqli_get_host_info($conn);
//     //mysqli_close($conn);


//создаем БД
// $host ="localhost";
// $user = "root";
// $password = "";
// $dbname = "shop";


// $conn = mysqli_connect($host, $user, $password);
// $sql = "CREATE DATABASE shop"; //но лучше:

//$sql = "DROP DATABASE IF EXISTS shop; CREATE DATABASE shop;";

// или тоже самое можно записать 2 строками:
// mysqli_query($conn, "DROP DATABASE IF EXISTS shop;");
// mysqli_query($conn, "CREATE DATABASE shop;");

// // или еще проще:
// mysqli_multi_query($conn,  $sql);
// mysqli_close($conn);



//СОЗДАЕМ СХЕМУ. для этого проверяем есть БД с тем же именем
// $sql = "DROP SCHEMA IF EXISTS shop; CREATE SCHEMA shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
// mysqli_multi_query($conn,  $sql);
// mysqli_close($conn);

//оптимизируем код (избавляемся от длинных строк)
// $sql = <<<EOF
// DROP SCHEMA IF EXISTS shop; 
// CREATE SCHEMA shop
// CHARACTER SET utf8mb4
// COLLATE utf8mb4_unicode_ci;
// EOF;
// mysqli_multi_query($conn,  $sql);
// mysqli_close($conn);

//СОЗДАЕМ ТАБЛИЦЫ
$host ="localhost";
$user = "root";
$password = "";
$dbname = "shop";

$conn = mysqli_connect($host, $user, $password, $dbname);
// if(mysqli_connect_error()){
//     die("Error connection");
// или echo("Error connection");  а потом exit()
    // }
    //mysqli_close($conn);

$sql = <<<EOT
DROP TABLE IF EXISTS ; 
CREATE TABLE guestbook CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci (
id int(11) NOT NULL AUTO_INCREMENT,
gender varchar(25) NOT NULL,
username varchar(255) NOT NULL,
email varchar(30) NOT NULL,
subject varchar(30) NOT NULL, 
message text NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
);
EOT;
mysqli_multi_query($conn,  $sql);


mysqli_close($conn);


//Наполняем таблицу данными. В скобках указываем поля, которые требуют заполнения - username, email, message
// $sql = "INSERT INTO guestbook (gender, username, email, subject, message) VALUES('Г-жа', Ann', 'ann@my.com', 
// 'Сотрудничество', 'Hi, Ann here');";

// //mysqli_multi_query($conn,  $sql);
// mysqli_query($conn,  $sql);
// mysqli_close($conn);

// Вызвать и посмотреть таблицу  - http://localhost/phpmyadmin/

//Как выводить данные
//$sql = "SELECT * FROM guestbook";
//$res = mysqli_query($conn, $sql);
// if(mysqli_num_rows($res)>0){
//     while($row = mysqli_fetch_assoc($res)) {
//         print_r($row);
//     }
// }else{
//     echo "Not result";
// }
// mysqli_close($conn);

//Если нужно вывести все данные м. использовать ф-цию mysqli_fetch_all
// if(mysqli_num_rows($res)>0){
//     $collection = mysqli_fetch_all($res, 1);
//     print_r($collection);

// }else{
//     echo "Not result";
// }
// //UPDATE
// $sql = "UPDATE guestbook SET username = 'Ton', email = 'ton@my.com' WHERE id=1";
// mysqli_query($conn, $sql);
// $sql = "SELECT * FROM guestbook";
// print_r($sql);

// //DELETE
// $sql = "DELETE FROM guestbook WHERE id=2";
// mysqli_query($conn, $sql);
// $sql = "SELECT * FROM guestbook";
// print_r($sql);
// mysqli_close($conn);
