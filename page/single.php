<?php
$keyword = $_GET['keyword'];

$query = "
    SELECT DISTINCT ?name ?abstract ?province ?location ?category ?thumbnail ?island ?home WHERE {
        ?d a destinesia:tour;
             rdfs:label           ?name;
             destinesia:abstract  ?abstract;
             destinesia:province  ?province;
             destinesia:location  ?location;
             destinesia:category  ?category;
             destinesia:thumbnail ?thumbnail;
             destinesia:island    ?island;
             foaf:homepage        ?home .
        FILTER(?name = '$keyword') .
    }
";

$result = $sparqlJena->query($query)->current();

$mapQuery = '
    SELECT DISTINCT * WHERE {
        dbr:' . str_replace(' ', '_', $keyword) . ' geo:lat  ?lat;
                                                    geo:long ?long .
    }
';

$result2 = $sparqlDbPedia->query($mapQuery)->current();

if (!empty($result->home)) {
    \EasyRdf\RdfNamespace::setDefault('og');
    $wiki = \EasyRdf\Graph::newAndLoad($result->home);
    $fotoURL = $wiki->image;

    if($fotoURL == NULL){
        $fotoURL = './assets/img/3.png';
    }
}
?>
<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Detail of Destination</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Detail of Destination</p>
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
                            <a class="text-primary text-uppercase text-decoration-none" href="?p=category&keyword=<?= $result->category ?>"><?= $result->category ?></a>
                        </div>
                        <h2 class="mb-3"><?= $result->name ?></h2>
                        <div><?= $result->abstract ?></div>
                        <div class="mt-4">
                            <?php if($result2) : ?>
                                <iframe width="100%" height="376.875px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?= $result2->lat ?>,<?= $result2->long ?>&hl=en&z=14&amp;output=embed"></iframe>
                            <?php else : ?>
                                <img src="./assets/img/logo-lokasi-tidak-diketahui.png" alt="" width="100px">
                            <?php endif ?>
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
                                    <td>Island</td>
                                    <td><?= $result->island ?></td>
                                </tr>
                                <tr>
                                    <td width="100px">Province</td>
                                    <td><?= $result->province ?></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td><?= $result->location ?></td>
                                </tr>
                            </table>
                            <span style="position: relative;" class="py-2">
                                <div class=" row justify-content-center mt-2">
                                    <div class="destination-item position-relative overflow-hidden mb-2 w-75">
                                        <img class="img-fluid" src="<?= $fotoURL ?>" alt="">
                                        <a class="destination-overlay text-white text-decoration-none" href="<?= $result->home ?>">
                                            <h6 class="text-white" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration:underline;">For more infos click here</h6>
                                        </a>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->