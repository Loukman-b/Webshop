

<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Welkomstbericht -->
    <div class="text-center my-5">
        <h1 class="display-4">Welkom bij Scentique!</h1>
        <p class="lead">Bekijk onze producten en plaats een bestelling eenvoudig.</p>
    </div>

    <!-- Flash-melding voor succesvolle acties -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Productweergave -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-image" style="height: 200px; overflow: hidden;">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="text-muted"><?php echo e($product->merk); ?></p>
                        <p class="card-text">€<?php echo e($product->price); ?></p>
                        <p class="card-text"><?php echo e($product->description); ?></p>

                        <!-- Bestelknop met formulier -->
                        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" name="product_name" value="<?php echo e($product->name); ?>">
                            <input type="hidden" name="product_price" value="<?php echo e($product->price); ?>">
                            <button type="submit" class="btn btn-primary">Voeg toe aan winkelwagen</button>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Webshop\resources\views/homepage.blade.php ENDPATH**/ ?>