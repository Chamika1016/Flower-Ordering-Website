<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get form data
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                // Set up email
                $to = "chamikalakshitha935@gmail.com"; // Your email address
                $subject = "Message from $full_name";
                $body = "Name: $full_name\nEmail: $email\nMessage: $message";

                // Send email
                if (mail($to, $subject, $body)) {
                    echo "<p>Email sent successfully!</p>";
                } else {
                    echo "<p>Oops! Something went wrong.</p>";
                }
            }
        ?>