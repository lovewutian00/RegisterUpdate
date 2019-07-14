<?php //

return array(
  "driver" => "smtp",
  "host" => "smtp.googlemail.com",
  "port" => 587,
  "from" => array(
      "address" => "tarcitponline@gmail.com",
      "name" => "TARUC ITP"
  ),
  "encryption" => "tls",
  "username" => "tarcitponline@gmail.com",
  "password" => "tarc@itp2018",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);

?>