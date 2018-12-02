<?php
session_start();
include "header.php";

if($_REQUEST["sent"] == "true"){
    mail("annieoh@usc.edu",
        $_REQUEST["subject"],
        $_REQUEST["message"],
        $_REQUEST["name"] . " <". $_SESSION["email"] ."> ");
}
?>
<div id="contactfill">
    <h1>CONTACT US</h1>
    </div>

<form action="contact.php" class="cf">
  <div class="half left cf">
      <input type="hidden" name="sent" value="true">
    <input type="text" id="input-name" name="header" placeholder="Name">
    <input type="email" id="input-email" name="email"  placeholder="Email address">
    <input type="text" id="input-subject" name="subject"  placeholder="Subject">
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
  </div>
  <input type="submit" value="Submit" id="input-submit">
</form>
