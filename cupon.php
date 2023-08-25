<?php


include ('connectDB/config.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
$row = mysqli_fetch_assoc($result);


$user_name = $row['name'];
$user_mail = $row['email'];
$points = $row['points'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if($points > 1000){
    // mail to the users for cupon
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com"; //gmail smtp server
    $mail->SMTPAuth = true; //enable smtp authentication
    $mail->Username = "yotunities@gmail.com"; //gmail username
    $mail->Password = "zcxeotuhuoikcgrs"; // your password
    $mail->SMTPSecure = "ssl";  //for encrypted connection
    $mail->Port = 465; //gmail port

    $mail->setFrom("yotunities@gmail.com", "Yotunities"); // your email and name
    $mail->addAddress($user_mail); // the email you want to send to
    $mail->isHTML(true); // set email format to HTML

    $mail->Subject = "Congratulations! You have earned a cupon!"; // the subject of the email
    $mail->Body = "Hi, $user_name. You have earned a cupon for your participation in the event. Please find the cupon attached.";
    $mail->Body .= "<br><br>";
    $mail->Body .= "Here is some information about you:";
    $mail->Body .= "<br><br>";
    $mail->Body .= "Name: $user_name";
    $mail->Body .= "<br><br>";
    $mail->Body .= "Email: $user_mail";
    $mail->Body .= "<br><br>";
    // random cupon generator with number and letters
    $cupon = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
    $mail->Body .= "Cupon: $cupon";
    $mail->Body .= "<br><br>";
    // make array of comapny then randomly select one and said that the cupon is for that company

    $companies = array("Shikho", "10-min School", "Coursera", "edX");
    $company = $companies[array_rand($companies)]; // random company

    $mail->Body .= "You can to use this cupon for $company.";

    $mail->Body .= "<br><br>";

    $mail->Body .= "Do let me know if there is any other information you need from me. Thank you.";
    $mail->Body .= "<br><br>";

    $mail->Body .= "Yours sincerely,";
    $mail->Body .= "<br>";

    $mail->Body .= "Yotunities";

    $mail->Body .= "<br>";

    $sq = "UPDATE users SET points = 0 WHERE id = '$user_id'";
    $res = mysqli_query($conn, $sq);

}


?>