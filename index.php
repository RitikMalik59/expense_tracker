<?php include('includes/header.php'); ?>

<body>
    <!-- bootstrap navbar -->
    <?php include('includes/navbar.php'); ?>

    <h1 class="text-center p-5 ">Expense tracker App</h1>

    <!-- <div class="containe-fuild justify-content-center "> -->
    <div class="containe-fuild d-flex justify-content-center ">
        <form action="" method="post">

            <label for="" class="form-label">Catergories :</label>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect02">Category</label>
                <select class="form-select" id="inputGroupSelect02">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="row g-3">
                <div class="col">
                    <label for="" class="form-label">Amount :</label>
                    <input type="number" class="form-control" name="amount">
                </div>
            </div>
            <div class="row g-3 pt-3">
                <div class="col">
                    <label for="exampleFormControlTextarea1" class="form-label">Spent On :</label>
                    <textarea class="form-control" name="description" rows="2"></textarea>
                </div>
            </div>
            <div class="row g-3">
                <div class="co pt-3">
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                </div>
            </div>

        </form>

    </div>

    <!-- footer -->

    <?php include('includes/footer.php'); ?>