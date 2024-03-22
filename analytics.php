<?php include('includes/header.php'); ?>

<body>
    <!-- bootstrap navbar -->
    <?php include('includes/navbar.php'); ?>

    <div class="container-fluid mt-4">
        <h1 class="text-center mb-3">Expense Analysis</h1>

        <div class="container">
            <div class="row d-flex justify-content-md-center" id="chart">
                <div class="container " style="width: 400px;">
                    <canvas id="myChart"></canvas>


                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mt-3">

                        <div id="loadCategoryTable">
                            <h1>Table</h1>
                        </div>

                        <!-- <div class="table-responsive">
                            <table class="table table-hover table-borderless caption-top">
                                <caption class="text-center">List of Total Expenses Per Category</caption>
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Category</th>
                                        <th class="text-center" scope="col">Total Expenses</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td scope="row" class="text-center">Mark</td>
                                        <td scope="row" class="text-center">Otto</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">Mark</td>
                                        <td scope="row" class="text-center">Otto</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">Mark</td>
                                        <td scope="row" class="text-center">Otto</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">Mark</td>
                                        <td scope="row" class="text-center">Otto</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->

                        <!-- <div class="card shadow mb-4">
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
                        </div> -->

                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script>
        $(document).ready(function() {
            loadPieChart();
            loadCategoryTable();
        })
    </script>



    <?php include('includes/footer.php'); ?>