<?php

// get the name, email and message from body of the request
$requestBody = json_decode(file_get_contents('php://input'), true);
$name = $requestBody['name'];
$email = $requestBody['email'];
$message = $requestBody['message'];

// check of all parameters are set
if (isset($name) && isset($email) && isset($message)) {
  // send the email
  $message = $message;
  $subject = "Contato de Gramado e Turismo";
  $email = "marcelo.d.schneider@gmail.com";
  mail($email, $subject, $message);

  echo json_encode(array(
    "status" => "success",
    "message" => "Email enviado com sucesso!"
  ));
} else {
  // set the response code to (400 - Bad Request)
  http_response_code(400);
  // if not, return an error
  echo json_encode(array(
    "status" => "error",
    "message" => "Erro ao enviar email!"
  ));
}
