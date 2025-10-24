<?php include("templates/header.php"); ?>

<div class="login-container">

    <div class="form2">
    <form action="/action_page.php" method="post" onsubmit="return validateForm()">
                <h2>Sign Up</h2>

                <div class="form-signup">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Example@gmail.com" required>
                </div>

                <div class="form-signup">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" placeholder="John" required>
                </div>

                <div class="form-signup">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" placeholder="Doe">
                </div>

                <div class="form-signup">
                    <label for="phone">Phone Number:</label>
                    <input id="phone" name="phone" class="phone"></input>
                </div>

                <button type="submit">Send</button>

                <a href="login.php">You already have a account?</a>
            </form>
        </div>

</div>

<script>
function validateForm() {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!email.includes("@")) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (fname.includes("")) {
        alert("You must include your first name.");
        return false;
    }

    if (lname.includes("")) {
        alert("You must include your last name.");
        return false;
    }

    if (phone.length < 11) {
        alert("Your phone number must have minimum 11.");
        return false;
    }

    return true;
}
</script>

<?php include("templates/footer.php"); ?>