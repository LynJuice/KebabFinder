<div x-data="map()">
    <div x-ref="map" class="map h-[600px] border border-slate-300 rounded-md shadow-lg">
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('e8ea9494-3876-4738-800b-77e9bbacc5d1')): $__env->markAsRenderedOnce('e8ea9494-3876-4738-800b-77e9bbacc5d1'); ?>
    <?php $__env->startPush('styles'); ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/components/map.css']); ?>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/components/map.js']); ?>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\KebabFinder\KebabFinder\resources\views/components/map.blade.php ENDPATH**/ ?>