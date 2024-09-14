<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top rounded container-fluid bg-danger bm-5">
    <div class="px-5 gap-3 container-fluid shadow p-3 bg-body-tertiary">
        <a class="navbar-brand mx-3 bg-danger rounded text-white px-1 fw-bold" href="<?= base_url(); ?>">KNZP SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menubar" aria-controls="menubar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fw-bold" id="menubar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>home">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url(); ?>shop">สินค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url(); ?>about/contact">ข้อมูลติดต่อ</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (session()->get('logged_in')) : ?>
                    <?php if (session()->get('role') == 'admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>user">จัดการผู้ใช้</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>product">จัดการสินค้า</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $loggedUser['name']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-danger fw-bold" href="<?= base_url(); ?>logout">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item position-relative mx-3">
                            <a class="nav-link" href="<?= base_url(); ?>shop/add">
                                ตะกร้าสินค้า
                                <i class="fas fa-shopping-cart position-relative"></i>
                                <?php if (isset($itemCount) && $itemCount > 0) : ?>
                                    <span class="position-absolute top-3 left-4 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                        <?= $itemCount > 99 ? '99+' : $itemCount; ?>
                                        <span class="visually-hidden">สินค้าที่เลือกแล้ว</span>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $loggedUser['name']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-danger fw-bold" href="<?= base_url(); ?>logout">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>login">เข้าสู่ระบบ</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>