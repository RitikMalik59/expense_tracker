$(document).ready(function () {

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
                        console.log(data);
                        loadCategories();
                        loadCategory();

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                }
            )


            // 'redirecting page so that it displays in php while loop after refresh'
            // window.location.replace("categories.php");
            // redirect('');
        } else {
            console.log('empty');
        }

        // console.log(data);

    })




});
const API_URL = 'http://localhost/expense_tracker/api/'
function loadCategories() {

    $.ajax({
        url: API_URL + 'getCategory.php',
        type: 'GET',
        dataType: 'json', // Change the data type according to your response
        success: function (data) {
            // console.log(data);
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
                        <p class="card-text">${json.name}</p>
                        <a href="#" class="card-link">Edit</a>
                        <a href="del" class="card-link">Delete</a>
                        <footer class="blockquote-footer text-end">${json.createdAt} <cite title="Source Title">Ago</cite></footer>
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