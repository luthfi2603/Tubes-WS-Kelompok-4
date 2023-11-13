<?php
    $query = "
        SELECT DISTINCT ?kategori WHERE {
            ?d a destinesia:wisata;
                 destinesia:kategori  ?kategori .
        }
        ORDER BY ?kategori
    ";
    $result = $sparqlJena->query($query);
?>
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="./assets/img/1.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">DESTINESIA : </h4>
                        <h1 class="display-3 text-white mb-md-4">Wisata Ajaibnya Indonesia</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="./assets/img/3.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">DESTINESIA</h4>
                        <h1 class="display-3 text-white mb-md-4">Jelajahi Keindahan Indonesia</h1>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->

<!-- Destination Category Start -->
<div class="container-fluid py-0">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destinesia</h6>
            <h1>Kategori Wisata Indonesia</h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach($result as $data) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="https://source.unsplash.com/350x219?<?= $data->kategori ?>" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="?p=category&keyword=<?= $data->kategori ?>">
                            <h3 class="text-white" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><?= $data->kategori ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Destination Category End -->

<!-- Feature Start -->
<div class="container-fluid pt-5">
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-route text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Lokasi Yang Akurat</h5>
                        <p class="m-0">Kami menjelaskan setiap destinasi wisata dengan titik koordinatnya di maps.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-award text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Best Services</h5>
                        <p class="m-0">Kami berkomitmen dalam memberikan data serta informasi yang benar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-globe text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Meyeluruh</h5>
                        <p class="m-0">Website ini mencakup semua destinasi dari semua pulau di seluruh Indonesia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->