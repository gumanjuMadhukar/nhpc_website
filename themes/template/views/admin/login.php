


<style>

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://nhpc.gov.np/beta/uploads/banners/3a328588b60ac51d1c09ae4b786fab36.jpg');
background-size: cover;
background-repeat: no-repeat;
width: 100%;
height: 100%;
font-family: 'Numans', sans-serif;
}
.loginpanel{
   width: auto;

}

.panel-heading{
    margin-top:30px;
    color: white;
}
.regisFrm{
    margin-top:30px;
}
.regisFrm p{
    color: white;
}
.regisFrm p{
    color: white;
}
.regisFrm a{
    color: #5FD4FF;
}
.input-group-prepend span{
width: 50px;
background-color: #007bff;
color: black;
border:0 !important;
}
.login_btn{
color: black;
background-color: #007bff;
width: 100px;
}
.login_btn:hover{
color: black;
background-color: white;
}
.error{
    color: red;
}
.help-block{
    color: red;
}
.login-form {
    display: block;
    width: 85%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}


    </style>
  
	
    <!-- Login form -->
    <body>
    <div class="container" >
    <div class="row ">
        <div class="col-md-5 col-md-offset-5 loginpanel" style="background:#86bcf5;"  >
        <!-- <div class="panel-heading">
                    <span></span><h5 class="panel-title">HOTEL MANAGEMENT SYSTEM</h5>
                </div> -->
<!-- <div class="d-flex panel-heading">
                    <div class="p-2 font-weight-bold"></div>
                    <div class="ml-auto p-2 font-weight-bold"></div>
</div> -->
                    <div class="panel-heading ">
                                  <div class="d-inline p-1  "> <img src="https://nhpc.gov.np/beta/themes//template/assets/images/logo.svg" alt="" style="height: 40px;width:272px"></div><br>
                                  <div class="d-inline "style="font-size:1.6rem"> Admin Login</div>  
                                </div> 
            <div class="login-panel panel panel-success" style="padding-left:50px; padding-right:50px;">
            
                
    <div class="regisFrm panel-body">
      <!-- Status message -->
      <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
    <br>
        <form action="" method="post" id="loginform"  >
        <fieldset>
                     <div class="form-group input-group ">
                        <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                        <input class="login-form" type="email" name="email" placeholder="Enter Your Email" required>
                     </div>
                        <?php echo form_error('email','<p class="help-block">','</p>'); ?>
                    <br>
                    <div class="form-group input-group ">
                        <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input class="login-form" type="password" name="password" placeholder="Enter Your Password" >
                     </div>
                     <?php echo form_error('password','<p class="help-block">','</p>'); ?>

                     <br>

          
                
           
            <div class="send-button">
                <input class="btn btn-lg   login_btn" type="submit" name="loginSubmit" value="LOGIN">
            </div>
            </fieldset>
        </form>
        <br>
        <!-- <p>Don't have an account? <a href="<?php echo base_url('users/registration'); ?>">Register</a></p> -->
        <br>
    </div>
</div>
        
        </div></div></div>
        <script>
                $(document).ready(function(){

                $("#loginform").validate({
                    rules:{
                        email:{
                            required:true,
                            email:true
                        },
                        password:{
                            required:true,
                            minlength:5
                        },
                    }, 
                    messages:{
                        password:{
                            required:"Please provide a valid password",
                        }
                    }

                    
                
                
                });

            });
            


        </script>
    </body>
    
<!-- jQuery -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<!-- <script src="<?php echo base_url('assets/js/adminlte.min.js') ?>"></script> -->
    <!-- <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script> -->




<!-- Bootstrap 4 -->

<script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<!-- <script src=".<?php echo base_url() ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url()?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url() ?>/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url() ?>/assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
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
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
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

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = "1"
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
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
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






</body>
</html>
