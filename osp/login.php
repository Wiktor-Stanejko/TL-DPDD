<?php include("templates/header.php"); ?>

<div class="login-container">
    <div class="form1">
    <form action="/action_page.php" method="post" onsubmit="return validateForm()">
        <h2>Login</h2>

        <div class="form-login">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Example@gmail.com" required>
        </div>

        <div class="form-login">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="password-box" placeholder="Enter your password" required>
        </div>
    

        <button type="submit">Send</button>
        <a href="signup.php">Don't have an account?</a>
    </form>
</div>
</div>
<script>
function validateForm() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (!email.includes("@")) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    return true;
}
</script>
<?php include("templates/footer.php"); ?>