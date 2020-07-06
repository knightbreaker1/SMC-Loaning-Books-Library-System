    <?php
    include 'connection.php';
    session_start();
    $staff_id = $_SESSION['staff_id'];
    $sql = "SELECT * FROM staff WHERE staff_id = $staff_id";
    $query = $conn->query($sql) or die($conn->error);
    $result = $query->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMC | Libary </title>

    <link href="assets/css/style.default.css" rel="stylesheet">
    <link href="assets/css/jquery.tagsinput.css" rel="stylesheet" />
    <link href="assets/css/toggles.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="assets/css/select2.css" rel="stylesheet" />
    <link href="assets/css/colorpicker.css" rel="stylesheet" />
    <link href="assets/css/dropzone.css" rel="stylesheet" />

    </head>

    <body>

    <header>
        <div class="headerwrapper">
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="assets/images/logo.png" alt="" /> 
                </a>
                <div class="pull-right">
                    <a href="" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div><!-- header-left -->
            
            <div class="header-right">

                <div class="pull-right">

                    <form class="form form-search" action="search-results.html">
                        <input type="search" class="form-control" placeholder="Search" />
                    </form>
                    
                    
                    <div class="btn-group btn-group-option">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-caret-down"></i>
                      </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                          <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                          <li class="divider"></li>
                          <li><a href="index.php"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                      </ul>
                  </div><!-- btn-group -->

              </div><!-- pull-right -->

          </div><!-- header-right -->

      </div><!-- headerwrapper -->
    </header>

    <section>
    <div class="mainwrapper">
        <div class="leftpanel">
            <div class="media profile-left">
                <a class="pull-left profile-thumb" href="profile.html">
                    <img class="img-circle" src="assets/images/photos/profile.png" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Ruel Revales</h4>
                    <small class="text-muted">Laagan Lover</small>
                </div>
            </div><!-- media -->

            <h5 class="leftpanel-title">Navigation</h5>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="staff_index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li><a href="confirm_book.php"><i class="fa fa-book"></i> <span>Confirm Student Book</span></a></li>
                <li class="active"><a href="manage_book.php"><i class="glyphicon glyphicon-book"></i> <span>Manage Book</span></a></li>
                <li><a href="manage_book.php"><i class="fa fa-cube"></i> <span>Return Book</span></a></li>
                <li><a href="manage_book.php"><i class="fa fa-building"></i> <span>Calculate Fines</span></a></li>
            </ul>
        </li>
    </ul>

    </div><!-- leftpanel -->

    <div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-pencil"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="">Forms</a></li>
                    <li>General Forms</li>
                </ul>
                <h4>General Forms</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-btns">

                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <h4 class="panel-title">Input Fields</h4>
                        <p>Please Input all the  exact details of the book. Don't leave it <code>.blank</code>, Image to be upload must be in <code>.SMALL</code> size to be upload in the system.</p>
                    </div><!-- panel-heading -->

                    <div class="panel-body nopadding">

                        <form name="form" action="#" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Book Title</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" id="title" placeholder="Book Title" class="form-control" />
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Author</label>
                                <div class="col-sm-8">
                                    <input type="text" name="author" id="author" placeholder="Book Author" class="form-control">
                                    <span class="help-block">Input the Author of this book.</span>
                                </div>
                            </div><!-- form-group -->             

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Publish</label>
                                <div class="col-sm-8">
                                    <textarea id="publish" name="publish" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Upload Image</label>
                                <input id="files" name="image"  type="file" required="">
                            </div>
                        </div>

                        <div class="panel-footer">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary mr5">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div><!-- panel-footer -->
                    </div><!-- panel-default -->
                </form>
            </div><!-- col-md-6 -->        
        </section>


        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/js/jquery-ui-1.10.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/pace.min.js"></script>
        <script src="assets/js/retina.min.js"></script>
        <script src="assets/js/jquery.cookies.js"></script>
        
        <script src="assets/js/jquery.autogrow-textarea.js"></script>
        <script src="assets/js/jquery.mousewheel.js"></script>
        <script src="assets/js/jquery.tagsinput.min.js"></script>
        <script src="assets/js/toggles.min.js"></script>
        <script src="assets/js/bootstrap-timepicker.min.js"></script>
        <script src="assets/js/jquery.maskedinput.min.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/colorpicker.js"></script>
        <script src="assets/js/dropzone.min.js"></script>

        <script src="assets/js/custom.js"></script>
        <script>
            jQuery(document).ready(function() {

                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});

                // Textarea Autogrow
                jQuery('#autoResizeTA').autogrow();
                
                // Spinner
                var spinner = jQuery('#spinner').spinner();
                spinner.spinner('value', 0);
                
                // Form Toggles
                jQuery('.toggle').toggles({on: true});
                
                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                
                // Input Masks
                jQuery("#date").mask("99/99/9999");
                jQuery("#phone").mask("(999) 999-9999");
                jQuery("#ssn").mask("999-99-9999");
                
                // Select2
                jQuery("#select-basic, #select-multi").select2();
                jQuery('#select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
                jQuery('select option:first-child').text('');
                
                jQuery("#select-templating").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
                // Color Picker
                if(jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
                        onShow: function (colpkr) {
                            jQuery(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                            jQuery('#colorpicker').val('#'+hex);
                        }
                    });
                }

                // Color Picker Flat Mode
                jQuery('#colorpickerholder').ColorPicker({
                    flat: true,
                    onChange: function (hsb, hex, rgb) {
                        jQuery('#colorpicker3').val('#'+hex);
                    }
                });
                
                
            });
        </script>

    </body>
    </html>
    <?php

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publish = $_POST['publish'];

    $image = addslashes($_FILES['image']['tmp_name']);
    $name = addslashes($_FILES['image']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);

    $file_get = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $file_to_saved = "book/".$file_get;

    $query = mysqli_query($conn, "INSERT INTO book (book_id, title, author, publish, image) VALUES (' ', '$title', '$author', '$publish','$image')");
    if($query){
        echo '<script type="text/javascript">'; 
        echo 'alert("Successfully Added Book");'; 
        echo "window.open('manage_book.php', '_self')";
        echo '</script>';
    }
    else{
        echo "<br/> Failed!";
    }


}

?>