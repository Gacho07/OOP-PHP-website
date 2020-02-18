    <div class="container-fluid bg-d footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 align-self-center">
                    <a href="https://www.linkedin.com/in/marko-gacanovic-4a133016a/" class="icon-link">
                        <i class="fab fa-linkedin fa-3x"></i>
                    </a>
                    <a href="https://www.facebook.com" class="icon-link">
                        <i class="fab fa-facebook fa-3x"></i>
                    </a>
                    <a href="https://github.com/MarkoGachanovic/Skoda" class="icon-link">
                        <i class="fab fa-github fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-4 align-self-center">
                    <p class="text-white mt-4">Website made by <a href="#" class="author-link">Marko Gačanović</a></p>
                </div>
                <div class="col-12 col-md-4 text-right align-self-center">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=carModels">Models</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Documentation.docx">Documentation</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script src="app/assets/js/main.js"></script>

    <?php
    if ($_SERVER['REQUEST_URI'] == "/Skoda/index.php?page=adminHome") {
        echo "<script src=\"https://canvasjs.com/assets/script/canvasjs.min.js\"></script>";
    }
    ?>

    </body>

    </html>