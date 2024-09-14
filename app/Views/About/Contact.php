<style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,200;0,400;1,400&display=swap');

    * {
        font-family: 'Prompt', sans-serif;
    }

    .m {
        margin-top: 85px;
    }

    .cen {
        align-items: center;
        display: flex;
        justify-content: center;
        height: 70vh;
    }

    .bor {
        border: blueviolet double 2px;
        border-radius: 50%;
    }

    /* ----------------------------------------------- */
    .card1 {
        position: relative;
        width: 240px;
        height: 314px;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: end;
        padding: 12px;
        gap: 12px;
        border-radius: 8px;
        cursor: pointer;
    }

    .card1::before {
        content: '';
        position: absolute;
        inset: 0;
        left: -5px;
        margin: auto;
        width: 250px;
        height: 324px;
        border-radius: 10px;
        background: linear-gradient(-45deg, #e81cff 0%, #40c9ff 100%);
        z-index: -10;
        pointer-events: none;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card1::after {
        content: "";
        z-index: -1;
        position: absolute;
        inset: 0;
        background: linear-gradient(-45deg, #fc00ff 0%, #00dbde 100%);
        transform: translate3d(0, 0, 0) scale(0.95);
        filter: blur(20px);
    }

    .heading {
        font-size: 20px;
        text-transform: capitalize;
        font-weight: 700;
    }

    .card1 p:not(.heading) {
        font-size: 14px;
    }

    .card1 p:last-child {
        color: #e81cff;
        font-weight: 600;
    }

    .card1:hover::after {
        filter: blur(30px);
    }

    .card1:hover::before {
        transform: rotate(-90deg) scaleX(1.34) scaleY(0.77);
    }
</style>

<body class="bg-dark">
    <div class="m"></div>
    <div class="row  cen">

        <div class="col-lg-5 cen">
            <div class="card1 ">
                <div class="cen pt-5 ">
                    <img src="https://scontent.fbkk17-1.fna.fbcdn.net/v/t39.30808-1/317836414_1829473120749227_5783237704111842724_n.jpg?stp=dst-jpg_p200x200&_nc_cat=106&ccb=1-7&_nc_sid=0ecb9b&_nc_eui2=AeH1pjE5vnQpr9rHQ1srjmaal-oUtu01Bp-X6hS27TUGn76cAlOlqPNLc7TVicEyyraFVMq0ap5z4-OQJkLZsspF&_nc_ohc=IOoPiE4VUz8Q7kNvgG8X8FP&_nc_ht=scontent.fbkk17-1.fna&oh=00_AYD2u7W0Dp820oT8d3L3PWhnLmfg_VoFPTcNWjWtoWSJ_w&oe=66A67AB7" alt="" class="rounded-circle w-50 bor">
                </div>

                <p class="heading text-center text-primary">
                    นายณภัทร ลอนุ
                </p>
                <p class="text-danger text-center">644230009</p>
                <div class="icon cen gap-3 mb-3">
                    <a href="https://www.facebook.com/pondnap31" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-facebook fa-spin fa-xl " style="color: #315eaa;"></i>
                    </a>

                    <a href="https://www.instagram.com/pond_np31" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-instagram fa-spin fa-xl" style="color: #ec4b4b;"></i>
                    </a>

                    <a href="https://github.com/Pond32145" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-github fa-spin fa-xl text-white" style="color: #ccc;"></i>
                    </a>
                    <a href="https://www.tiktok.com/@pond_np31" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-tiktok fa-spin fa-xl" style="color: #ccc;"></i>
                    </a>


                </div>
            </div>
        </div>
        <div class="col-lg-5 cen">
            <div class="card1 ">
                <div class="cen pt-5 mt-3">
                    <img src="https://scontent.fbkk17-1.fna.fbcdn.net/v/t39.30808-1/395269827_1069910970665312_1677426715317763225_n.jpg?stp=dst-jpg_s200x200&_nc_cat=100&ccb=1-7&_nc_sid=0ecb9b&_nc_eui2=AeGzv4X_oZCBm2R5qt6vUYvUbC6SM899R11sLpIzz31HXcaGa5qhvqcyAGjdxML7rwBv-EnPL5_4heb-P5xjThV3&_nc_ohc=AjSUJOhJzOMQ7kNvgG5qUGi&_nc_ht=scontent.fbkk17-1.fna&oh=00_AYAkDHO-giOY_e7HxnRdp2X_f-oryLrcUjZeFdqu8aMNqg&oe=66A6905A" alt="" class="rounded-circle w-50 bor">
                </div>

                <p class="heading text-center text-primary">
                    นายณัฐวัฒน์ <br> หิรัญวงษ์
                </p>
                <p class="text-danger text-center">644230057</p>
                <div class="icon cen gap-3 mb-3">
                    <a href="https://www.facebook.com/kankirito12345?locale=th_TH" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-facebook fa-spin fa-xl " style="color: #315eaa;"></i>
                    </a>

                    <a href="https://www.instagram.com/kaow_tnt/" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-instagram fa-spin fa-xl" style="color: #ec4b4b;"></i>
                    </a>

                    <!-- <a href="" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-github fa-spin fa-xl text-white" style="color: #000000;"></i>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>