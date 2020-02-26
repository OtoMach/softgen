<?php 

$fname=$_POST['fname'];
$lname=$_POST['lname'];

$tel=$_POST['tel'];
$mail=$_POST['mail'];

$servername = "localhost";
$username = "root";
$password = "";
$dbase = "users";

$conn=mysqli_connect($servername,$username,$password,$dbase);

if(!$conn){
    die('დაკავშირებისას მოხდა შეცდომა '.mysqli_connect_error());
}
else {
    echo 'დაკავშირება შესრულდა წარმატებით. <br>';
}

$sqledit=" UPDATE user SET tel='$_POST[tel]', mail='$_POST[mail]' WHERE fname='$_POST[fname]' and lname='$_POST[lname]' ";

if(mysqli_query($conn,$sqledit)){
    echo 'მომხმარებელში ცვლილებები შეტანილია. ';
} else{
    echo 'შეცდომა: ' .mysqli_error($conn);
}

mysqli_close($conn);

echo(" <br> <button onclick=\"location.href='index.html'\">მთავარ გვერდზე დაბრუნება</button>");

?>