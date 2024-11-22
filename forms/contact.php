<?php
  /**
  * Requer a biblioteca "PHP Email Form"
  * A biblioteca "PHP Email Form" está disponível apenas na versão pro do template
  * A biblioteca deve ser carregada em: vendor/php-email-form/php-email-form.php
  * Para mais informações e ajuda: https://bootstrapmade.com/php-email-form/
  */

  // Substitua contact@example.com pelo seu endereço de email real de recebimento
  $receiving_email_address = 'Lovelyseries@outlook.com.br';

  // Verifica se o arquivo da biblioteca existe
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form ); // Inclui a biblioteca se o arquivo existir
  } else {
    die( 'Unable to load the "PHP Email Form" Library!'); // Exibe uma mensagem de erro se o arquivo não for encontrado
  }

  // Cria uma nova instância da classe PHP_Email_Form
  $contact = new PHP_Email_Form;
  $contact->ajax = true; // Define que o formulário será enviado via AJAX
  
  // Define o endereço de email de destino
  $contact->to = $receiving_email_address;
  // Define o nome do remetente com base no valor enviado pelo formulário
  $contact->from_name = $_POST['name'];
  // Define o email do remetente com base no valor enviado pelo formulário
  $contact->from_email = $_POST['email'];
  // Define o assunto do email com base no valor enviado pelo formulário
  $contact->subject = $_POST['subject'];

  // Descomente o código abaixo se você quiser usar SMTP para enviar emails. Você precisa inserir suas credenciais SMTP corretas
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // Adiciona as mensagens ao email
  $contact->add_message( $_POST['name'], 'From'); // Adiciona o nome do remetente
  $contact->add_message( $_POST['email'], 'Email'); // Adiciona o email do remetente
  $contact->add_message( $_POST['message'], 'Message', 10); // Adiciona a mensagem com prioridade 10

  // Envia o email e exibe o resultado
  echo $contact->send();
?>
