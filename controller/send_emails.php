<?php
// Include PHPMailer and its dependencies
require '../controller/assets/lib/send-email/PHPMailer/src/Exception.php';
require '../controller/assets/lib/send-email/PHPMailer/src/PHPMailer.php';
require '../controller/assets/lib/send-email/PHPMailer/src/SMTP.php';

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailSender {

  public function sendEmailContactUs($data) {
      $contactName = isset($data->contactName) ? $data->contactName : '';
      $contactEmail = isset($data->contactEmail) ? $data->contactEmail : '';
      $contactNumber = isset($data->contactNumber) ? $data->contactNumber : '';
      $contactLocation = isset($data->contactLocation) ? $data->contactLocation : '';
      $file = isset($data->file) ? $data->file : null;

      $mail = new PHPMailer(true);

      try {
          $mail->isSMTP();
          $mail->SMTPDebug = 0;
          $mail->Host = 'smtp.hostinger.com';
          $mail->Port = 587;
          $mail->SMTPAuth = true;
          $mail->Username = 'admin@promoflow.net';
          $mail->Password = '32skiff32CI!';
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

          $mail->CharSet = 'UTF-8';
          $mail->Encoding = 'base64';

          $mail->setFrom('admin@promoflow.net', 'Ian Southworth');
          $mail->addReplyTo('admin@promoflow.net', 'Ian Southworth');
          $mail->addAddress('aleinarossui@gmail.com', 'Aleja');

          $mail->Subject = 'New customer on Lanyards For You';
          $mail->isHTML(true);

          $recipientMessage = "
          <div style='margin:0; padding:40px 0; background:#f5f7fa; width:100%;'>
            <div style='width:92%; max-width:760px; margin:0 auto; background:#ffffff; border:1px solid #d9e1ea; box-shadow:0 18px 45px rgba(32,46,82,.10); overflow:hidden;'>
              <div style='background:#202E52; padding:26px 32px; text-align:left;'>
                <img src='https://lanyardsforyou.com/controller/assets/img/send-emails/password-recovery/logo.png' alt='Ullman Sails' style='display:block; max-width:220px; height:auto;'>
              </div>
              <div style='padding:40px 32px 18px 32px;'>
                <p style='margin:0; font-family:Arial, sans-serif; font-size:12px; letter-spacing:2px; text-transform:uppercase; color:#005598; font-weight:700;'>
                  Contact Us
                </p>
                <h1 style='margin:12px 0 10px 0; font-family:Arial, sans-serif; font-size:34px; line-height:1.15; color:#202E52; font-weight:700;'>
                  New customer enquiry
                </h1>
                <p style='margin:0; font-family:Arial, sans-serif; font-size:16px; line-height:1.7; color:#5e6b7a; max-width:560px;'>
                  A new contact request has been submitted through the website. The customer details are below.
                </p>
              </div>
              <div style='padding:20px 32px 10px 32px;'>
                <div style='background:#ffffff; border:1px solid #dbe3ec;'>
                  <div style='padding:18px 22px; border-bottom:1px solid #dbe3ec;'>
                    <p style='margin:0 0 6px 0; font-family:Arial, sans-serif; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#7b8794; font-weight:700;'>Name</p>
                    <p style='margin:0; font-family:Arial, sans-serif; font-size:18px; color:#202E52; font-weight:600;'>$contactName</p>
                  </div>
                  <div style='padding:18px 22px; border-bottom:1px solid #dbe3ec;'>
                    <p style='margin:0 0 6px 0; font-family:Arial, sans-serif; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#7b8794; font-weight:700;'>Email</p>
                    <p style='margin:0; font-family:Arial, sans-serif; font-size:16px; color:#202E52;'>$contactEmail</p>
                  </div>
                  <div style='padding:18px 22px; border-bottom:1px solid #dbe3ec;'>
                    <p style='margin:0 0 6px 0; font-family:Arial, sans-serif; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#7b8794; font-weight:700;'>Phone</p>
                    <p style='margin:0; font-family:Arial, sans-serif; font-size:16px; color:#202E52;'>$contactNumber</p>
                  </div>
                  <div style='padding:18px 22px;'>
                    <p style='margin:0 0 6px 0; font-family:Arial, sans-serif; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#7b8794; font-weight:700;'>Location</p>
                    <p style='margin:0; font-family:Arial, sans-serif; font-size:16px; color:#202E52;'>$contactLocation</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          ";

          $mail->Body = $recipientMessage;
          $mail->AltBody = "New customer enquiry\nName: $contactName\nEmail: $contactEmail\nPhone: $contactNumber\nLocation: $contactLocation";

          if ($file && isset($file['tmp_name']) && $file['tmp_name'] !== '') {
              $mail->addAttachment($file['tmp_name'], $file['name']);
          }

          $mail->send();

          return array(
              "success" => true,
              "message" => "Email sent successfully"
          );
      } catch (Exception $e) {
          return array(
              "success" => false,
              "message" => $mail->ErrorInfo
          );
      }
  }
}
