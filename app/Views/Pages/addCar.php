<h2 class="text-center my-4">Insert new car</h2>
<div class="row justify-content-center my-4">
    <form action="index.php?page=insertCar" method="POST" enctype="multipart/form-data">

        <select name="ddlBodywork" id="ddlBodywork" class="custom-select mb-3">
            <option value="0">Choose Bodywork</option>
            <?php
            $bodyworks = $data['bodyworks'];

            foreach ($bodyworks as $bw) : ?>
                <option value="<?= $bw->idBodywork ?>"><?= $bw->name ?></option>
            <?php endforeach; ?>

        </select>

        <select name="ddlModels" id="ddlModels" class="custom-select mb-3">
            <option value="0">Choose Models</option>
            <?php
            $models = $data['models'];
            foreach ($models as $model) : ?>
                <option value="<?= $model->idModel ?>"><?= $model->name ?></option>
            <?php endforeach; ?>
        </select>

        <div class="form-group">
            <input type="text" class="form-control" name="insertName" id="tbCarName" placeholder="Car name">
        </div>

        <div class="form-group">
            <textarea name="insertDescription" id="insertDescription" rows="10" placeholder="Car Description"></textarea>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="insertPrice" id="carPrice" placeholder="Price">
        </div>

        <div class="form-group">
            <label>Car Image : &nbsp;</label>
            <!-- userfile -->
            <input type="file" name="carImage" id="carImage">
        </div>
        <img src="" id="emptyImage" width="120px" />


        <input type="submit" value="Add" name="insertButton" id="insertButton" class="btn btn-success">


        <input type="hidden" name="tbHidden" id="tbHidden" class=form-control>

        <input type="hidden" name="miniImage" id="miniImage" class=form-control>
        <input type="hidden" name="newImage" id="newImage" class=form-control>
    </form>
</div>