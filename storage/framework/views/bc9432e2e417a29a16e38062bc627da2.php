<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4 text-center">Product Details</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-image" style="height: 200px; overflow: hidden;">
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Product Image" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                    <p class="text-muted"><strong>Merk:</strong> <?php echo e($product->merk); ?></p>
                    <p><strong>Prijs:</strong> €<?php echo e($product->price); ?></p>
                    <p class="card-text"><strong>Beschrijving:</strong> <?php echo e($product->description); ?></p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary">Pas product aan</a>
                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="submit" value="Verwijderen" class="btn btn-danger">
                    </form>
                    <a href="<?php echo e(route('products.index', $product->id)); ?>" class="btn btn-secondary">Annuleer</a>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Webshop\resources\views/dashboard/products/show.blade.php ENDPATH**/ ?>