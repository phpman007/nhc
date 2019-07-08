<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Sweetalert</title>

    <link href="{{ asset("backend/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{ asset("backend/font-awesome/css/font-awesome.css")}}" rel="stylesheet">


    <!-- Sweet Alert -->
    <link href="{{ asset("backend/css/plugins/sweetalert/sweetalert.css")}}" rel="stylesheet">

    <link href="{{ asset("backend/css/animate.css")}}" rel="stylesheet">
    <link href="{{ asset("backend/css/style.css")}}" rel="stylesheet">


</head>

<body>
        <div class="ibox-content">

            <div class="row text-center">

                <div class="col-lg-6 h-100 p-lg">
                    <p>A basic sweetalert message</p>
                    <button class="btn btn-primary btn-sm demo1">Run example</button>
                </div>
                <div class="col-lg-6 h-100 p-lg">
                    <p> A success message! </p>
                    <button class="btn btn-success btn-sm demo2">Run example</button>
                </div>
                <div class="col-lg-6 h-100 p-lg">
                    <p>A warning message, with a function attached to the "Confirm"-button...</p>
                    <button class="btn btn-warning btn-sm demo3">Run example</button>
                </div>
                <div class="col-lg-6 h-100 p-lg">
                    <p> ... and by passing a parameter, you can execute something else for "Cancel". </p>
                    <button class="btn btn-danger btn-sm demo4">Run example</button>
                </div>





            </div>
            <div class="m-t-md">
                <p>
                    You can easy add sweet alert in your script by adding code (example from warning button):
                </p>

            </div>

        </div>

<!-- Mainly scripts -->
<script src="{{url('backend/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('backend/js/popper.min.js')}}"></script>
<script src="{{url('backend/js/bootstrap.js')}}"></script>
<script src="{{url('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{url('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Sweet alert -->
<script src="{{url('backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function () {

        $('.demo1').click(function(){
            swal({
                title: "Welcome in Alerts",
                text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
            });
        });

        $('.demo2').click(function(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success"
            });
        });

        $('.demo3').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });

        $('.demo4').click(function () {
            swal({
                        title: "Are you sure?",
                        text: "Your will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
        });


    });

</script>


</body>

</html>
