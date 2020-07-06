<?php
include 'connection.php';
session_start();
$student_id = $_SESSION['student_id'];
$sql = "SELECT * FROM student WHERE student_id = '$student_id'";
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
    <link href="assets/css/morris.css" rel="stylesheet">
    <link href="assets/css/select2.css" rel="stylesheet" />

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
                    <h4 class="media-heading"><?php echo $_SESSION['firstname']; ?></h4>
                    <small class="text-muted"><?php echo $_SESSION['student_id']; ?></small>
                </div>
            </div><!-- media -->

            <h5 class="leftpanel-title">Navigation</h5>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="student_index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li><a href="book_borrowed.php"><i class="fa fa-users"></i> <span>Book Borrowed</span></a></li>
            </ul>
        </li>
    </ul>

</div><!-- leftpanel -->

<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-th-list"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="">Tables</a></li>
                    <li>Data Tables</li>
                </ul>
                <h4>Data Tables</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->

    <div class="contentpanel">

        <div class="panel panel-primary-head">
            <div class="panel-heading">
                <h4 class="panel-title">Available Book</h4>
                <p>This is the list of available Book that can be borrow in our library.</p>
            </div><!-- panel-heading -->

            <table border="1" >
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publish</th>
                        <th>Available Books</th>
                        <th colspan="2"> Action </th>
                        <tr>
                        </thead>

                        <?php
                        $count = 0;
                        $book = mysqli_query($conn, "SELECT * FROM book");

                        if(mysqli_num_rows ($book) > 0){
                            while($row = mysqli_fetch_array($book)){
                                $book_id = $row['book_id'];
                                $title = $row['title'];
                                $author = $row['author'];
                                $publish = $row['publish'];
                                $available_book = $row['available_book'];

                                $image = $row['image'];

                                echo '<tr>';
                                echo '<td>';
                                echo ''.$book_id.'';
                                echo '</td>';
                                echo '<td>';
                                echo '<img height="150" width="150" src="data:image;base64,'. $image.'"  ';
                                echo '</td>';
                                echo '<td>';
                                echo ''.$title.'';
                                echo '</td>';
                                echo '<td>';
                                echo ''.$author.'';
                                echo '</td>';

                                echo '<td>';
                                echo ''.$publish.'';
                                echo '</td>';

                                echo '<td>';
                                if($available_book != 0) {
                                    echo ''.$available_book.'';
                                }
                                else {
                                    echo 'Not Available';
                                }
                                echo '</td>';

                                echo "<td>";
                                echo "<a href='borrow_book.php?book=".$row['book_id']."&student=".$student_id."'  onclick='return confirm(\"Are you sure you want to borrow this book?\")'>Borrow Book</a>";
                                echo '</td>';

                                echo '</tr>'; 
                            }
                        }
                        ?> 
                        <tbody>
                        </table>

                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </section>

            <script src="assets/js/jquery-1.11.1.min.js"></script>
            <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/modernizr.min.js"></script>
            <script src="assets/js/pace.min.js"></script>
            <script src="assets/js/retina.min.js"></script>
            <script src="assets/js/jquery.cookies.js"></script>

            <script src="assets/js/jquery.dataTables.min.js"></script>
            <script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
            <script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
            <script src="assets/js/select2.min.js"></script>

            <script src="assets/js/custom.js"></script>
            <script>
                jQuery(document).ready(function(){

                    jQuery('#basicTable').DataTable({
                        responsive: true
                    });

                    var shTable = jQuery('#shTable').DataTable({
                        "fnDrawCallback": function(oSettings) {
                            jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                        },
                        responsive: true
                    });

            // Show/Hide Columns Dropdown
            jQuery('#shCol').click(function(event){
                event.stopPropagation();
            });
            
            jQuery('#shCol input').on('click', function() {

                // Get the column API object
                var column = shTable.column($(this).val());

                // Toggle the visibility
                if ($(this).is(':checked'))
                    column.visible(true);
                else
                    column.visible(false);
            });
            
            var exRowTable = jQuery('#exRowTable').DataTable({
                responsive: true,
                "fnDrawCallback": function(oSettings) {
                    jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                },
                "ajax": "ajax/objects.txt",
                "columns": [
                {
                    "class":          'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "salary" }
                ],
                "order": [[1, 'asc']] 
            });
            
            // Add event listener for opening and closing details
            jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = exRowTable.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });

            
            // DataTables Length to Select2
            jQuery('div.dataTables_length select').removeClass('form-control input-sm');
            jQuery('div.dataTables_length select').css({width: '60px'});
            jQuery('div.dataTables_length select').select2({
                minimumResultsForSearch: -1
            });

        });

                function format (d) {
            // `d` is the original data object for the row
            return '<table class="table table-bordered nomargin">'+
            '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
            '</table>';
        }
    </script>

</body>
</html>
