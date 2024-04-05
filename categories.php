<?php include('includes/header.php'); ?>

<body>
    <!-- bootstrap navbar -->
    <?php include('includes/navbar.php'); ?>

    <!-- <div class="alert alert-primary m-2" role="alert">
        A simple primary alert—check it out!
    </div> -->

    <h1 class="text-center p-5 ">Manage Catergories </h1>

    <div class="container-fuild d-flex justify-content-center">

        <div class="form">
            <div class="form-control">
                <div class="input-group p-3">
                    <input type="text" class="form-control" name="category" placeholder="Add New Category" required>
                    <input type="button" class="btn btn-outline-danger" name="submit_category" value="Add Category">
                </div>
            </div>
        </div>

    </div>

    <!-- custom card -->

    <div class="container col-md-6 p-5">
        <div class="row">
            <div class="col-12 mb-6">
                <h3 class="mb-4">Featured Categories</h3>
            </div>
        </div>
        <!-- <div id="output">
        </div> -->
        <div class="category-slider" id="category_cards">

            <div class="card mb-2">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <div class="form-control input-group">
                            <input type="text" class="form-control" value="category name here" placeholder="Edit here">
                            <input type="submit" class="btn btn-warning" value="Edit">
                        </div>
                        <!-- <p class="card-text">A well-known quote.
                        <p class="card-text text-end">
                            <a href="#" class="card-link">Edit</a>
                            <input type="button" class="btn btn-warning" value="submit">
                            <a href="#" class="card-link">Delete</a>
                        </p>
                        </p> -->
                        <!-- <footer class="blockquote-footer">11-3-2024 <cite title="Source Title">Ago</cite></footer> -->
                    </blockquote>
                </div>
            </div>
            <!-- <div class="card mb-2">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="card-text">A well-known quote.
                        <p class="card-text text-end">
                            <a href="#" class="card-link">Edit</a>
                            <input type="button" class="btn btn-warning" value="submit">
                            <a href="#" class="card-link">Delete</a>
                        </p>
                        </p>
                        <footer class="blockquote-footer">11-3-2024 <cite title="Source Title">Ago</cite></footer>
                    </blockquote>
                </div>
            </div> -->

            <div class="card mb-2">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="card-text">A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer">11-3-2024 <cite title="Source Title">Ago</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <script>
        $(document).ready(function() {
            loadCategories();
            init();
            // console.log('Load Category Page Jquery');
            // loadCategory();
        });
    </script>
    <?php include('includes/footer.php'); ?>