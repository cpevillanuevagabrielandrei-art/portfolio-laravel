<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login — Portfolio CMS</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/admin.scss']); ?>
</head>
<body>

<div class="admin-login-page">
    <div class="login-card">
        <h1>🔐 Admin Login</h1>
        <p class="login-subtitle">Portfolio CMS — Sign in to continue</p>

        <?php if($errors->any()): ?>
            <div class="alert alert-error">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.login.post')); ?>" class="admin-form">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                       placeholder="admin@portfolio.com" required autofocus />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required />
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember" style="font-weight:400">Remember me</label>
            </div>
            <button type="submit" class="btn-admin btn-admin-primary" style="width:100%; justify-content:center; padding:0.8rem">
                Sign In
            </button>
        </form>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\portfolio-laravel\resources\views/admin/login.blade.php ENDPATH**/ ?>