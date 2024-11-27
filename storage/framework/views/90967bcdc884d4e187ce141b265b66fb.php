<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MailiT - Dashboard</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/css/index.css">

</head>

<body>
        <div class="container mt-5">
                <div class="row">
                        <div class="col-md-8">
                                <div class="card">
                                        <div class="card-header">Send Internship Application</div>
                                        <div class="card-body">
                                                <div id="statusMessage" class="alert alert-success"
                                                        style="display:none;">
                                                        Application sent successfully!
                                                </div>

                                                <form method="post" action="/send-mail" id="applicationForm">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group">
                                                                <label for="company_name">Company Name</label>
                                                                <input type="text" class="form-control"
                                                                        id="company_name" name="company_name"
                                                                        placeholder="Enter Company Name" required>
                                                        </div>

                                                        <div class="form-group">
                                                                <label for="company_email">Company Email</label>
                                                                <input type="email" class="form-control"
                                                                        id="company_email" name="company_email"
                                                                        placeholder="Enter Company Email" required>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary mt-3">Send
                                                                Application</button>
                                                </form>
                                        </div>
                                </div>

                                <h3>Application History</h3>
                                <table class="table">
                                        <thead>
                                                <tr>
                                                        <th>Company Name</th>
                                                        <th>Company Email</th>
                                                        <th>Date Sent</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                                        <tr>
                                                                <td><?php echo e($company_one->company_name); ?></td>
                                                                <td><?php echo e($company_one->company_email); ?></td>
                                                                <td><?php echo e($company_one->created_at); ?></td>
                                                        </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                </table>
                        </div>

                        <div class="col-md-4">
                                <div class="card mb-3">
                                        <div class="card-header">Profile</div>
                                        <div class="card-body">
                                                <p>Name: <?php echo e($user->user_name); ?></p>
                                                <p>Email: <?php echo e($user->user_email); ?></p>
                                                <a href="/logout" class="btn btn-danger">Logout</a>
                                        </div>
                                </div>

                                <div class="card">
                                        <div class="card-header">Resume</div>
                                        <div class="card-body">
                                                <p>Uploaded Resume:
                                                        <?php if(empty($user->user_resume)): ?>
                                                                <strong id="resumeName">No Resume Uploaded</strong>
                                                        <?php else: ?>
                                                                <strong id="resumeName"> <?php echo e($user->user_resume); ?></strong>
                                                        <?php endif; ?>
                                                </p>
                                                <form id="resumeUploadForm" action="/upload_resume"
                                                        enctype="multipart/form-data" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="file" class="form-control mb-2" id="resumeFile"
                                                                accept=".pdf" name="resume" required>
                                                        <div class="d-flex justify-content-evenly">
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-success">Upload New
                                                                        Resume</button>
                                                                <a href="/remove_resume"
                                                                        class="btn btn-sm btn-secondary">Remove Old
                                                                        Resume</a>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html><?php /**PATH C:\laragon\www\MailiT\resources\views/index.blade.php ENDPATH**/ ?>