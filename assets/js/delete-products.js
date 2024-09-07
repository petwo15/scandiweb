document.getElementById('delete-product-btn').addEventListener('click', function() {
    var checkboxes = document.querySelectorAll('.delete-checkbox:checked');
    var productIds = [];

    checkboxes.forEach(function(checkbox) {
        productIds.push(checkbox.getAttribute('data-sku'));
    });

    if (productIds.length > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete-products.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                location.reload();
            }
        };

        xhr.send('productIds=' + productIds);
    }
});