<?php
session_start();


include "header.php";
?>
<body>
<div id="creationblock">
    <h1>Create an account</h1>
    <form action="creationsuccess.php
">
        <strong>Username</strong><input type="text" name="username" pattern="^.{4,45}$" title="Must be at least 4 characters" required><br>
        Usernames should be at least 4 characters.<br><br>
        <strong>Password</strong> <input type="password" name="password" pattern="^.{4,45}$" title="Must be at least 4 characters" required><br>
        Passwords should be at least 4 characters.<br><br>
        <strong>Email Address</strong> <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address." required><br>
        <input type="submit"><br>
        Already have an account? <a href="login.php">Log in</a>
</div>
</form>
</body>