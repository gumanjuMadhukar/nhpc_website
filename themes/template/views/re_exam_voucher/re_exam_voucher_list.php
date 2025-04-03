<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0-rc/css/adminlte.min.css" integrity="sha512-YOsl4pnOb5NC868yn1JxAzjJsWkLNtP53uc3OcyAl0Q2R1cwo/mdI1hHSQM8gbIxWj97mKeLoD9R0aiYibFQAA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <title>Re Exam voucher List</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
    <a class="nav-link" href="<?php echo base_url('admin/logout'); ?>" role="button">

        <!-- <a class="nav-link" data-toggle="dropdown" href="<?php echo site_url('admin/logout')?>"> -->
          <i class="fas fa-sign-out-alt"></i>
          
        </a>
        
      </li>
    </ul>
    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://nhpc.gov.np" class="brand-link" style="background-color:#f8f9fa">
      <img src="https://nhpc.gov.np/beta/themes//template/assets/images/logo.svg" width="100%" alt="NHPC Logo" class="  " style="opacity: .8">
      <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">Re Exam Voucher Listing</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
     
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper" id="whole-div" style="position: relative;">

    <div class="content-wrapper dashboard active">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Re-Exam Voucher List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            </div>
        </div>
        </div>
        <div class="container" style="background-color: #ffffff; padding-top:30px; padding-bottom:30px; border-radius: 5px;">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                    <th>REG ID</th>
                    <th>First Name </th>
                    <th>Middle Name </th>
                    <th>Last Name</th>
                    <th>Voucher Image</th>
                    <th>Valid</th>
                    <th>Send Message</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>REG ID</th>
                    <th>First Name </th>
                    <th>Middle Name </th>
                    <th>Last Name</th>
                    <th>Voucher Image</th>
                    <th>Valid</th>
                    <th>Send Message</th>
                </tr>
            </tfoot>
            <tbody>
            <?php foreach($students as $s){ ?>
                <tr>
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo $s['first_name']; ?> </td>
                    <td><?php echo $s['middle_name']; ?> </td>
                    <td><?php echo $s['last_name']; ?> </td>
                    <td><a href="https://nhpc.gov.np/beta/uploads/re_exam_voucher/<?php echo $s['re_exam_voucher_image']; ?>" target="_blank" ><img src="https://nhpc.gov.np/beta/uploads/re_exam_voucher/<?php echo $s['re_exam_voucher_image']; ?>" width="100" height="100" alt=""></a></td>
                    <!-- <td></td> -->
                    <td><?php if($s['re_exam_voucher_accept'] == '1'): ?>
                            <div id="<?php echo $s['id']; ?>">
                            <button onclick="status_active($user_id = <?php echo $s['id']; ?>)" name="aid" class="btn btn-success"  data-cid="1">Accepted</button>
                            </div>
        
                            <?php else:?>
                                <div id="<?php echo $s['id']; ?>">                
                                <button onclick="status_deactive($user_id = <?php echo $s['id']; ?>)" name="did" class="btn btn-danger"  data-cid="0">UnAccepted</button>
                                </div>
                                    
                        <?php endif; ?>
                    </td>
                    <td>
                    <div id="sm-<?php echo $s['id']; ?>">                
                      <button onclick="unaccept_message($user_id = <?php echo $s['id']; ?>)" name="sm-aid" class="btn btn-primary"  data-mid="0">Send Voucher not uploded</button>
                      

                    </div>



                    <?php if($s['voucher_uploaded'] == '0'): ?>
                          <div id="vsm-<?php echo $s['id']; ?>">                
                          
                            <button onclick="accept_message($user_id = <?php echo $s['id']; ?>)" name="vsm-aid" class="btn btn-success mt-2 "  data-smaid="0">Send Voucher uploded</button>

                          </div>
                          <?php else:?>
                            <div id="vsm-<?php echo $s['id']; ?>">                
                          
                          <button onclick="accept_message($user_id = <?php echo $s['id']; ?>)" name="vsm-aid" class="btn btn-success mt-2 "  data-smaid="0">Message Sent</button>

                        </div>

                      <?php endif; ?>



                        <!-- <?php if($s['re_exam_voucher_accept'] == '1'): ?>
                            <div id="<?php echo $s['id']; ?>">
                            <button onclick="status_active($user_id = <?php echo $s['id']; ?>)" name="aid" class="btn btn-success"  data-cid="1">Message sent</button>
                            </div>
        
                            <?php else:?>
                                <div id="<?php echo $s['id']; ?>">                
                                <button onclick="status_deactive($user_id = <?php echo $s['id']; ?>)" name="did" class="btn btn-primary"  data-cid="0">Send Message</button>
                                </div>
                                    
                        <?php endif; ?> -->
                    </td>
                    
                </tr>
                
             
                <?php } ?>
            </tbody>
        </table>
    </div>




