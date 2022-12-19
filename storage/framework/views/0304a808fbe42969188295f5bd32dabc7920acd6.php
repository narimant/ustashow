<!DOCTYPE html>
<?php

    $dir=(app()->getLocale()=='fa') ? "rtl" :"ltr";
?>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e($dir); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<?php echo SEO::generate(); ?>

<!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('frontend/logo/icon.jpg')); ?>" />

    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>



    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/all.min.css')); ?>" >

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/feather.css')); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/materialdesignicons.min.css')); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/customstyle.css')); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-select.min.css')); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/flag-icon.min.css')); ?>" >

    <?php if(app()->getLocale()=='fa'): ?>
        <link href="<?php echo e(asset('frontend/css/themertl.min.css')); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/customrtl.css')); ?>" >
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/theme.min.css')); ?>" >
    <?php endif; ?>




    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>





<?php echo $__env->yieldContent('content'); ?>



<?php echo $__env->yieldContent('script'); ?>

<?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>









</body>
</html>
<?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/frontend/frontendlayout/frontendblanck.blade.php ENDPATH**/ ?>