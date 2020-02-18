<div class="container">
    <div class="row table-responsive">
        <table class="table table-stripped table-bordered table-hover my-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Setup</th>
                </tr>
            </thead>
            <tbody id="tableCars">

            </tbody>
        </table>
    </div>

    <div class="row mb-3">
        <div id="updateInfo">
            <form action="index.php?page=updateCar" method="POST" enctype="multipart/form-data">
                <!-- Car name -->
                <div class="form-group">
                    <input type="text" name="tbCarName" id="tbCarName" placeholder="Car name" class="form-control" />
                </div>

                <!-- Car price -->
                <div class="form-group">
                    <input type="text" name="carPrice" id="carPrice" placeholder="Price" class="form-control" />
                </div>

                <!-- Car image -->
                <img src="" alt="" id="emptyImage" name="emptyImage" />
                <div class="form-group">
                    <label for="carImage">Car image: </label>
                    <input type="file" name="carImage" id="carImage" />
                </div>
                <input type="hidden" name="srcImage" id="srcImage" class="form-control" />

                <input type="submit" value="Update" name="btnUpdateCar" id="btnUpdateCar" class="btn btn-success" />
            </form>
        </div>
    </div>

    <div class="updateResponse">
        <?php
        if (isset($_SESSION['updateSession'])) {
            $errUpdate = $_SESSION['updateSession'];

            echo "<p>$errUpdate</p>";

            unset($_SESSION['updateSession']);
        }
        ?>
    </div>
</div>