<style>
    .hover-effect img {
        transition: transform 0.3s ease-in-out;
    }

    .hover-effect img:hover {
        transform: scale(1.1);
    }
</style>
<div class="container ">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="https://prod-global-static.oss-us-east-1.aliyuncs.com/globalAdmin/1720575813564____pc-1-time____.jpg?x-oss-process=image/format,webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://prod-global-static.oss-us-east-1.aliyuncs.com/globalAdmin/1720575567681____pctime4____.jpg?x-oss-process=image/format,webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://prod-global-static.oss-us-east-1.aliyuncs.com/globalAdmin/1720579111820____pc-time____.jpg?x-oss-process=image/format,webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="my-4 container" style="margin-left: 15px;">
        <h2 class="text-warning-emphasis">แนะนำเซ็ตสินค้า</h2>

        <div class="container text-center">
    <div class="row g-lg-1">
        <div class="col-lg-6">
            <div class="pt-2 hover-effect">
                <a class="nav-link active" href="<?= base_url(); ?>shop">
                    <img src="https://inwfile.com/s-f/v6y9sg.jpg" class=" " style="width: 670px; height: 420px;" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="p-2 col-lg-12">
                    <div class="hover-effect">
                        <a class="nav-link active" href="<?= base_url(); ?>shop">
                            <img src="https://down-th.img.susercontent.com/file/th-11134207-7r98r-luvx16y2tzceb7" alt="" class="img-fluid" style="height: 200px; width: 510px; object-fit: cover;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="p-2 hover-effect">
                        <a class="nav-link active" href="<?= base_url(); ?>shop">
                            <img src="https://prod-thailand-res.popmart.com/default/20240708_141916_451321____6_____1200x1200.jpg" alt="" class="img-fluid" style="height: 200px; width: 510px; object-fit: cover;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap CSS and JS files -->

<style>
.hover-effect img {
    transition: transform 0.2s, box-shadow 0.2s;
}

.hover-effect img:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
</style>


    </div>


    <div>
        <div class="container">
            <b>
                <h1 class="text-danger">สินค้ายอดฮิต สุดปัง!!</h1>
            </b> <br>
            <div class="position-relative">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $chunks = array_chunk($products, 4); // Split the products array into chunks of 4
                        foreach ($chunks as $index => $chunk) : ?>
                        <a class="nav-link active" href="<?= base_url(); ?>shop">
                            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                <div class="row g-3">
                                    <?php foreach ($chunk as $product) : ?>
                                        <div class="col-6 col-sm-3">
                                            <div class="card" style="width: 270px;">
                                                <?php if ($product['image'] != '' && file_exists($product['image'])) : ?>
                                                    <img src="<?= $product['image']; ?>" class="card-img-top" alt="รูปภาพ">
                                                <?php endif ?>
                                                <div class="card-body">
                                                    <b>
                                                        <h6 class="card-title text-success"><?= $product['name']; ?></h6>
                                                    </b>
                                                    <b>
                                                        <h6 class="card-text"><?= $product['description']; ?></h6>
                                                    </b> <br>
                                                    <!-- <h5 class="text-danger"><?= number_to_currency($product['price'], 'THB', 'th-TH'); ?></h5> -->
                                                </div>
                                                <div class="overlay"></div> <!-- Overlay for hover effect -->
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </a>
                        <?php endforeach ?>
                    </div>
                </div>
                <button class="carousel-control-prev custom-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next custom-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>


    <style>
        .card {
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust transparency as needed */
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .overlay {
            opacity: 1;
        }
    </style>



</div>