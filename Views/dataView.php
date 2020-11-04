
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>

    <div class="container">
        <h3 class="text-center m-3">بحث</h3>
        <form method="get" id="form_su" class="form border m-4 rounded">
            <div class="row mt-3 mb-3 ml-5">
                <div class="text-center" id="loading">
                </div>
                <input type="text" name="value" class="form-control col-sm-6 " name="change" oninput="Get()">
                <select name="search_by" id="search_by" class="form-control col-sm-2 ml-2 mr-2 " onchange="Get()">
                    <option value="id">ID</option>

                    <option value="username">username</option>
                    <option value="name" selected>name</option>
                    <option value="email">email</option>
                </select>

                <label for="where">Where</label>

                <input type="radio" id="where" name="type" value="Where" class="m-2" onchange="Get()" checked>
                <label for="whereLike">Where Like</label>
                <input type="radio" id="whereLike" name="type" value="WhereLike" class="m-2" onchange="Get()">
            </div>
        </form>

        <div class="table-responsive">
            <table class="table border rounded text-center table-hover">

                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created at</th>
                        <th scope="col">username</th>
                    </tr>
                    
                </thead>
                
                <tbody id="div">

                    <!-- data -->

                </tbody>
            </table>
        </div>

        <?php
        if (isset($_SESSION['errors']))
            echo $_SESSION['errors'];
        ?>
        <script src="js/jquery-3.5.1.js"></script>
        <script>
            $("#form_su").submit(function(e) {

                e.preventDefault();

            });

            function Get() {
                // Loading img
                if ($("#loading").html().search("img/loading.svg") < 0)
                    $("#loading").append('<img src="img/loading.svg" alt="" width="30" height="30">');
                $.ajax({
                    type: "POST",
                    url: "/app/get",
                    data: $("#form_su").serialize(),

                    success: function(data) {
                        $("#loading").html('');
                        var json = JSON.parse(data);
                        $("#div").html('');
                        $.each(json, function(i, item) {
                            $("#div").append(
                                "<tr> <th scope='row'>" + item.id +
                                "</th><td>" + item.name + "</td><td>" + item.username +
                                "</td><td>" + item.email +
                                "</td><td>" + item.created_at +
                                "</td></tr>"
                            );
                        });
                        $('#div')
                    },
                    error: function(errors) {
                        console.log(errors);
                    }
                });
                //$("#loading").html('');
            }
        </script>
    </div>
</body>

</html>