<?php 

$fname=$_POST['fname'];
$lname=$_POST['lname'];

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

$sqldelete=" DELETE FROM user WHERE fname='$_POST[fname]' and lname='$_POST[lname]' ";

if(mysqli_query($conn,$sqldelete)){
    echo 'მომხმარებელი წაშლილია მონაცემთა ბაზიდან';
} else{
    echo 'Error: ' .mysqli_error($conn);
}

mysqli_close($conn);

echo(" <br> <button onclick=\"location.href='index.html'\">მთავარ გვერდზე დაბრუნება</button>");

?>