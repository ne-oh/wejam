<body>
<div id="loginblock">
    <h1>Welcome back</h1>
    <form action="login.php">
        Username <input type="text" name="username" pattern="^.{4,45}$" title="Must be at least 4 characters" required><br>
        Password <input type="password" name="password" pattern="^.{4,45}$" title="Must be at least 4 characters" required<br><br>
        <input type="submit"><br>
        Don't have an account? <a href="accountcreation.php">Create one now</a>

</div>
</form>
</body>