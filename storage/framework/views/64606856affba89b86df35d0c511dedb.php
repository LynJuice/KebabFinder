<?php if(auth()->id()): ?>
    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <div class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                <i class="fas fa-sign-out-alt"></i>

                <?php echo e(__('Log Out')); ?>

            </a>
        </div>
    </form>
<?php else: ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('login')); ?>" role="button">
            <i class="fas fa-sign-in-alt"></i>
            Login
        </a>
    </li>
<?php endif; ?><?php /**PATH C:\KebabFinder\KebabFinder\resources\views/logout.blade.php ENDPATH**/ ?>