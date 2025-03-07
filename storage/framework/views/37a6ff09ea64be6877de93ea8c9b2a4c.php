<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4 text-center">Onze Producten</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                <div class="card-image" style="height: 200px; overflow: hidden;">
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Product Image" class="w-100 h-100 object-fit-cover">
                </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="text-muted"><?php echo e($product->merk); ?></p>
                        <p class="card-text">€<?php echo e($product->price); ?></p>
                        <p class="card-text"><?php echo e($product->description); ?></p>
                        <p class="card-text"><?php echo e($product->categorie); ?></p>
                        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-primary">Bekijk Product</a>
                        <a href="<?php echo e(route('products.edit', $product->id)); ?>"class="btn btn-primary">Pas product aan</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Webshop\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>