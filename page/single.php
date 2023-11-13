<?php
    $keyword = $_GET['keyword'];

    $query = "
        SELECT DISTINCT ?nama ?abstract ?provinsi ?kota ?kategori ?thumbnail ?pulau ?home WHERE {
            ?d a destinesia:wisata;
                 rdfs:label           ?nama;
                 destinesia:abstract  ?abstract;
                 destinesia:provinsi  ?provinsi;
                 destinesia:kota      ?kota;
                 destinesia:kategori  ?kategori;
                 destinesia:thumbnail ?thumbnail;
                 destinesia:pulau     ?pulau;
                 foaf:homepage        ?home .
            FILTER(?nama = '$keyword') .
        }
    ";
    $result = $sparqlJena->query($query)->current();

    $mapQuery = '
        SELECT DISTINCT * WHERE {
            dbr:' . str_replace(' ', '_', ucwords($keyword)) . ' geo:lat  ?lat;
                                                                 geo:long ?long .
        }
    ';
    
    $result2 = $sparqlDbPedia->query($mapQuery)->current();
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
            <div class="col-lg-8">
                <div class="pb-3">
                    <div class="bg-white mb-3" style="padding: 30px; text-align: justify;">
                        <div class="d-flex mb-3">
                            <a class="text-primary text-uppercase text-decoration-none" href="?p=category&keyword=<?= $result->kategori ?>"><?= $result->kategori ?></a>
                        </div>
                        <h2 class="mb-3"><?= $result->nama ?></h2>
                        <div><?= $result->abstract ?></div>
                        <div class="mt-4">
                            <iframe width="100%" height="376.875px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?= $result2->lat ?>,<?= $result2->long ?>&hl=en&z=14&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pb-3">
                    <div class="bg-white mb-3" style="padding: 10px;">
                        <img class="w-100" src="<?= $result->thumbnail ?>" alt="">
                        <div class="p-2">
                            <table>
                                <tr>
                                    <td>Pulau</td>
                                    <td><?= $result->pulau ?></td>
                                </tr>
                                <tr>
                                    <td width="100px">Provinsi</td>
                                    <td><?= $result->provinsi ?></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td><?= $result->kota ?></td>
                                </tr>
                            </table>
                            <span>Untuk info lebih lanjut klik <a href="<?= $result->home ?>">di sini</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->