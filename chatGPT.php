<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .expense-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.8);
        }

        .expense-category {
            font-size: 14px;
            color: #666;
        }

        .expense-time {
            font-size: 12px;
            color: #999;
        }
    </style>
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
                                <label for="expenseCategory">Category</label>
                                <input type="text" class="form-control" id="expenseCategory" placeholder="Enter expense category">
                            </div>
                            <div class="form-group">
                                <label for="expenseAmount">Price</label>
                                <input type="number" class="form-control" id="expenseAmount" placeholder="Enter price">
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
        <div class="row" id="expenseList">
            <!-- Expense cards will be added dynamically here -->
        </div>
    </div>

    <!-- Floating plus button -->
    <button type="button" class="btn btn-primary fixed-bottom mb-4 mr-4" data-toggle="modal" data-target="#expenseModal">+</button>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to add an expense to the list
        function addExpense() {
            var name = document.getElementById('expenseName').value;
            var category = document.getElementById('expenseCategory').value;
            var amount = document.getElementById('expenseAmount').value;
            var currentTime = new Date().toLocaleString();

            if (name === '' || category === '' || amount === '') {
                alert('Please enter all details');
                return;
            }

            var expenseCard = `
      <div class="col-md-4">
        <div class="card expense-card">
          <div class="card-body">
            <h5 class="card-title">${name}</h5>
            <p class="card-text expense-category">Category: ${category}</p>
            <p class="card-text">Price: $${amount}</p>
            <p class="card-text expense-time">Created: ${currentTime}</p>
          </div>
        </div>
      </div>
    `;

            $('#expenseList').append(expenseCard);

            // Clear input fields
            document.getElementById('expenseName').value = '';
            document.getElementById('expenseCategory').value = '';
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