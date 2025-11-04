 <?php
    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['query'];
        $subject = $_POST['product'];
        $country = $_POST['country'];
        $to = "contact@nidmm.in, swetaryann@gmail.com, nationalmarketingprojects@gmail.com";
        $txt = "Name:-" . $name . "\n" . "Mobile number:-" . $phone . "\n" . "Subject:- " . $subject . "\n" . "Email:-" . $email . "\n" . "Country:-" . $country . "\n" . "Message:-" . $message;
        if (mail($to, "National Institute of Digital Media Marketing", $txt, "From:$email")) {
            echo "<script>alert('Successfully Message sent')</script>";
            echo '<script>window.location.href="https://nidmm.in/ads/thank-you.php";</script>';
        } else {
            echo "<script>alert('Query Failed')</script>";
        }
    }




    // to make code below work, uncomment below code and comment out code above, exept opening and closing tags.
    // 



    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //   $name = $_POST["name"];
    //   $lastname = $_POST["lastname"];
    //   $firstname = $_POST["firstname"];
    //   $phone = $_POST["phone"];
    //   $email = $_POST["email"];
    //   $course = $_POST["course"];
    //   $message = $_POST["message"];

    //   $to = "contact@nidmm.in";
    //   $subject = "New form submission";
    //   $body = "Name: $name $firstname $lastname\nPhone : $phone\nEmail: $email\nCourse : $course\nMessage :$message";

    //   if (mail($to, $subject, $body)) {
    //     header("Location: thank-you.php");
    //     exit();
    //   } else {
    //     echo "There was a problem sending your message. Please try again later.";
    //   }
    // }
    ?>