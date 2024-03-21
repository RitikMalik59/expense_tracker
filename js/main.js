// console.log('Main Start');
$(document).ready(function () {

    // console.log('Document ready start');

    // <________  Categories.php Functions  ________>

    // ----adding category in categories table with ajax

    $('input[name="submit_category"]').click(function () {

        // console.log('click');
        const category = $('input[name="category"]').val();

        if (category !== '') {

            const data = $.ajax(
                {
                    url: API_URL + 'addCategory.php',
                    type: "POST",
                    // dataType: "json",
                    data: { category: category },
                    success: function (data) {
                        // console.log(data);
                        loadCategories();
                        // loadCategory();

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                }
            )

            // clear iinput after submit
            $('input[name="category"]').val('');

            // 'redirecting page so that it displays in php while loop after refresh'
            // window.location.replace("categories.php");
            // redirect('');
        } else {
            console.log('empty');
        }


        // console.log(data);


    });

    // delete category
    // $('input[name="delete"]').click(function () {
    //     console.log('click');
    // })

    // $('.card').click(function () {

    //     console.log('ddd');
    // })

    // important: Select dynamically added elements like these in jquery because it doesnt exist when dom loaded
    $('#category_cards').on('click', 'input[name="delete"]', function () {

        const id = $(this).attr('id');
        // console.log(id);

        const data = $.ajax(
            {
                url: API_URL + 'deleteCategory.php',
                type: "POST",
                data: { id: id },
                success: function (data) {
                    // console.log(data);
                    loadCategories();
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                }
            }
        )

    });

    $('#category_cards').on('click', 'input[name="edit"]', function () {
        // console.log('edit');
        const id = $(this).attr('id')
        const categoryName = $(this).parent().find("p").text();
        // console.log(id);
        // console.log(categoryName);

        // const card = $(this).parent().parent().parent();
        const card = $(this).parents('.e_cat');

        // card.remove();
        // card.fadeOut(300);
        const input = `
        <div class="form-control input-group">
            <input type="text" name="editCategory" value="${categoryName}" id="${id}" class="form-control" placeholder="Edit here" required>
            <input type="submit" class="btn btn-warning" name="edit_submit" value="Edit">
        </div>
        `;

        card.html(input);

        $('input[name="edit_submit"]').on('click ', function () {

            const inputEdit = $('input[name="editCategory"]');
            const id = inputEdit.attr('id');
            const name = inputEdit.val();

            // console.log(id, name);

            const data = $.ajax({

                url: './api/editCategory.php',
                type: 'POST',
                data: { e_id: id, editCategory: name },
                success: function (data) {
                    console.log(data);
                    loadCategories();
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                }

            })

        })

        // card.fadeIn(300);;
        // card.add()
        // console.log(card);


        // const data = $.ajax({

        //     url: './api/editCategory.php',
        //     type: 'POST',
        //     data: { id: id }
        // })
    })

    // <________  Categories.php Functions END  ________>

    // <________  index.php Functions  ________>

    $('#addExpenseBtn').click(function () {
        // console.log('click');

        const expenseName = $('#expenseName').val();
        const expenseAmount = $('#expenseAmount').val();
        const categoryId = $('#categoryId').val();

        // console.log(expenseName, expenseAmount, categoryId);

        const data = $.ajax({
            url: API_URL + 'addExpense.php',
            type: 'POST',
            data: { expenseName: expenseName, expenseAmount: expenseAmount, categoryId: categoryId },
            success: function (data) {
                console.log(data);
                loadExpenses();
                // loadCategory();
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        })

        // Hide modal after adding expense
        $('#expenseModal').modal('hide');

    })



    // <________  Categories.php Functions END ________>

    // console.log('Domument End');

});

// console.log('Main Start');

const API_URL = 'http://localhost/expense_tracker/api/';
function loadCategory() {

    $.ajax({
        url: API_URL + 'getCategory.php',
        type: 'GET',
        dataType: 'json', // Change the data type according to your response
        success: function (data) {
            console.log(data);
            // Process the array of data and display it on the webpage
            var outputHtml = '<ul>';
            data.forEach(function (item) {
                outputHtml += '<li>' + item.name + '</li>';

            });
            outputHtml += '</ul>';
            $('#output').html(outputHtml);
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
            // Handle errors if any
            $('#output').html('<p>Error fetching data</p>');
        }
    });
}

function loadCategories() {

    // console.log('loadCategory function');
    $.ajax({
        url: API_URL + 'getCategory.php',
        type: 'GET',
        dataType: 'json', // Change the data type according to your response
        success: function (data) {
            // console.log(data);
            // Process the array of data and display it on the webpage
            var currentTime = new Date().toLocaleString();
            var outputHtml = '<div>';
            data.forEach(function (json) {
                outputHtml += `
            <div class="card mb-2">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <div class="e_cat">
                            <p class="card-text">${json.name}</p>
                            <input type="submit" name="edit" class="btn btn-warning" value="Edit" id="${json.id}">
                            <input type="submit" name="delete" onclick="confirm('Are you sure you want to delete this Category?')" class="btn btn-danger" value="Delete" id="${json.id}">
                            <footer class="blockquote-footer text-end">${json.createdAt} <cite title="Source Title">Ago</cite></footer>
                        </div>
                    </blockquote>
                </div>
            </div>
            `;

            });
            outputHtml += '</div>';

            // console.log(outputHtml);
            $('#category_cards').html(outputHtml);

        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
            // Handle errors if any
            $('#category_cards').html('<p>Error fetching data</p>');
        }
    });
}

function loadExpenses() {
    $.ajax({
        url: API_URL + 'getExpense.php',
        type: 'GET',
        dataType: 'json',  // Change the data type according to your response
        success: function (data) {
            // console.log(data);
            const expenseList = $('#expenseListing');
            // console.log(expenseList);

            let htmlOutput = ``;
            data.forEach(function (json) {
                // console.log(json);
                htmlOutput += `
                <div class="card shadow mb-4">
                    <div class="row g-0">
                        <div class="col-md-9">
                            <div class="card-body">
                                <h2 class="card-title">${json.name}</h2>
                                <p class="card-text">
                                    <span class="badge text-bg-success">${json.categoryName}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="d-flex align-content-center flex-wrap">
                                <p class="fs-1 fw-bold text-danger">
                                    <i class="bi bi-currency-rupee"></i>${json.amount}
                                </p>
                            </div>
                        </div>
                    </div>
                    <p class="blockquote-footer card-text text-end">
                        <small class="text-body-secondary">
                        ${json.createdAt} Ago
                            <span class="blockquote-footer"></span>
                        </small>
                    </p>
                </div>
                `
            })
            // console.log(htmlOutput);
            expenseList.html(htmlOutput);
        }


    })
}

// Function to add an expense to the list
function addExpense() {
    const name = document.getElementById('expenseName').value;
    const amount = document.getElementById('expenseAmount').value;

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
function loadPieChart() {

    const ctx = document.getElementById('myChart');
    const expenseData = $.ajax({
        url: API_URL + 'getCategoryExpense.php',
        type: 'POST',
        dataType: 'Json',
        success: function (json) {
            console.log(json);
            const uniqueCategoryName = json.map(row => row.categoryName);
            const totalExpense = json.map(row => row.totalExpense);
            const colors = ['Red', 'Blue', 'Green', 'Pink', 'Yellow', 'Purple', 'Maroon', 'Gold', 'rgb(241, 26, 123)', 'rgb(21, 245, 186)', 'rgb(165, 85, 236)', 'rgb(255, 187, 100)', 'rgb(192, 74, 130)'];
            console.log(uniqueCategoryName, totalExpense);

            const data = {
                labels: uniqueCategoryName,
                datasets: [{
                    label: 'Total Expenses Per Category',
                    data: totalExpense,
                    backgroundColor: colors,
                    borderColor: '#CCD3CA',
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
            };

            new Chart(ctx, config);

        }


    })

    // const data = {
    //     labels: [
    //         'Samosa',
    //         'New',
    //         'Gaming'
    //     ],
    //     datasets: [{
    //         label: 'Total Expenses',
    //         data: [300, 50, 100],
    //         backgroundColor: [
    //             'rgb(255, 99, 132)',
    //             'rgb(54, 162, 235)',
    //             'rgb(255, 205, 86)'
    //         ],
    //         hoverOffset: 4
    //     }]
    // };

    // const config = {
    //     type: 'doughnut',
    //     data: data,
    // };

    // new Chart(ctx, config);

}

// const data = {
//     labels: [
//         'Samosa',
//         'New',
//         'Gaming'
//     ],
//     datasets: [{
//         label: 'Total Expenses',
//         data: [300, 50, 100],
//         backgroundColor: [
//             'rgb(255, 99, 132)',
//             'rgb(54, 162, 235)',
//             'rgb(255, 205, 86)'
//         ],
//         hoverOffset: 4
//     }]
// };

// const config = {
//     type: 'doughnut',
//     data: data,
// };

// new Chart(ctx, config);





// console.log('Main end');
