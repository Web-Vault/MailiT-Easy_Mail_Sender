<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | MailiT </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


        <style>
                .upload-instructions {
                        font-size: 0.95rem;
                        color: #6c757d;
                        line-height: 1.5;
                        font-weight: 600;
                }
        </style>

        <!-- Bootstrap CSS -->
        <link href="{{ URL::to('/') }}/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS -->
        <script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>

</head>

<body>
        <div class="container">
                <ul class="nav nav-tabs" id="tabMenu">
                        <li class="nav-item">
                                <a class="nav-link active" id="signupTab">Signup</a>
                        </li>
                </ul>

                <div id="signupForm">
                        <h3 class="mb-4">Signup</h3>
                        <form action="indexSignup" method="post">
                                @csrf
                                <div class="form-group">
                                        <label for="signupName">Full Name</label>
                                        <input type="text" class="form-control" id="signupName" name="fullname"
                                                placeholder="Enter Full name">
                                        <span class="text-danger">
                                                @error('fullname')
                                                                                                        {{ $message}}
                                                                                                @enderror
                                        </span>
                                        <p class="upload-instructions">Entered name will be used as it is in
                                                your mail format.</p>
                                </div>
                                <div class="form-group">
                                        <label for="signupEmail">Email</label>
                                        <input type="email" class="form-control" id="signupEmail" name="email"
                                                placeholder="Enter email">
                                        <span class="text-danger">
                                                @error('email')
                                                                                                        {{ $message}}
                                                                                                @enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                        <label for="signupPassword">Password</label>
                                        <input type="text" class="form-control" id="signupPassword" name="password"
                                                placeholder="Enter password">
                                        <span class="text-danger">
                                                @error('password')
                                                                                                        {{ $message}}
                                                                                                @enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                        <label for="signupConfirmPassword">Confirm Password</label>
                                        <input type="text" class="form-control" id="signupConfirmPassword"
                                                name="confirm_password" placeholder="Confirm password">
                                        <span class="text-danger">
                                                @error('confirm_password')
                                                                                                        {{ $message}}
                                                                                                @enderror
                                        </span>
                                </div>
                                <div class="form-actions">
                                <a href="/" type="button" class="btn btn-secondary"
                                                        id="forgotPasswordLink">Already Have Account? Login!</a>

                                        <button type="submit" class="update btn btn-primary">Signup</button>
                                </div>
                        </form>
                </div>


                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </div>

</body>

</html>