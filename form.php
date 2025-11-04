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
  $previous_page = $_SERVER['HTTP_REFERER'];
  $to = "contact@nidmm.in,nationalmarketingprojects@gmail.com";
  $subject = "New form submission";
  $body = "Name: $name $firstname $lastname\nPhone : $phone\nEmail: $email\nCourse where user filled the form: $previous_page\nCourse/Subject :$fromSubject $course\nMessage :$message";

  if (mail($to, $subject, $body)) {
    $url = "https://nidmm.in/doc/nidmm.pdf";
    echo "<script>window.open('$url', '_blank');</script>";
  } else {
    echo "There was a problem sending your message. Please try again later.";
  }
}
$previous_page = $_SERVER['HTTP_REFERER'];
echo " <script> setTimeout(function() { window.location.href = '$previous_page'}, 30);</script>"
?>
