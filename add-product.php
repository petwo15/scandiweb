<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h1>Product Add</h1>
    <form id="product_form" method="POST" action="submit-product.php">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="productType">Type Switcher</label>
            <select class="form-control" id="productType" name="productType" required>
                <option value="" disabled selected>Select Type</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
            </select>
        </div>

        <!-- Dynamic Fields -->
        <div id="DVD" class="dynamic-field d-none">
            <div class="form-group">
                <label for="size">Size (MB)</label>
                <input type="number" class="form-control" id="size" name="size">
                <small class="form-text text-muted">Please provide the size of the DVD in MB.</small>
            </div>
        </div>

        <div id="Furniture" class="dynamic-field d-none">
            <div class="form-group">
                <label for="height">Height (CM)</label>
                <input type="number" class="form-control" id="height" name="height">
            </div>
            <div class="form-group">
                <label for="width">Width (CM)</label>
                <input type="number" class="form-control" id="width" name="width">
            </div>
            <div class="form-group">
                <label for="length">Length (CM)</label>
                <input type="number" class="form-control" id="length" name="length">
                <small class="form-text text-muted">Please provide dimensions in HxWxL format.</small>
            </div>
        </div>

        <div id="Book" class="dynamic-field d-none">
            <div class="form-group">
                <label for="weight">Weight (KG)</label>
                <input type="number" class="form-control" id="weight" name="weight">
                <small class="form-text text-muted">Please provide the weight of the book in KG.</small>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success"  >Save</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/main.js"></script>
