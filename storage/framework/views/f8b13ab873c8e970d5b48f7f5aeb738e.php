<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Winkelwagen</h1>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(count($cartItems) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Prijs</th>
                        <th>Aantal</th>
                        <th>Totaal</th>
                        <th>Actie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-id="<?php echo e($item['id']); ?>">
                            <td><?php echo e($item['name']); ?></td>
                            <td>€<?php echo e(number_format($item['price'], 2)); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-secondary update-quantity" data-action="decrease">−</button>
                                <input type="number" class="quantity-input text-center" value="<?php echo e($item['quantity']); ?>" min="1" style="width: 50px;" readonly>
                                <button type="button" class="btn btn-sm btn-outline-secondary update-quantity" data-action="increase">+</button>
                            </td>
                            <td class="item-total">€<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></td>
                            <td>
                                <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($item['id']); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
        <div class="text-right">
            <h3>Totaal: <span id="cart-total">€<?php echo e(number_format($totalPrice, 2)); ?></span></h3>
        </div>
    <?php else: ?>
        <p>Je winkelwagen is leeg!</p>
    <?php endif; ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".update-quantity").forEach(button => {
        button.addEventListener("click", function() {
            let row = this.closest("tr");
            let productId = row.getAttribute("data-id");
            let input = row.querySelector(".quantity-input");
            let totalCell = row.querySelector(".item-total");
            let cartTotal = document.getElementById("cart-total");
            let pricePerItem = parseFloat(row.querySelector("td:nth-child(2)").textContent.replace("€", "").replace(",", "."));

            let currentQuantity = parseInt(input.value);
            let action = this.getAttribute("data-action");

            let newQuantity = action === "increase" ? currentQuantity + 1 : Math.max(1, currentQuantity - 1);
            input.value = newQuantity;

            // Update totaalprijs voor het item
            let newTotalPrice = (pricePerItem * newQuantity).toFixed(2);
            totalCell.textContent = "€" + newTotalPrice.replace(".", ",");

            // Stuur update naar de server via AJAX
            fetch("<?php echo e(route('cart.update')); ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
                },
                body: JSON.stringify({ product_id: productId, quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                // Update totaalbedrag winkelwagen
                cartTotal.textContent = "€" + data.newTotal.toFixed(2).replace(".", ",");
            })
            .catch(error => console.error("Fout bij updaten winkelwagen:", error));
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Webshop\resources\views/cart/index.blade.php ENDPATH**/ ?>