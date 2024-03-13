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
        <div class="category-slider" id="category_cards">


            <div id="output">

            </div>

            <div class="card mb-2">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="card-text">A well-known quote.
                        <p class="card-text text-end">
                            <a href="#" class="card-link">Edit</a>
                            <a href="#" class="card-link">Delete</a>
                        </p>
                        </p>
                        <footer class="blockquote-footer">11-3-2024 <cite title="Source Title">Ago</cite></footer>
                    </blockquote>
                </div>
            </div>

            <?php

            // $query = "SELECT * FROM categories ORDER BY id DESC";
            // $all_categories = mysqli_query($connection, $query);
            // // var_dump($all_categories);

            // while ($row = mysqli_fetch_assoc($all_categories)) {
            //     $id = $row['id'];
            //     $name = $row['name'];
            //     $createdAt = $row['createdAt'];
            ?>

            <!-- <div class="card mb-2">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="card-text"><?php //echo $name; 
                                                    ?></p>
                            <a href="#" class="card-link">Edit</a>
                            <a href="del" class="card-link">Delete</a>
                            <footer class="blockquote-footer text-end"><?php //echo $createdAt; 
                                                                        ?> <cite title="Source Title">Ago</cite></footer>
                        </blockquote>
                    </div>
                </div> -->

            <?php  //} 
            ?>

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

    <!-- <section class="mb-lg-10 mt-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-6">
                    <h3 class="mb-0">Featured Categories</h3>
                </div>
            </div>
            <div class="category-slider">
                <div class="item">

                    <div class="card card-product mb-lg-4">
                        <div class="card-body text-center py-8">
                            <img src="assets/images/category/category-dairy-bread-eggs.jpg" alt="Grocery Ecommerce Template" class="mb-3 img-fluid">
                            <div class="text-truncate">Dairy, Bread &amp; Eggs</div>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <a href="../pages/shop-grid.html" class="text-decoration-none text-inherit">
                        <div class="card card-product mb-lg-4">
                            <div class="card-body text-center py-8">
                                <img src="assets/images/category/category-snack-munchies.jpg" alt="Grocery Ecommerce Template" class="mb-3">
                                <div class="text-truncate">Snack &amp; Munchies</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="../pages/shop-grid.html" class="text-decoration-none text-inherit">
                        <div class="card card-product mb-lg-4">
                            <div class="card-body text-center py-8">
                                <img src="assets/images/category/category-bakery-biscuits.jpg" alt="Grocery Ecommerce Template" class="mb-3">
                                <div class="text-truncate">Bakery &amp; Biscuits</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- footer -->
    <script>
        $(document).ready(function() {
            loadCategories();
            loadCategory();
        });
    </script>

    <?php include('includes/footer.php'); ?>