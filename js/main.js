// console.log('Main Start');
$(document).ready(function () {

    // console.log('Document ready start');

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
                        // loadCategories();
                        loadCategory();

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
                    loadCategory();
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
                    loadCategory();
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

    // console.log('Domument End');

});

// console.log('Main end');

const API_URL = 'http://localhost/expense_tracker/api/';
function loadCategories() {

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

function loadCategory() {

    // console.log('loadCategory function');
    $.ajax({
        url: API_URL + 'getCategory.php',
        type: 'GET',
        dataType: 'json', // Change the data type according to your response
        success: function (data) {
            // console.log(data);
            // Process the array of data and display it on the webpage
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


// console.log('Main end');