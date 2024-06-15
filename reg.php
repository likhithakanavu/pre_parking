<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Responsive Login and Signup Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="stylec.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Register</header>
                    <form action="controller/login.php" method="post">
                    <div class="field input-field">
                            <input type="name" name="name" placeholder="Name" class="input">
                        </div>
                        <div class="field input-field">
                            <input type="email" name="email" placeholder="Email" class="input" Required>
                        </div>

                        <div class="field input-field">
                            <input type="password" name="pass" placeholder="Create password" class="password" Required>
                            <i class='bx bx-hide eye-icon'></i>

                        </div>

                        <div class="field input-field">
                            <input type="tel" placeholder="Contact Number" pattern="[0-9]{10}" title="Contact Number Should be 10 digit" name="con" class="input" Required>
                        </div>

                        <div class="field input-field">
                            <input type="text" placeholder="Address" name="add" class="input" Required>
                          
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="reg" >Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="login.php" class="link signup-link">Login</a></span>
                    </div>
                </div>

                <!-- <div class="line"></div> -->

  


            </div>

            <!-- Signup Form -->

        
        </section>

        <!-- JavaScript -->
        <script src="js/script.js"></script>

        
    </body>
</html>