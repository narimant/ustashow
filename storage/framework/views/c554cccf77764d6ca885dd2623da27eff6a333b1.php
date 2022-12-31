<!DOCTYPE html>
<?php

$dir=(app()->getLocale()=='fa') ? "rtl" :"ltr";
?>
<html
        dir="<?php echo e($dir); ?>"
           <?php if(app()->getLocale()=='fa'): ?>
           lang="fa-ir"
        <?php elseif(app()->getLocale()=='tr'): ?>
        lang="tr-TR"
        <?php else: ?>
        lang="'en-US'"
        <?php endif; ?>
>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php echo SEO::generate(); ?>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('frontend/logo/icon.jpg')); ?>" />

    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>

    <?php if(config('app.locales') != null && Route::is(['index'])): ?>
    <?php $__currentLoopData = config('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <link rel="alternate" hreflang="<?php echo e($local); ?>" href="https://ustashow.com/<?php echo e($local); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?php
        $local=app()->getLocale();
        ?>
            <?php if(str_contains(url()->current(), '/article/')): ?>

                <!--<link rel="alternate" hreflang="<?php echo e($local); ?>" href="https://ustashow.com/<?php echo e($local); ?>/article/<?php echo e($article->slug); ?>" /> -->

                <?php elseif(str_contains(url()->current(), '/page/')): ?>
        <!-- <link rel="alternate" hreflang="<?php echo e($local); ?>" href="https://ustashow.com/<?php echo e($local); ?>/page/<?php echo e($pages->slug); ?>" /> -->

                <?php elseif(str_contains(url()->current(), '/category/')): ?>
        <!-- <link rel="alternate" hreflang="<?php echo e($local); ?>" href="https://ustashow.com/<?php echo e($local); ?>/category/<?php echo e($categoryslug); ?>" /> -->

                <?php elseif(str_contains(url()->current(), '/tag/')): ?>
                    <link rel="alternate" hreflang="<?php echo e($local); ?>" href="https://ustashow.com/<?php echo e($local); ?>/tag/<?php echo e($tag->slug); ?>" />

                <?php elseif(str_contains(url()->current(), '/course/')): ?>
                    <link rel="alternate" hreflang="<?php echo e($local); ?>" href="https://ustashow.com/<?php echo e($local); ?>/course/<?php echo e($course->slug); ?>" />

        <?php endif; ?>

    <?php endif; ?>

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

<!-- Navigation-->
<?php echo $__env->make('frontend.frontendlayout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo $__env->yieldContent('content'); ?>



<?php echo $__env->yieldContent('script'); ?>

<?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
<script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>

<script type="text/javascript">
    var player = videojs('my-video', {
        playbackRates: [0.5, 1, 1.25,1.5, 2],
        fluid:true,
        plugins: {
            hotkeys: {
                volumeStep: 0.1,
                seekStep: 5,
                enableModifiersForNumbers: false
            },
        },
    });
</script>







<!-- pages-->
<?php echo $__env->make('frontend.frontendlayout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/frontend/frontendlayout/frontendmaster.blade.php ENDPATH**/ ?>