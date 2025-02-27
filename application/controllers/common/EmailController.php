<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
        $this->load->helper('url'); // Load URL helper for base_url
        $this->load->helper('security'); // Load security helper for XSS protection
    }

    public function send_verification_email() {
        $this->load->library('Email_library');
        $this->email_library->send_verification_email('david.ichi4+1@gmail.com', 229);
        // if (!empty($email)) {
        //     $email_address = $this->security->xss_clean($email); // TRUE will do XSS filtering
        //     $vkey = md5(time() . $email_address);

        //     // Proceed to update email address
        //     $data = array(
        //         'vkey' => $vkey
        //     );

        //     // echo $data;

        //     // Update the user's email and verification status in the database
        //     $this->db->where('user_id', $user_id);
        //     $result = $this->db->update('all_users', $data);

        //     // Check if the update was successful
        //     if ($result) {
        //         // Send email using PHPMailer
        //         $mail = new PHPMailer(true);
        //         try {
        //             //Server settings
        //             $mail->isSMTP();
        //             $mail->SMTPAuth = true;
        //             $mail->Host = 'smtp.gmail.com';
        //             $mail->Port = 465;
        //             $mail->SMTPSecure = 'ssl';
        //             $mail->Username = 'qaadms.sdca@gmail.com';
        //             $mail->Password = 'joujcuigcxyjhfzr'; // Use app-specific password if required

        //             //Recipients
        //             $mail->setFrom('qaadms.sdca@gmail.com');
        //             $mail->addReplyTo('no-reply-qaadms.sdca@gmail.com');
        //             $mail->addAddress($email_address);

        //             // Content
        //             $mail->isHTML(true);
        //             $mail->Subject = 'Email Verification (QAADMS)';
        //             $mail->Body = "<a href='" . base_url('verify/' . $vkey) . "'>Click here to verify your account.</a>";

        //             $mail->send();
        //             echo 'successful';
        //         } catch (Exception $e) {
        //             log_message('error', 'Mailer Error: ' . $mail->ErrorInfo);
        //             echo 'error';
        //         }
        //     } else {
        //         echo 'error';
        //     }

        //     die;
        // }
    }
}
