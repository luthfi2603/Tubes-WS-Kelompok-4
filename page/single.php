<?php
    $keyword = $_GET['keyword'];

    $query = "
        SELECT DISTINCT * WHERE {
            ?d a destinesia:wisata;
                 destinesia:id        ?id;
                 rdfs:label           ?nama;
                 destinesia:abstract  ?abst;
                 destinesia:provinsi  ?prov;
                 destinesia:kota      ?kota;
                 destinesia:kategori  ?kategori;
                 destinesia:thumbnail ?thumbnail;
                 foaf:homepage        ?home .
            FILTER(?nama = '$keyword') .
        }
    ";
    $result = $sparqlJena->query($query);
    $data = $result->current();
?>
<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Detail Destinasi</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Detail Destinasi</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-12">
                <!-- Blog Detail Start -->
                <div class="pb-3">

                    <div class="bg-white mb-3" style="padding: 30px;">
                        <div class="d-flex mb-3">
                            <a class="text-primary text-uppercase text-decoration-none" href="?p=category&keyword=<?= $data->kategori ?>"><?= $data->kategori ?></a>
                        </div>
                        <div class="blog-item py-2">
                            <div class="position-relative gambar-single">
                                <img class="img-fluid w-75" src="<?= $data->thumbnail ?>" alt="">
                            </div>
                        </div>


                        <h2 class="mb-3 mt-4"><?= $data->nama ?></h2>
                        <p><?= $data->abst ?></p>
                    </div>
                </div>
                <!-- Blog Detail End -->

            </div>
        </div>
    </div>
</div>
<!-- Blog End -->