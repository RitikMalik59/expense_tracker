<?php include('includes/header.php'); ?>

<body>
    <!-- bootstrap navbar -->
    <?php include('includes/navbar.php'); ?>

    <!-- <h1 class="text-center p-5 ">Expense tracker App</h1> -->

    <!-- <div class="containe-fuild justify-content-center "> -->
    <!-- <div class="container">
        <div class="d-flex justify-content-center">

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


        <div class="card">
            <div class="card-header">
                Quote
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>A well-known quote, contained in a blockquote element.</p>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>

    </div> -->

    <div class="container mt-5">
        <h1 class="text-center mb-4">Expense Tracker</h1>

        <!-- Modal -->
        <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expenseModalLabel">Add Expense</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="expenseForm">
                            <div class="form-group">
                                <label for="expenseName">Name</label>
                                <input type="text" class="form-control" id="expenseName" placeholder="Enter expense name">
                            </div>
                            <div class="form-group">
                                <label for="expenseAmount">Amount</label>
                                <input type="number" class="form-control" id="expenseAmount" placeholder="Enter amount">
                            </div>

                            <!-- <label for="" class="form-label">Catergories :</label> -->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect02">Category: </label>
                                <?php
                                $query = "SELECT * FROM categories";
                                $categories = mysqli_query($connection, $query);
                                checkQuery($categories);

                                echo '<select class="form-select" size="1" id="categoryId">';
                                echo '<option selected>Choose...</option>';
                                while ($row = mysqli_fetch_assoc($categories)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                echo '</select>';
                                ?>
                                <!-- <select class="form-select" size="1" id="inputGroupSelect02">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select> -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addExpenseBtn">Add Expense</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Expense List -->
        <!-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Expense List
                    </div>
                    <ul class="list-group list-group-flush" id="expenseList">
                        Expense items will be added dynamically here
                    </ul>
                </div>
            </div>
        </div> -->

        <div class="container col-md-9 p-5">
            <div class="row">
                <div class="col-12 mb-6">
                    <h3 class="mb-4">Recent Expenses:</h3>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="row g-0">
                    <div class="col-md-9">
                        <div class="card-body">
                            <h2 class="card-title">Samosa</h2>
                            <p class="card-text">
                                <span class="badge text-bg-success">Food</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="d-flex align-content-center flex-wrap">
                            <p class="fs-1 fw-bold text-danger">
                                <i class="bi bi-currency-rupee"></i>200
                            </p>
                        </div>
                    </div>
                </div>
                <p class="blockquote-footer card-text text-end">
                    <small class="text-body-secondary">
                        2024-03-18 21:37:16 Ago
                        <span class="blockquote-footer"></span>
                    </small>
                </p>
            </div>

            <div id="expenseListing">

                <div class="card expense-card mb-2">
                    <!-- <div class="card-header">
                    Categories
                </div> -->
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="card-text">A well-known quote, contained in a blockquote element.</p>
                            <small class="card-text">Category</small>
                            <footer class="blockquote-footer text-end">11-3-2024 <cite title="Source Title">Ago</cite></footer>
                        </blockquote>
                    </div>
                </div>
                <div class="card expense-card mb-2">
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
                <div class="card expense-card mb-2">
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

            <div class="card expense-card mb-2">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Categories</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        ONE
                    </div>
                    <div class="col-6">

                    </div>
                </div>
                <i class="bi bi-pencil-square"></i>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="card-text">A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer">11-3-2024 <cite title="Source Title">Ago</cite></footer>
                    </blockquote>
                </div>
            </div>




        </div>



        <!-- Floating plus button -->
        <button type="button" class="fixed-button whb text-center" data-bs-toggle="modal" data-bs-target="#expenseModal">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
        </svg> -->

            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
            </svg>
        </button>


        <!-- Bootstrap JS and jQuery -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

        <script>
            // Submit form event listener
            // document.getElementById('addExpenseBtn').addEventListener('click', function() {
            //     // addExpense();
            //     // $('#expenseModal').modal('hide'); // Hide modal after adding expense
            // });
            $(document).ready(function() {
                loadExpenses();
            })
        </script>


        <!-- footer -->

        <?php include('includes/footer.php'); ?>