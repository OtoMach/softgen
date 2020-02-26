<?php

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gend=$_POST['gend'];
$bdate=$_POST['bdate'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];

$servername = "localhost";
$username = "root";
$password = "";

$conn=mysqli_connect($servername,$username,$password);

// მონაცემთა ბაზის შექმნა
$sqlscript="CREATE DATABASE users";

if(mysqli_query($conn, $sqlscript)){
    echo 'მონაცემთა ბაზა შექმნილია <br>';
}
else{
    echo 'მონაცემთა ბაზა არ შეიქმნა ან უკვე არსებობს: ' .mysqli_error($conn) ,'<br>';
}
//ბაზასთან დაკავშირება
$dbase = "users";
$conn2=mysqli_connect($servername,$username,$password,$dbase);

if(!$conn2){
    die('დაკავშირებისას მოხდა შეცდომა '.mysqli_connect_error() );
}
else {
    echo 'დაკავშირება შესრულდა წარმატებით. <br> ';
}
//Table-ს შექმნა ყველა საჭირო ველით
$sqlscript2="CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname varchar(30) not null,
    lname varchar(30) not null,
    gend enum('male','female') not null,
    bdate date not null,
    tel varchar(15) not null,
    mail varchar(50) not null
    )";

if(mysqli_query($conn2,$sqlscript2)){
    echo 'Table Users Created. <br>';
} else {
    echo 'Error Creating Table: ' .mysqli_error($conn2),'<br>';
}
//Table-ში მონაცემების დამატება შემოსული მონაცემებით
$sqlinsert="INSERT INTO user (fname, lname, gend, bdate, tel, mail) 
VALUES ('$_POST[fname]','$_POST[lname]','$_POST[gend]','$_POST[bdate]',
'$_POST[tel]','$_POST[mail]')";

if(mysqli_query($conn2,$sqlinsert)){
    echo 'მომხმარებელი დამატებულია მონაცემთა ბაზაში. <br>';
}else{
    echo 'Error: ' .mysqli_error($conn2),'<br>';
}
mysqli_close($conn);
mysqli_close($conn2);

echo(" <br> <button onclick=\"location.href='index.html'\">მთავარ გვერდზე დაბრუნება</button> ");

?>