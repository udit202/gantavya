<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- bootstrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'db.php';
    ?>

    <div class="container_div">
        <div class="menu">
            <h3>
                GANTAVYA
            </h3>
            <h4 style="color: white;">
                Admin
            </h4>
            <ul>
                <li class="menu_btn" onclick="container_switcher(0)">Home</li>
                <li class="menu_btn" onclick="container_switcher(1)">Vechles </li>
                <li class="menu_btn" onclick="container_switcher(2)">U Vechles</li>
                <li class="menu_btn" onclick="container_switcher(3)">Drivers</li>
                <li class="menu_btn" onclick="container_switcher(4)">U Drivers</li>
                <li class="menu_btn">Log-Out</li>
            </ul>
        </div>
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <div class="content">
            <div class="data">
                <div class="overview">
                    <div>
                        <p style="color:black">Vechles</p>
                        <?php
                        require 'db.php';

                        $sql = "SELECT * FROM `wp_vehicles` Where `is_verified`=1";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>

                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="chart">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="data">
                <h1>Vechles</h1>
                <?php
                require "verified_vechles.php";
                ?>
            </div>
            <div class="data">
                <h1>UnVerified Vechles</h1>
                <?php
                require "unverified_v.php";
                ?>
            </div>
            <div class="data">
                <h1>
                    Drivers
                </h1>
            </div>
            <div class="data">
                <h1>
                    Un-Verified Drivers
                </h1>
            </div>
        </div>
    </div>
    <div class="Verify" id="Verify_form_div">
        <div>
            <div id="Verify_form_position">

                <form class="row justify-content-evenly was-validated" method="post"
                    action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' enctype="multipart/form-data">
                    <div> <i id="close_btn" class="bi bi-x-lg"></i></div>
                    <p style="color: black; padding: 20px;">
                        Are you sure you want to Verify <span id="Vechle"> Udit</span> </p>
                    <input type="text" name="gmail" id="Vechle_id">
                    <div class="mb-3 mt-5">
                        <button class="btn btn-success" id="Submit_btn" name="add_entry" type="submit">Delete</button>
                        <button class="btn btn-danger " type="reset">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <style>
        .Verify {
            display: none;
            position: fixed;
            top: -5px;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            /* z-index: -1; */
            /* background-color: red; */
        }

        .Verify>div {
            display: block;
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .Verify>div>div {
            /* display: none; */
            width: 450px;
            border-radius: 25px;
            height: auto;
            background-color: rgb(83, 83, 134);

        }

        .Verify>div>div>form {
            margin: 10px;
            padding: 20px;
        }

        .Verify>div>div>form>div {
            width: 100%;
            text-align: right;
        }

        .Verify>div>div>form>div>i {
            color: white;
            font-size: 25px;
            cursor: pointer;
        }
    </style>
    <!-- datatable links  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#Vechles_verified').DataTable();
            $('#UnVerified_Vechles').DataTable();
            $("#close_btn").click(function () {
                $('#Verify_form_div').hide();
                $('#Vechle_id').val('');
            });                      
        }
        );
        function verify(){
            let btn =document.getElementsByClassName('verify_vechle');
            // console.log(btn);
            let i=0;

            while(i<btn.length){
                btn[i].addEventListener('click', function(e){
                    let tr = e.target.parentNode.parentNode;
                    let vechle =document.getElementById('Vechle');
                    let vechle_id = tr.getElementsByTagName('td')[1].innerHTML;
                    let input =document.getElementById()
                    vechle.innerHTML=vechle_id;
                    console.log(vechle_id)
                })
                i++;
            }
        }
        verify()
    </script>

    <script src="dash.js"></script>
</body>

</html>