<?php
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];

    $query = "
        SELECT DISTINCT ?name ?category ?thumbnail ?island WHERE {
            ?d a destinesia:tour;
                 rdfs:label           ?name;
                 destinesia:province  ?province;
                 destinesia:location  ?location;
                 destinesia:category  ?category;
                 destinesia:thumbnail ?thumbnail;
                 destinesia:island    ?island .
            FILTER ( REGEX (?name, '$keyword', 'i') ||
                     REGEX (?province, '$keyword', 'i') ||
                     REGEX (?location, '$keyword', 'i') ||
                     REGEX (?category, '$keyword', 'i') ||
                     REGEX (?island, '$keyword', 'i')) .
        }
        ORDER BY ?name
    ";

    $result = $sparqlJena->query($query);
} else {
    $query = "
        SELECT DISTINCT ?name ?category ?thumbnail ?island WHERE {
            ?d a destinesia:tour;
                 rdfs:label           ?name;
                 destinesia:category  ?category;
                 destinesia:thumbnail ?thumbnail;
                 destinesia:island    ?island .
        }
        ORDER BY ?name
    ";

    $result = $sparqlJena->query($query);
}
?>
<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Find Destination</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Find Destination</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<!-- Search Start -->
<div class="container-fluid booking mt-5">
    <div class="container pb-5">
        <div class="bg-light shadow" style="padding: 30px;">
            <form method="POST">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 mb-md-0">
                                    <div class="" id="" data-target-input="nearest">
                                        <div class="input-group">
                                            <input name="keyword" type="text" class="form-control p-4 datetimepicker-input" placeholder="Find Destination" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button name="cari" class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search End -->


<!-- Blog Start -->
<div class="container-fluid py-2">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-3">
                    <?php if (!isset($result->current()->name)) : ?>
                        <div class="not-found-2">Data is not found!</div>
                    <?php else : ?>
                        <?php foreach ($result as $data) : ?>
                            <div class="col-lg-4 md-4 mb-4 pb-2">
                                <div class="blog-item">
                                    <div class="position-relative">
                                        <img class="img-fluid w-100" style="height: 250px;" src="<?= $data->thumbnail ?>" alt="">
                                    </div>
                                    <div class="bg-white p-4">
                                        <div class="d-flex mb-2">
                                            <a class="text-primary text-uppercase text-decoration-none" href="?p=category&keyword=<?= $data->category ?>"><?= $data->category ?></a>
                                            <span class="text-primary px-2">|</span>
                                            <span class="text-primary text-uppercase text-decoration-none"><?= $data->island ?></span>
                                        </div>
                                        <a class="h5 m-0 text-decoration-none" href="?p=single&keyword=<?= $data->name ?>"><?= $data->name ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <!-- <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-lg justify-content-center bg-white mb-0" style="padding: 30px;">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->