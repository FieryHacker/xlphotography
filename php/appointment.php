<?php
	
	if ($_POST) {
		$name = "";
		$email = "";
		$phone = "";
		$event = "";
		$comments = "";
		$date = "";
		$email_body = "<div>";

		if(isset($_POST['fullname'])) {
			$name = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>Visitor Name:</b></label>&nbsp;<span>".$name."</span>
							</div>";
		}

		if(isset($_POST['email'])) {
			$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
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

		if(isset($_POST['events'])) {
			$event = filter_var($_POST['events'], FILTER_SANITIZE_STRING);
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

		if(isset($_POST['date'])) {
			$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
			$email_body .= "<div>
							   <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$date."</span>
							</div>";
		}
	}

>