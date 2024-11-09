<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <style>
        .training-details {
            display: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/utri-logo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'elements/navigation.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-2 ml-auto">
                    <a href="trainingList.php" class="btn btn-block btn-info btn-sm">Training List (s)</a>
                </div>
            </div>
            <!-- /.content-header -->
           

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Create Training</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="addTraining">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role">Training Hall</label>
                                                    <select class="form-control" name="training_hall"
                                                        id="training_hall">
                                                        <option disabled selected>Select</option>
                                                        <option value="1">Vishakha Auditorium</option>
                                                        <option value="2">Swati Training Hall</option>
                                                        <option value="3">Revati Training Hall</option>
                                                        <option value="4">Classroom-108</option>
                                                        <option value="5">Classroom-111</option>
                                                        <option value="6">Classroom-112</option>
                                                        <option value="7">Classroom-226</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!--Training hall on select display summary-->
                                                    <div id="details-container">
                                                        <details class="training-details" id="details-1">
                                                            <summary><strong style="color: sienna;">Vishakha Auditorium</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 500 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Projector <br />
                                                                • Rostrum with mic <br />
                                                                • Screen <br />
                                                            </p>
                                                        </details>
                                                        <details class="training-details" id="details-2">
                                                            <summary><strong strong style="color: sienna;">Swati Training Hall - Ground Floor</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 50 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Projector <br />
                                                                • Rostrum with mic <br />
                                                                • Screen <br />
                                                            </p>
                                                        </details>
                                                        <details class="training-details" id="details-3">
                                                            <summary><strong strong style="color: sienna;">Revati Training Hall - Second Floor</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 50 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Projector <br />
                                                                • Rostrum with mic <br />
                                                                • Screen <br />
                                                            </p>
                                                        </details>
                                                        <details class="training-details" id="details-4">
                                                            <summary><strong strong style="color: sienna;">Classroom-108</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 50 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Smart Classroom <br />
                                                                • Rostrum with mic <br />
                                                            </p>
                                                        </details>
                                                        <details class="training-details" id="details-5">
                                                            <summary><strong strong style="color: sienna;">Classroom-111</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 50 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Smart Classroom <br />
                                                                • Rostrum with mic <br />
                                                            </p>
                                                        </details>
                                                        <details class="training-details" id="details-6">
                                                            <summary><strong strong style="color: sienna;">Classroom-112</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 50 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Smart Classroom <br />
                                                                • Rostrum with mic <br />
                                                            </p>
                                                        </details>
                                                        <details class="training-details" id="details-7">
                                                            <summary><strong strong style="color: sienna;">Classroom-226</strong></summary>
                                                            <p><strong>Seating Capacity: </strong> 50 <br />
                                                                <strong>Facilities:</strong><br />
                                                                • Smart Classroom <br />
                                                                • Rostrum with mic <br />
                                                                • White Board <br />
                                                                • 25 Computer System Lab <br />

                                                            </p>
                                                        </details>
                                                    </div>
                                                </div>

                                                <!--End-->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="departmentname">Department Name</label>
                                                    <select class="form-control" name="department_name"
                                                        id="department_name">
                                                        <option disabled selected>Select</option>
                                                        <option value="State Urban Digital Mission">State Urban Digital Mission</option>
                                                        <option value="Swachh Bharat Mission">Swachh Bharat Mission</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="trainingdatefrom">Training Date And Time
                                                        From</label>
                                                    <!--<input type="text" name="training_date_from" class="form-control" id="training_date_from"
                                                        placeholder="DD-MM-YYYY"> -->
                                                    <div class="input-group date" id="reservationdatetime"
                                                        data-target-input="nearest">
                                                        <input type="text" name="training_date_from"
                                                            id="training_date_from"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#reservationdatetime" required />
                                                        <div class="input-group-append"
                                                            data-target="#reservationdatetime"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="trainingdateto">Training Date And Time To</label>
                                                    <!--<input type="text" name="training_date_to" class="form-control"
                                                            id="training_date_to" placeholder="DD-MM-YYYY">-->
                                                    <div class="input-group date" id="training_date_to"
                                                        data-target-input="nearest">
                                                        <input type="text" name="training_date_to" id="training_date_to"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#training_date_to" required />
                                                        <div class="input-group-append" data-target="#training_date_to"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="trainingstatus">Training Mode</label>
                                                    <input type="text" name="training_mode" class="form-control"
                                                        id="training_mode" placeholder="Enter training mode">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="facultyname">Faculty Name</label>
                                                    <input type="text" name="faculty_name" class="form-control"
                                                        id="faculty_name" placeholder="Enter faculty name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="numberofparticipant">Number Of Participant</label>
                                                    <input type="text" name="number_of_participants"
                                                        class="form-control" id="number_of_participants"
                                                        placeholder="Enter number of participant">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="trainingmaterials">Training Materials (Link)</label>
                                                    <input type="text" name="training_materials_url"
                                                        class="form-control" id="training_materials_url"
                                                        placeholder="Enter training material link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="trainingapprovelletter">Training Approval
                                                        Letter</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="training_approval_letter"
                                                                class="custom-file-input" id="training_approval_letter" required>
                                                            <label class="custom-file-label" for="file">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="vcurl">VC URL</label>
                                                    <input type="text" name="vc_url" class="form-control" id="vc_url"
                                                        placeholder="Enter vc url">
                                                </div>
                                            </div>
                                        </div>
                                        <label for="trainingapprovelletter">Facilities</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="projector"
                                                                class="form-check-input" id="projector" value="1">
                                                            <label class="form-check-label"
                                                                for="exampleCheck1">Projector</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="food_beverage"
                                                                class="form-check-input" id="food_beverage" value="1">
                                                            <label class="form-check-label" for="exampleCheck1">Food
                                                                &
                                                                Beverage</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="accommodation"
                                                                class="form-check-input" id="accommodation" value="1">
                                                            <label class="form-check-label"
                                                                for="exampleCheck1">Accommodation</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="screen"
                                                                class="form-check-input" id="screen" value="1">
                                                            <label class="form-check-label"
                                                                for="exampleCheck1">Screen</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="training_handouts"
                                                                class="form-check-input" id="training_handouts" value="1">
                                                            <label class="form-check-label" for="exampleCheck1">Training
                                                                Handouts</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="training_key_notes"
                                                                class="form-check-input" id="training_key_notes" value="1">
                                                            <label class="form-check-label" for="exampleCheck1">Training
                                                                Key Notes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">Submit</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'elements/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#training_date_to').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
    <script>
        document.getElementById('training_hall').addEventListener('change', function() {
            // Hide all details
            document.querySelectorAll('.training-details').forEach(function(detail) {
                detail.style.display = 'none';
            });

            // Get the selected value
            const selectedValue = this.value;

            // Show the corresponding details element
            if (selectedValue) {
                const selectedDetails = document.getElementById('details-' + selectedValue);
                if (selectedDetails) {
                    selectedDetails.style.display = 'block';
                }
            }
        });
    </script>
</body>

</html>