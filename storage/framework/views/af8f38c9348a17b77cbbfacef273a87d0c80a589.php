<?php $__env->startSection('content'); ?>
    <div class="ibox-content">
<div class="container-fluid bootstrap snippets bootdey">

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="ibox float-e-margins">

                    <h2>
                        <?php echo e(count($articles)); ?>  <?php echo e(__('messages.results found for')); ?>: <span class="text-navy"><?php echo e(request('search')); ?></span>
                    </h2>
                    <small><?php echo e(__('messages.Request time')); ?>  (0.23 seconds)</small>

                    <div class="search-form">
                        <form action="<?php echo e(route('home.search')); ?>" method="get">
                            <div class="input-group">
                                <input type="text" placeholder=" " name="search" value="<?php echo e(request('search')); ?>" class="form-control input-lg">
                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        <?php echo e(__('messages.Search')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="hr-line-dashed"></div>
                       <div class="row">

                           <div class="search-result col-12">
                               <h3><a href="<?php echo e($article->path()); ?>"><?php echo e($article->title); ?></a></h3>
                               <a href="<?php echo e($article->path()); ?>" class="search-link"><?php echo e(Request::root()); ?><?php echo e($article->path()); ?></a>
                               <p>
                                   <?php echo e($article->description); ?>

                               </p>
                           </div>
                       </div>
                        <div class="hr-line-dashed"></div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    <div class="text-center">
                       <?php echo e($articles->appends($_GET)->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>







<?php $__env->startSection('style'); ?>

<style>
    .ibox-content {
        background-color: #FFFFFF;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #E7EAEC;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0px;
    }

    .search-form {
        margin-top: 10px;
    }

    .search-result h3 {
        margin-bottom: 0;
        color: #1E0FBE;
    }

    .search-result .search-link {
        color: #006621;
    }

    .search-result p {
        font-size: 12px;
        margin-top: 5px;
    }

    .hr-line-dashed {
        border-top: 1px dashed #E7EAEC;
        color: #ffffff;
        background-color: #ffffff;
        height: 1px;
        margin: 20px 0;
    }

    h2 {
        font-size: 24px;
        font-weight: 100;
    }

</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/frontend/search.blade.php ENDPATH**/ ?>