<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

function getData($url){
    $result = file_get_contents($url); //hacer un get a un api 

    $data = json_decode($result, true);

    return $data;
}

$data = getData(API_URL);

?>

<head>
    <title> La proxima pelicula de marvel</title>
    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<main>
    <section>
        <h1>La proxima pelicula de Marvel</h1>
        <img src="<?= $data["poster_url"]; ?> " width="300px" all="Poster de  <?= $data["title"]; ?>"
            style="border-radius: 16px " />

        <h3>
            <?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?> dias
        </h3>
        <p> Fecha de estreno: <?= $data['release_date']; ?></p>
        <p> la siguiente es: <?= $data["following_production"]["title"] ?></p>
    </section>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    img {
        display: flex;
        justify-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
</style>