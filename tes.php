<?php error_reporting(E_ALL & ~E_DEPRECATED); ?>

<?php


require_once realpath(__DIR__ . '/.') . "/vendor/autoload.php";

// Setup some additional prefixes for DBpedia
\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/terms/');
\EasyRdf\RdfNamespace::set('destinesia', 'https://example.org/schema/destinesia');


$sparql = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');
$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/destinesia/sparql');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Web Semantik</title>
</head>

<body>
    <h1 style="text-align: center;">Tabel Web Semantik</h1>
    <?php

    $q = 'SELECT DISTINCT *  WHERE {
        ?d rdf:type destinesia:wisata;
           destinesia:id ?id;
           rdfs:label ?nama;
           destinesia:abstract ?abst;
           destinesia:provinsi ?prov;
           destinesia:kota     ?kota;
           destinesia:kategori ?kategori;
           destinesia:thumbnail ?thumbnail;
           foaf:homepage ?home.
           }
    ORDER BY xsd:integer(?id)';




    $result = $sparql_jena->query($q);


    ?>
    <table border="1" style="width: 100%;">
        <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Abstract</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Kategori</th>
            <th>Thumbnail</th>
            <th>Homepage</th>
        </tr>
        <?php foreach ($result as $data) : ?>
            <tr>
                <td><?= $data->id ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->abst ?></td>
                <td><?= $data->prov ?></td>
                <td><?= $data->kota ?></td>
                <td><?= $data->kategori ?></td>
                <td><img src="<?= $data->thumbnail ?>" width=50%></td>
                <td><?= $data->home ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>