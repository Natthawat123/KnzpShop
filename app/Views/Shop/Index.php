<div class="container">
    <b>
        <h1 class="text-danger">CRYBABY × Powerpuff Girls</h1>
    </b> <br>
    <div class="container row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <?php foreach ($products as $product) : ?>
            <div class="col">
                <div class="card h-100 product-card" style="width: 290px;">
                    <?php if ($product['image'] != '' && file_exists($product['image'])) : ?>
                        <img src="<?= $product['image']; ?>" class="card-img-top" alt="รูปภาพ">
                    <?php endif ?>
                    <div class="card-body">
                        <b>
                            <h5 class="card-title text-success"><?= $product['name']; ?></h5>
                        </b>
                        <b>
                            <h6 class="card-text"><?= $product['description']; ?></h6>
                        </b> <br>
                        <h5 class="text-danger"><?= number_to_currency($product['price'], 'THB', 'th-TH'); ?></h5>
                    </div>


                    <?php if (!isset($_SESSION['user_id'])) : ?>
                        <!-- <p class="text-danger">กรุณาลงชื่อเข้าสู่ระบบเพื่อเพิ่มสินค้าลงในตะกร้า</p> -->
                        <button onclick="showLoginAlert()" class="add-button">
                            <i class="fas fa-shopping-cart"></i> + เพิ่มลงในตะกร้า
                        </button>
                        <script>
                            function showLoginAlert() {
                                Swal.fire({
                                    title: 'กรุณาลงชื่อเข้าสู่ระบบ',
                                    text: 'เพื่อเพิ่มสินค้าลงในตะกร้า',
                                    icon: 'warning',
                                    confirmButtonText: 'ตกลง'
                                });
                            }
                        </script>
                    <?php else : ?>
                        <form id="add-to-cart-form" class="addToCart">
                            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                            <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                            <button type="submit" class="add-button w-100" onclick="">
                                <i class="fas fa-shopping-cart"></i> + เพิ่มลงในตะกร้า
                            </button>
                        </form>

                        <!-- <a href="<?= 'shop/add/' . $product['product_id']; ?>">เพิ่มลงในตะกร้า</a> -->
                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<!-- Bootstrap CSS and JS files -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- SweetAlert CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">



<style>
    .product-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
   document.querySelectorAll('.addToCart').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch('shop/add', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'เพิ่มลงตะกร้าสำเร็จ!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'ตกลง'
                    });
                } else {
                    Swal.fire({
                        title: 'เกิดข้อผิดพลาด!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด!',
                    text: 'มีบางอย่างผิดพลาด โปรดลองอีกครั้ง',
                    icon: 'error',
                    confirmButtonText: 'ตกลง'
                });
            });
    });
});

</script>