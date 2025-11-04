<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $firstname = $_POST["firstname"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $fromSubject = $_POST["subject"];
  $course = $_POST["course"];
  $message = $_POST["message"];

  $to = "pk1265486@gmail.com, nationalmarketingprojects@gmail.com, contact@nidmm.in, pushpraj@nationalmarketingprojects.com";
  $subject = "New form submission";
  $body = "Name: $name $firstname $lastname\nPhone : $phone\nEmail: $email\nCourse/Subject :$fromSubject $course\nMessage :$message";

  if (mail($to, $subject, $body)) {
    header("Location: thank-you.php");
exit;
  } else {
    echo "There was a problem sending your message. Please try again later.";
  }
}
