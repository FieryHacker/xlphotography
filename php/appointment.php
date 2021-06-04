<?php
	
	if ($_POST) {
		$name = "";
		$email = "";
		$phone = "";
		$event = "";
		$comments = "";
		$date = "";
		$email_body = "<div>";
		$recipient = "xavier.len11@gmail.com";
		$email_title = "New Appointment Request!";

		if(isset($_POST['fullname'])) {
			$name = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>Visitor Name:</b></label>&nbsp;<span>".$name."</span>
							</div>";
		}

		if(isset($_POST['rep-email'])) {
			$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['rep-email']);
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			$email_body .= "<div>
							   <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span>
							</div>";
		}

		if(isset($_POST['phone'])) {
			$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>The client's phone number:</b></label>&nbsp;<span>".$phone."</span>
							</div>";
		}

		if(isset($_POST['event'])) {
			$event = filter_var($_POST['event'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>Requested Event:</b></label>&nbsp;<span>".$event."</span>
							</div>";
		}

		if(isset($_POST['comments'])) {
			$comments = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>Other Comments:</b></label>&nbsp;<span>".$comments."</span>
							</div>";
		}

		if(isset($_POST['fulldate'])) {
			$date = filter_var($_POST['fulldate'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$date."</span>
							</div>";
		}

		$email_body .= "</div>";
 
	    $headers  = 'MIME-Version: 1.0' . "\r\n"
	    .'Content-type: text/html; charset=utf-8' . "\r\n"
	    .'From: ' . $email . "\r\n";

	    if(mail($recipient, $email_title, $email_body, $headers)) {
	        echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
	    } else {
	        echo '<p>We are sorry but the email did not go through.</p>';
	    }

	} else {
		echo '<p>Something went wrong...</p>';
	}

?>
