<?php
	require '../PHPMailerAutoload.php';

	$data = array(
		'name' => isset($_POST['name']) ? $_POST['name'] : false,
		'phone_number' => isset($_POST['phone_number']) ? $_POST['phone_number'] : false,
		'email' => isset($_POST['email']) ? $_POST['email'] : false,
		'fax' => isset($_POST['fax']) ? $_POST['fax'] : false,
		'designation' => isset($_POST['designation']) ? $_POST['designation'] : false,
		'reason_to_contact' => isset($_POST['reason_to_contact']) ? $_POST['reason_to_contact'] : false,
		'person_to_contact' => isset($_POST['person_to_contact']) ? $_POST['person_to_contact'] : false,
		'message' => isset($_POST['message']) ? $_POST['message'] : false,
	);

	try {

		$mail = new PHPMailer;

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = '************';                 // SMTP username
		$mail->Password = '************';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('from@example.com', 'Mailer');
		$mail->addAddress('******************', 'Joe User');            // Name is optional
		$mail->addReplyTo('******************', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'There is a new enquiry from Centre West';
		$mail->Body    = 'Name :'.$data['name'].'<br/>'.'Phone Number :'.$data['phone_number'].'<br/>'.'Email :'.$data['email'].'<br/>'.'Fax :'.$data['fax'].'<br/>'.'Designation :'.$data['designation'].'<br/>'.'Reason to contact :'.$data['reason_to_contact'].'<br/>'.'Person to contact :'.$data['person_to_contact'].'<br/>'.'Designation :'.$data['designation'].'<br/>'.'Reason to contact :'.$data['reason_to_contact'].'<br/>'.'Message :'.$data['message'];

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
			echo '<script type="text/javascript">window.location.href = "http://www.centrewest.com.my/thankyou.html";</script>';
		}
	}
	catch (exception $e) {
		echo $e;
	}
	
	