</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://nhpc.gov.np">NHPC</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });

    function accept_message($user_id){
      $(document).ready(function(){
                                    let userId = $user_id;
                                    let aidClicked = '0';   
                                  
                                    $.ajax({
                                        url: "<?php echo site_url("admit_cards/accept_message") ?>",    
                                        type: "POST",
                                        data: {
                                        userId:userId,
                                        smAid:aidClicked,
                                        },
                                        cache: false,
                                success: function(result){
                                    userId = 'sm-'+ userId;
                    
                                    const pendingBtn = document.getElementById(userId);
                                    pendingBtn.innerHTML = `<div id="vsm-<?php echo $s['id']; ?>">                
                     
                     <button onclick="accept_message($user_id = <?php echo $s['id']; ?>)" name="vsm-aid" class="btn btn-success mt-2 "  data-msid="0">Message Sent</button>

                   </div>`;
                                    
                                    
                                                        }
                              }); 
                });

    }

    function unaccept_message($user_id){
            $(document).ready(function(){
                                    let userId = $user_id;
                                    let aidClicked = '0';   
                                  
                                    $.ajax({
                                        url: "<?php echo site_url("admit_cards/unaccept_message") ?>",    
                                        type: "POST",
                                        data: {
                                        userId:userId,
                                        smAid:aidClicked,
                                        },
                                        cache: false,
                                success: function(result){
                                    userId = 'sm-'+ userId;
                    
                                    const pendingBtn = document.getElementById(userId);
                                    pendingBtn.innerHTML = `<div id="sm-<?php echo $s['id']; ?>">                
                      <button onclick="unaccept_message($user_id = <?php echo $s['id']; ?>)" name="sm-aid" class="btn btn-primary"  data-smaid="0"> Message Sent</button>
                    </div>`;
                                    
                                    
                                                        }
                              }); 
                });

    }

    function status_active($user_id){
                $(document).ready(function(){
                                              let userId = $user_id;
                                              let aidClicked = '0';   
                                            
                                              $.ajax({
                                                  url: "<?php echo site_url("admit_cards/is_valid") ?>",    
                                                  type: "POST",
                                                  data: {
                                                  aId:aidClicked,
                                                  userId:userId,
                                                  },
                                                  cache: false,
                                          success: function(result){
                                              const pendingBtn = document.getElementById(userId);
                                              pendingBtn.innerHTML = `<div id="${userId}">                
                                                          <button onclick="status_deactive($user_id = ${userId})" name="did" class="btn btn-danger"  data-cid="0">UnAccepted</button>
                                                          </div>`;
                                              
                                              
                                                                  }
                                        }); 
                          });

                

              }

    function status_deactive($user_id){

$(document).ready(function(){
                              let userId = $user_id;
                              let didClicked = '1';   
                            
                              $.ajax({
                                  url: "<?php echo site_url("admit_cards/is_valid") ?>",    
                                  type: "POST",
                                  data: {
                                  dId:didClicked,
                                  userId:userId,
                                  },
                                  cache: false,
                          success: function(result){
                              const pendingBtn = document.getElementById(userId);
                              pendingBtn.innerHTML = `<div id="${userId}">                
                                          <button onclick="status_active($user_id = ${userId} )" name="aid" class="btn btn-success"  data-cid="0">Accepted</button>
                                          </div>`;
                              
                              
                                                  }
                        }); 
          });

}

</script>
</html>