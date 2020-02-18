<div class="heading my-4">
    <h1 class="text-center">More About Specific Model</h1>
</div>

<?php
    $oneImage = $data['image'];
    $bodywork = $data['bodywork'];
    $modelBodyworkCar = $data['modelBodyworkCar'];
?>

<div class="flex-grid-one-model">
    <div class="col">
        <img src="<?= $oneImage->path ?>" alt="<?= $oneImage->alt ?>" />
        <h2 class="text-center font-weight-bold"><?= $oneImage->name ?></h2>
    </div>
</div>

<hr class="bold-line" />

<div class="flex-grid-bodyworks">
    <h3 class="text-center font-weight-bold"><?= $oneImage->name ?> and bodyworks</h3>

    <a href="index.php?page=carOne&idModelBodywork=<?= $modelBodyworkCar->idCar ?>">
        <img src="<?= $oneImage->miniImage ?>" alt="<?= $oneImage->alt ?>" class="scaling-img" />
        <p class="text-center">
            <?php
            $string = $oneImage->name;
            $search = "Model";
            $trimmed = str_replace($search, "", $string);
            echo $trimmed; ?>
        </p>
    </a>

    <a href="index.php?page=carTwo&idBodyworkModel=<?= $modelBodyworkCar->idCar ?>">
        <img src="<?= @$bodywork->miniImage ?>" class="scaling-img" />
        <p class="text-center"><?= @$bodywork->name ?></p>
    </a>

</div>