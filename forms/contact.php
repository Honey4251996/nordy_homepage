<?php

  date_default_timezone_set('America/Sao_Paulo');
  require_once('./../src/PHPMailer.php');
  require_once('./../src/SMTP.php');
  require_once('./../src/Exception.php');
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $name = isset($_POST['name']) ? $_POST['name'] : 'Não informado';
  $email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
  $subject = isset($_POST['subject']) ? $_POST['subject'] : 'Não informado';
  $message = isset($_POST['message']) ? $_POST['message'] : 'Não informado';
  $date = date('d/m/Y H:i:s');

  if($email && $message){

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nordyapp@gmail.com';
    $mail->Password = 'Razoppei1981';
    // $mail->Username = 'contato@nordy.com.br';
    // $mail->Password = 'MailCont@toNordy2020';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->addAddress('contato@nordy.com.br');

    $mail->setFrom('nordyapp@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Nome: {$name}<br>
                   Email: {$email}<br>
                   Mensagem: {$message}<br>
                   Data/Hora {$date}";
    $mail->AltBody = 'Chegou o email teste do Canal TI';

    if($mail->send()) {
      echo 'Mensagem enviada com sucesso! :)';
    } else {
      echo 'Erro ao enviar mensagem. :(';
    }

  } else {
    echo 'Informar todos os dados, por favor. :)';
  }

  ?>