<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="form-control signup-form">
                <form action="#">
                    <h2>Signup</h2>
                    <input type="text" placeholder="Username" required />
                    <input type="email" placeholder="Email" required />
                    <input type="password" placeholder="Password" required />
                    <input type="password" placeholder="Confirm password" required />
                    <button>Signup</button>
                </form>
                <span>or signup with</span>
                <div class="socials">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-google-plus-g"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="form-control signin-form">
                <form action="#">
                    <h2>Signin</h2>
                    <input type="text" placeholder="Username" required />
                    <input type="password" placeholder="Password" required />
                    <button>Signin</button>
                </form>
                <span>or signin with</span>
                <div class="socials">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-google-plus-g"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
        </div>
        <div class="intros-container">
            <div class="intro-control signin-intro">
                <div class="intro-control__inner">
                    <h2>Welcome back!</h2>
                    <p>
                        Welcome back! We are so happy to have you here. It's great to see you again. We hope you had a
                        safe and enjoyable time away.
                    </p>
                    <button id="signup-btn">No account yet? Signup.</button>
                </div>
            </div>
            <div class="intro-control signup-intro">
                <div class="intro-control__inner">
                    <h2>Come join us!</h2>
                    <p>
                        We are so excited to have you here.If you haven't already, create an account to get access to
                        exclusive offers, rewards, and discounts.
                    </p>
                    <button id="signin-btn">Already have an account? Signin.</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/login/js/main.js') }}"></script>
</body>

</html>
