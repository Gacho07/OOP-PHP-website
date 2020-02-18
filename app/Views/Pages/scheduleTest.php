<main class="container" id="contact">
    <h2 class="text-center">Schedule Your Test Here</h2>
    <form class="w-75 mx-auto" method="POST">
        <div class="form-group">
            <label for="ddlCar">Your Wanted Car</label> <br />
            <select name="ddlCar" id="ddlCar" class="custom-select">
                <option value="0">Choose</option>
                <?php
                $car = $data['car'];
                foreach ($car as $c) :
                ?>
                    <option value="<?= $c->idCar ?>"><?= $c->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="tbName" name="tbName">
        </div>
        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="text" class="form-control" id="tbEmail" name="tbEmail">
        </div>
        <div class="form-group">
            <label for="content">Message</label>
            <textarea class="form-control" id="content" rows="8" name="taMessage"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" id="btnSchedule" name="btnSchedule" class="btn btn-success">Schedule</button>
        </div>
        <div id="notification">

        </div>
    </form>
</main>