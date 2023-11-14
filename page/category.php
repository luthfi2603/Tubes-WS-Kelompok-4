<?php
$keyword = $_GET['keyword'];

$query = "
    SELECT DISTINCT ?name ?category ?thumbnail ?island WHERE {
        ?d a destinesia:tour;
             rdfs:label           ?name;
             destinesia:category  ?category;
             destinesia:thumbnail ?thumbnail;
             destinesia:island    ?island .
        FILTER(?category = '$keyword') .
    }
";

$result = $sparqlJena->query($query);
?>
<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Category</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Category</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid py-4">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-primary">Category: <?= $keyword ?></h2>
                <div class="row py-3">
                    <?php foreach ($result as $data) : ?>
                        <div class="col-lg-4 md-4 mb-4 pb-2">
                            <div class="blog-item">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="<?= $data->thumbnail ?>" alt="">
                                </div>
                                <div class="bg-white p-4">
                                    <div class="d-flex mb-2">
                                        <span class="text-primary text-uppercase text-decoration-none"><?= $data->island ?></span>
                                    </div>
                                    <a class="h5 m-0 text-decoration-none" href="?p=single&keyword=<?= $data->name ?>"><?= $data->name ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Blog End -->