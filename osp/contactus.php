<?php include("templates/header.php");

   ?>

    <div class="content-container">

        <div class="content-left-contact">

            <form action="/action_page.php">
                <h2>Contact Us</h2>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Example@gmail.com" required>
                </div>

                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description"></textarea>
                </div>

                <button type="submit">Send</button>
            </form>
 
            
        </div>
        <div class="content-right-contact">

            <form action="/action_page.php">
                <h2>Live Chat</h2>

                <div class="form-live">
                    <label for="description">Chat:</label>
                    <textarea id="description" name="description"></textarea>
                </div>

                <button type="submit">Send</button>
            </form>


        </div>
        
    </div>


<?php include("templates/footer.php");

?>