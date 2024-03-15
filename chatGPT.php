<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/main.css">

</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Expense Tracker</h1>

        <!-- Modal -->
        <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expenseModalLabel">Add Expense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                                <select class="form-select" id="inputGroupSelect02">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addExpenseBtn">Add Expense</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expense List -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Expense List
                    </div>
                    <ul class="list-group list-group-flush" id="expenseList">
                        <!-- Expense items will be added dynamically here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating plus button -->
    <button type="button" class="fixed-button whb text-center" data-toggle="modal" data-target="#expenseModal">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
        </svg> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </svg>
    </button>



    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to add an expense to the list
        function addExpense() {
            var name = document.getElementById('expenseName').value;
            var amount = document.getElementById('expenseAmount').value;

            if (name === '' || amount === '') {
                alert('Please enter both name and amount');
                return;
            }

            var listItem = document.createElement('li');
            listItem.classList.add('list-group-item');
            listItem.innerHTML = `<strong>${name}</strong>: $${amount}`;

            document.getElementById('expenseList').appendChild(listItem);

            // Clear input fields
            document.getElementById('expenseName').value = '';
            document.getElementById('expenseAmount').value = '';
        }

        // Submit form event listener
        document.getElementById('addExpenseBtn').addEventListener('click', function() {
            addExpense();
            $('#expenseModal').modal('hide'); // Hide modal after adding expense
        });
    </script>

</body>

</html>