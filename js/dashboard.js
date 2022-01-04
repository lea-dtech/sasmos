window.addEventListener("load", function () {
    // code corresponding to add employee form
    var add_employee = document.getElementById("add_employee");
    add_employee.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data = new FormData(add_employee);

        // On success
        XHR.addEventListener("load", success);

        // On error
        XHR.addEventListener("error", on_error);

        // Set up request
        XHR.open("POST", "api/add_employee.php");

        // Form data is sent with request
        XHR.send(form_data);

        document.getElementById("loading").style.display = 'block';
        event.preventDefault();
    });

    // code corresponding to edit employee form
    var edit_employee = document.getElementById("edit_employee");
    edit_employee.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data_1 = new FormData(edit_employee);

        // on success
        XHR.addEventListener("load", success);

        // on error
        XHR.addEventListener("error", on_error);

        // set up request
        XHR.open("POST", "api/edit_employee.php");

        // Form data is sent with request
        XHR.send(form_data_1);

        document.getElementById("loading").style.display = "block";
        event.preventDefault();
    });

    // code corresponding to delete employee form
    var delete_employee = document.getElementById("delete_employee");
    delete_employee.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data_1 = new FormData(delete_employee);

        // on success
        XHR.addEventListener("load", success);

        // on error
        XHR.addEventListener("error", on_error);

        // set up request
        XHR.open("POST", "api/delete_employee.php");

        // Form data is sent with request
        XHR.send(form_data_1);

        document.getElementById("loading").style.display = "block";
        event.preventDefault();
    });

    // code corresponding to add task to employee
    var add_task = document.getElementById("add_task");
    add_task.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data_2= new FormData(add_task);

        // on success
        XHR.addEventListener("load", task_added);

        // on error
        XHR.addEventListener("error", on_error);

        // set up request
        XHR.open("POST", "api/add_task.php");

        // Form data is sent with request
        XHR.send(form_data_2);

        document.getElementById("loading").style.display = "block";
        event.preventDefault();
    });

    // code corresponding to Employee search
    var employee_search = document.getElementById("employee_search");
    employee_search.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data_2= new FormData(employee_search);

        // on success
        XHR.addEventListener("load", employee_search_success);

        // on error
        XHR.addEventListener("error", on_error);

        // set up request
        XHR.open("POST", "api/employee_search.php");

        // Form data is sent with request
        XHR.send(form_data_2);

        document.getElementById("loading").style.display = "block";
        event.preventDefault();
    });
});

var success = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        alert(response.message);
    } else {
        alert(response.message);
    }
};

var task_added = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        alert(response.message);
    } else {
        alert(response.message);
    }
};

var employee_search_success = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        alert(response.message);
    } else {
        alert(response.message);
    }
};

var on_error = function (event) {
    document.getElementById("loading").style.display = 'none';

    alert('Oops! Something went wrong.');
};
