<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Beheer Gebruikers</h1>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <form action="<?php echo e(route('admin.updateUsers')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Beheerder</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <input type="hidden" name="users[<?php echo e($user->id); ?>][id]" value="<?php echo e($user->id); ?>">
                        <input type="checkbox" name="users[<?php echo e($user->id); ?>][is_admin]" value="1" <?php echo e($user->is_admin ? 'checked' : ''); ?>>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Opslaan</button>
</form>

</div>
<?php $__env->stopSection(); ?>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Webshop\resources\views/admin/IsAdmin.blade.php ENDPATH**/ ?>