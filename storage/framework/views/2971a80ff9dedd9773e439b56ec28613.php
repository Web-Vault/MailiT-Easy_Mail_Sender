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
        <link href="<?php echo e(URL::to('/')); ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS -->
        <script src="<?php echo e(URL::to('/')); ?>/js/bootstrap.min.js"></script>

</head>

<body>
        <div class="container">
                <ul class="nav nav-tabs" id="tabMenu">
                        <li class="nav-item">
                                <a class="nav-link active" id="loginTab">Login</a>
                        </li>
                </ul>

                <div class="tab-content">
                        <div id="loginForm" class="active">
                                <h3 class="mb-4">Login</h3>
                                <form action="indexLogin" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                                <label for="loginEmail">Email</label>
                                                <input type="email" class="form-control" id="loginEmail"
                                                        name="loginEmail" placeholder="Enter email">
                                                <span class="text-danger">
                                                        <?php $__errorArgs = ['loginEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                                        <?php echo e($message); ?>

                                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </span>
                                        </div>
                                        <div class="form-group">
                                                <label for="loginPassword">Password</label>
                                                <input type="password" class="form-control" id="loginPassword"
                                                        name="loginPassword" placeholder="Enter password">
                                                <span class="text-danger">
                                                        <?php $__errorArgs = ['loginPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                                        <?php echo e($message); ?>

                                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </span>
                                        </div>
                                        <div class="form-actions">
                                                <a href="/signup" type="button" class="btn btn-secondary"
                                                        id="forgotPasswordLink">Don't Have Account? Signup!</a>
                                                <button type="submit" class="update btn btn-primary">Login</button>
                                        </div>
                                </form>
                        </div>

                
                </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>
        document.addEventListener('DOMContentLoaded', function () {
                const loginTab = document.getElementById('loginTab');
                const signupTab = document.getElementById('signupTab');
                const loginForm = document.getElementById('loginForm');
                const signupForm = document.getElementById('signupForm');
                const forgotPasswordForm = document.getElementById('forgotPasswordForm');
                const forgotPasswordLink = document.getElementById('forgotPasswordLink');

                loginTab.addEventListener('click', function () {
                        showForm('login');
                });

                signupTab.addEventListener('click', function () {
                        showForm('signup');
                });

                forgotPasswordLink.addEventListener('click', function () {
                        showForm('forgotPassword');
                });

                forgotPasswordForm.addEventListener('submit', function (event) {
                        event.preventDefault();
                        showForm('login');
                });

                function showForm(formType) {
                        loginForm.style.display = formType === 'login' ? 'block' : 'none';
                        signupForm.style.display = formType === 'signup' ? 'block' : 'none';
                        forgotPasswordForm.style.display = formType === 'forgotPassword' ? 'block' : 'none';

                        loginTab.classList.toggle('active', formType === 'login');
                        signupTab.classList.toggle('active', formType === 'signup');
                }

                showForm('login');
        });
</script>

</html><?php /**PATH C:\laragon\www\MailiT\resources\views/login.blade.php ENDPATH**/ ?>