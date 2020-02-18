<div class="heading my-4">
    <h1 class="text-center">More About Specific Model</h1>
</div>
<div class="flex-grid-modelBodyworkCar">
    <div class="col py-4">
        <?php
        $modelBodyworkCar = $data['modelBodyworkCar'];
        $description = $data['description'];
        ?>

        <h4>-<?= $modelBodyworkCar->name ?>-</h4>
        <img src="<?= $modelBodyworkCar->path ?>" alt="<?= $modelBodyworkCar->alt ?>" />
        <p><span>Emission Class: </span> <?= $description[0] ?></p>
        <p><span>Drive: </span> <?= $description[1] ?></p>
        <p><span>Transmission: </span> <?= $description[2] ?></p>
        <p><span>Fuel: </span><?= $description[3] ?></p>
        <p><span>Price: </span> <?= $modelBodyworkCar->price ?> &euro;</p>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']->idRole === '1') : ?>
            <button type="button" data-id="<?= $modelBodyworkCar->idCar ?>" class="btn btn-success mt-4 py-2 px-3"><a href="index.php?page=scheduleTest" class="btnTest">Schedule Test</a></button>
        <?php endif; ?>

        <?php if (!isset($_SESSION['user'])) :
            echo ("<b class='redTxt'>If You want to schedule a test, you must login.</b>");
        endif; ?>

    </div>
</div>