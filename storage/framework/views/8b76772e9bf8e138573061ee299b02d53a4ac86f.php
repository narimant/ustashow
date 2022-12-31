<div class="mb-5">
    <div class="card">
        <div class="card-body">
            <!-- Comment form-->
            <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(auth()->guard()->check()): ?>

                <form class="mb-4" method="post" action="<?php echo e(route('comment.send')); ?>">
                    <textarea class="form-control" name="comment" rows="3" placeholder="<?php echo e(__('messages.Join the discussion and leave a comment!')); ?>"></textarea>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="parent_id" value="0">

                    <input type="hidden"  name="commentable_id" value="<?php echo e($subject->id); ?>">
                    <input type="hidden"  name="commentable_type" value="<?php echo e(get_class($subject)); ?>">
                    <button class="btn btn-primary mt-3">
                        <?php echo e(__('messages.Send Comment')); ?>

                    </button>
                </form>
            <?php else: ?>
                <div class="alert alert-danger" role="alert"><?php echo app('translator')->get('messages.commentnotlogin'); ?> </div>
        <?php endif; ?>



        <!-- Comment with nested comments-->

            <!-- Single comment-->
           <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex border-bottom pb-4 mb-4">
                    <!-- Parent comment-->

                        <img class="rounded-circle avatar-lg" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />

                    <div class="ms-3">
                        <div class="fw-bold"><?php echo e($comment->user->name); ?>

                            <?php if(auth()->guard()->check()): ?>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#sendCommentModal" data-name="<?php echo e($comment->user->name); ?>"
                                    data-parent="<?php echo e($comment->id); ?>">
                                response
                            </button>
                            <?php endif; ?>
                        </div>

                    <?php echo $comment->comment; ?>

                        <?php if(count($comment->comments)>0): ?>
                            <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Child comment 1-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold"><?php echo e($comment_child->user->name); ?></div>
                                            <?php echo $comment_child->comment; ?>

                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <?php endif; ?>

                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>




<!-- Modal -->



<div class="modal fade" id="sendCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('messages.New message')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/comment">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" id="parent_id" name="parent_id" value="0">
                        <input type="hidden" name="commentable_id" value="<?php echo e($subject->id); ?>">
                        <input type="hidden" name="commentable_type" value="<?php echo e(get_class($subject)); ?>">


                    <div class="mb-3">
                        <label for="message-text" class="col-form-label"><?php echo e(__('messages.Message')); ?>:</label>
                        <textarea class="form-control" id="message-text" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('messages.Send message')); ?></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('messages.Close')); ?></button>

            </div>
        </div>
    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script>
        var exampleModal = document.getElementById('sendCommentModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-name')
            var parent_id = button.getAttribute('data-parent')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var x = document.getElementById("parent_id");
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient;
            x.value=parent_id;

        })
    </script>
<?php $__env->stopSection(); ?>


<?php /**PATH C:\ustashow\ustashow\resources\views/frontend/frontendlayout/comments.blade.php ENDPATH**/ ?>