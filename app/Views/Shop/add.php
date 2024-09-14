<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้า</title>
    <style>
        .product-name {
            flex-grow: 1;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        h1 {
            margin-top: 5%;
            margin-bottom: 3%;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>ตะกร้าสินค้า <i class="fas fa-shopping-cart" style="font-size: 1.8rem; color:red;"></i></h1>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <ul class="list-group mb-4">
    <?php if (empty($products)) : ?>
        <li class="list-group-item">ยังไม่มีสินค้าที่เลือกในตะกร้า</li>
    <?php else : ?>
        <?php foreach ($products as $index => $product) : ?>
            <li class="list-group-item d-flex align-items-center">
                <img src="<?= base_url($product['image']); ?>" alt="<?= esc($product['name']); ?>" style="width: 50px; height: auto; margin-right: 10px;">
                <div class="product-name" style="flex-grow: 1; text-align: left; margin-right: 10px;">
                    <?= esc($product['name']); ?>
                </div>
                <div class="product-price" style="margin-right: 10px; text-align: right;">
                    <?= esc(number_format($product['price'], 2)); ?> บาท
                </div>
                <button type="button" class="btn btn-danger" onclick="removeProduct(<?= esc($product['product_id']); ?>)">นำออก</button>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
        <div class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="<?= base_url('shop'); ?>">เลือกสินค้าต่อ</a>

            <div>
                <?php
                $total = 0;
                foreach ($products as $product) {
                    $total += $product['price'];
                }
                ?>
                <span>ราคารวมทั้งหมด: <?= number_format($total, 2); ?> บาท</span>
                <button class="btn btn-success">สั่งซื้อสินค้า</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function removeProduct(productId) {
            Swal.fire({
                title: 'ยืนยันการนำออก?',
                text: "คุณต้องการนำสินค้านี้ออกจากตะกร้า!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ใช่, นำออก!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`<?= base_url('shop/remove/'); ?>${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire('สำเร็จ!', 'สินค้าถูกลบออกจากตะกร้าแล้ว.', 'success')
                            .then(() => location.reload()); // โหลดหน้าใหม่เพื่ออัปเดตตะกร้า
                        } else {
                            Swal.fire('ผิดพลาด!', 'ไม่สามารถลบสินค้าจากตะกร้าได้.', 'error');
                        }
                    });
                }
            });
        }
    </script>

</body>

</html>
