<?php
  /**
   * Requires the "PHP Email Form" library
   * The "PHP Email Form" library is available only in the pro version of the template
   * The library should be uploaded to: vendor/php-email-form/php-email-form.php
   * For more info and help: https://bootstrapmade.com/php-email-form/
   */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'venkatachalapathys1996@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'No Email';
  $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'venkatachalapathys1996@gmail.com',
    'password' => 'ldvd domy ykkr xkte', // Use an app-specific password, not your Gmail password
    'port' => '587',
    'secure' => 'tls' // Gmail requires TLS encryption
  );

  // Add the message fields
  $contact->add_message( isset($_POST['name']) ? $_POST['name'] : 'No Name', 'From');
  $contact->add_message( isset($_POST['email']) ? $_POST['email'] : 'No Email', 'Email');
  $contact->add_message( isset($_POST['message']) ? $_POST['message'] : 'No Message', 'Message', 10);

  echo $contact->send();
?>
