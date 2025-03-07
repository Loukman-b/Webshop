<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Beheerder pagina</h1>
    <h2>Product aanmaken</h2>

    <form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea name="description" cols="30" rows="10" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Prijs</label>
            <input type="number" min="0" step="any" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Inhoud</label>
            <input type="number" name="content" step="any" min="0" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categorie</label>
            <input type="number" name="category_id" class="form-control" required>
        </div>       

        <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" name="image" class="form-control" >
        </div>

        <div class="form-group">
            <label for="scent_similarities">Geur overeenkomsten</label>
            <input type="text" name="scent_similarities" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stock">Voorraad</label>
            <input type="number" name="stock" min="0" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Annuleer</a>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Webshop\resources\views/dashboard/products/create.blade.php ENDPATH**/ ?>