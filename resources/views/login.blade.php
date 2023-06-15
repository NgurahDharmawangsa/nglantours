<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/login-rounded-right.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/login-rounded-right.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-login {
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');
            background-size: cover;
            background-position: center;
        }

        .slide-left {
            animation: slideLeft 0.5s ease-out;
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(0%);
            }
        }

        .slide-right {
            animation: slideRight 0.5s ease-out;
        }

        @keyframes slideRight {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0%);
            }
        }
    </style>
    <title>Login</title>
</head>

<body>
    <section class="bg-login bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div id="loginContainer" class="backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16" id="form-login">
                <h2 class="font-bold text-2xl text-[#FFFFFF]">Login</h2>
                <p class="text-xs mt-4 text-[#FFFFFF] mb-3">If you are already a member, easily log in</p>

                <form action="/login" class="flex flex-col gap-4" method="post">
                    @csrf
                    @if (Session::has('status'))
                        <div id="alertContainer"
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Peringatan!</strong>
                            <span class="block sm:inline">{{ Session::get('message') }}</span>
                            <span id="closeButton" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Tutup</title>
                                    <path
                                        d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 6.066 4.652a1 1 0 1 0-1.414 1.414L8.586 10l-3.934 3.934a1 1 0 1 0 1.414 1.414L10 11.414l3.934 3.934a1 1 0 0 0 1.414-1.414L11.414 10l3.934-3.934a1 1 0 0 0 0-1.414z" />
                                </svg>
                            </span>
                        </div>
                    @endif
                    <input class="p-2 mt-0 rounded-xl border" type="email" name="email" placeholder="Email" required>
                    <div class="relative">
                        <input id="passwordInput" class="p-2 rounded-xl border w-full" type="password" name="password"
                            placeholder="Password" required>
                        <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor"
                            class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </div>
                    <button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
                </form>

                <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-400">
                </div>

                <button
                    class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
                        <path fill="#FFC107"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                        <path fill="#FF3D00"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                        <path fill="#4CAF50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                        <path fill="#1976D2"
                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.002,0.002-0.003,0.003-0.005l6.19,5.238C38.604,39.649,41.314,36,44,36C47.219,36,50,33.219,50,30C50,26.781,47.219,24,44,24C41.314,24,38.604,27.649,37.717,31.154l-6.19-5.238C34.959,24.393,38.393,20,43.611,20.083z" />
                    </svg>
                    <span>Login with Google</span>
                </button>

                <p class="text-center text-sm mt-8">Don't have an account? <span id="switchToRegister"
                        class="text-[#FFFFFF] cursor-pointer">Register here</span></p>
            </div>

            <!-- image -->
            <div class="hidden md:block md:w-1/2" id="image-login">
                <img src="https://images.unsplash.com/photo-1573790387438-4da905039392?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=425&q=80"
                    alt="Register Image" class="rounded-lg">
            </div>
        </div>

        <!-- register container -->
        <div id="registerContainer" class="backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center hidden">
            <!-- image -->
            <div class="hidden md:block md:w-1/2 z-10" id="image-register">
                <img src="https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=435&q=80"
                    alt="Register Image" class="rounded-lg">
            </div>

            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16" id="form-register">
                <h2 class="font-bold text-2xl text-[#FFFFFF]">Register</h2>
                <p class="text-xs mt-4 text-[#FFFFFF]">Create a new account</p>

                <form action="/register" method="post" class="flex flex-col gap-4">
                    @csrf
                    @if (Session::has('success'))
                        <div id="alertContainer"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ Session::get('message') }}</span>
                            <span id="closeButton" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Tutup</title>
                                    <path
                                        d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 6.066 4.652a1 1 0 1 0-1.414 1.414L8.586 10l-3.934 3.934a1 1 0 1 0 1.414 1.414L10 11.414l3.934 3.934a1 1 0 0 0 1.414-1.414L11.414 10l3.934-3.934a1 1 0 0 0 0-1.414z" />
                                </svg>
                            </span>
                        </div>
                    @endif
                    <input class="p-2 mt-8 rounded-xl border" type="text" name="name" placeholder="Name">
                    <input class="p-2 rounded-xl border" type="email" name="email" placeholder="Email">
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" type="password" name="password"
                            placeholder="Password">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
                            class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </div>
                    <button
                        class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Register</button>
                </form>

                <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-400">
                </div>

                <button
                    class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
                        <path fill="#FFC107"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                        <path fill="#FF3D00"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                        <path fill="#4CAF50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                        <path fill="#1976D2"
                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.002,0.002-0.003,0.003-0.005l6.19,5.238C38.604,39.649,41.314,36,44,36C47.219,36,50,33.219,50,30C50,26.781,47.219,24,44,24C41.314,24,38.604,27.649,37.717,31.154l-6.19-5.238C34.959,24.393,38.393,20,43.611,20.083z" />
                    </svg>
                    <span>Register with Google</span>
                </button>

                <p class="text-center text-sm mt-8">Already have an account? <span id="switchToLogin"
                        class="text-[#FFFFFF] cursor-pointer">Login here</span></p>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("switchToRegister").addEventListener("click", function() {
            // Make form-login slide to the right
            document.getElementById("form-login").classList.add("slide-right");
            document.getElementById("form-login").classList.remove("slide-left");

            // Make image-login slide to the left
            document.getElementById("image-login").classList.add("slide-left");
            document.getElementById("image-login").classList.remove("slide-right");

            // Make form-register slide from the left
            document.getElementById("form-register").classList.add("slide-right");
            document.getElementById("form-register").classList.remove("slide-left");

            // Make image-register slide from the right
            document.getElementById("image-register").classList.add("slide-left");
            document.getElementById("image-register").classList.remove("slide-right");

            // Show registerContainer and hide loginContainer
            document.getElementById("registerContainer").classList.remove("hidden");
            document.getElementById("loginContainer").classList.add("hidden");
        });

        document.getElementById("switchToLogin").addEventListener("click", function() {
            // Make form-register slide to the right
            document.getElementById("form-register").classList.add("slide-right");
            document.getElementById("form-register").classList.remove("slide-left");

            // Make image-register slide to the left
            document.getElementById("image-register").classList.add("slide-left");
            document.getElementById("image-register").classList.remove("slide-right");

            // Make form-login slide from the left
            document.getElementById("form-login").classList.add("slide-left");
            document.getElementById("form-login").classList.remove("slide-right");

            // Make image-login slide from the right
            document.getElementById("image-login").classList.add("slide-right");
            document.getElementById("image-login").classList.remove("slide-left");

            // Show loginContainer and hide registerContainer
            document.getElementById("loginContainer").classList.remove("hidden");
            document.getElementById("registerContainer").classList.add("hidden");
        });

        document.getElementById("closeButton").addEventListener("click", function() {
            document.getElementById("alertContainer").remove();
        });
    </script>

    <script>
        const passwordInput = document.querySelector("#passwordInput");
        const togglePassword = document.querySelector("#togglePassword");

        togglePassword.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // Ganti ikon mata sesuai dengan tipe input password
            if (type === "password") {
                togglePassword.classList.remove("bi-eye-slash");
                togglePassword.classList.add("bi-eye");
            } else {
                togglePassword.classList.remove("bi-eye");
                togglePassword.classList.add("bi-eye-slash");
            }
        });
    </script>
</body>

</html>
