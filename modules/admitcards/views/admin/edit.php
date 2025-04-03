<!-- <section class="content-header">
    <div class="container-fluid">
    	<?php //echo $form; ?> 
    </div>
</section> -->
<!-- <pre>
	<?php //print_r($edit_data);?>
</pre> -->

<script src="<?php echo base_url('assets') ?>/js/MFS100/mfs100-9.0.2.6.js"></script>

<section class="content-header">
  	<div class="container-fluid">
        <div class="row mb-2">
          	<div class="col-sm-6">
            	<h1>Contacts</h1>
          	</div>
          	<div class="col-sm-6">
            	<ol class="breadcrumb float-sm-right">
              		<li class="breadcrumb-item"><a href="#">Home</a></li>
              		<li class="breadcrumb-item active">Contacts</li>
            	</ol>
          	</div>
        </div>
  	</div><!-- /.container-fluid -->
</section>

<section class="content">
  	<!-- Default box -->
  	<div class="card card-solid">
        <div class="card-body pb-0">
          	<div class="row">
            	<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
              		<div class="card bg-light d-flex flex-fill">
                		<div class="card-header text-muted border-bottom-0">
                  			Symbol no.: <?php echo $edit_data->symbol_number?>
                		</div>
                	<div class="card-body pt-0">
                  		<div class="row">
                    		<div class="col-5 text-center">
                      			<!-- <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid"> -->
                      			<!-- <img src="http://103.175.192.52/storage/documents/<?php echo $edit_data->photo_link?>"> -->
                      			<!-- <img src="<?php echo $edit_data->photo_link?>" style='width:250px'> -->
                      			<img src="<?php echo site_url().'uploads/students/'.$edit_data->photo_link?>" style='width:30vh'>
                    		</div>
	                    	<div class="col-7">
	                      		<h2 class="lead"><b><?php echo $edit_data->first_name; ?> <?php echo ($edit_data->middle_name)?$edit_data->middle_name:'';?><?php echo $edit_data->last_name; ?></b></h2>
	                  			<p class="text-muted text-sm"><b>Gender: </b> <?php echo $edit_data->gender?> </p>
<!--	                      		<p class="text-muted text-sm"><b>DOB: </b> --><?php //echo $edit_data->DOB . '('.$edit_data->year_dob_nepali_date.'-'. $edit_data->month_dob_nepali_date .'-'. $edit_data->day_dob_nepali_date .')'?><!-- </p>-->
<!--	                      		<p class="text-muted text-sm"><b>College: </b> --><?php //echo $edit_data->college?><!-- </p>-->
	                      		<p class="text-muted text-sm"><b>Level: </b> <?php echo $edit_data->level?> </p>
	                      		<p class="text-muted text-sm"><b>Program: </b> <?php echo $edit_data->program?> </p>
	                      		<ul class="ml-4 mb-0 fa-ul text-muted">
<!--	                        		<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: --><?php //echo $edit_data->vdc_municipality_english?><!--</li>-->
	                        		<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $edit_data->phone_no?></li>
	                        		<li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> email #: <?php echo $edit_data->email?></li>
	                      		</ul>
	                    	</div>
	                  	</div>
	                </div>
	                <!-- <div class="card-footer">
	                  <div class="text-right">
	                    <a href="#" class="btn btn-sm bg-teal">
	                      <i class="fas fa-comments"></i>
	                    </a>
	                    <a href="#" class="btn btn-sm btn-primary">
	                      <i class="fas fa-user"></i> View Profile
	                    </a>
	                  </div>
	                </div>
	              </div> -->
	            </div>
	            
			</div>
			<!-- form detail -->
			<div class="col-12 col-sm-6 col-md-6">
				<form method="POST" action="<?php echo site_url('admin/Admitcards/save_image');?>" style="width: 100%;">
					<input type = "hidden" name = "id" id = "id" value="<?php echo set_value('id',(isset($edit_data->id)?$edit_data->id:''));?>"/>
					<div class="row">
						<div class="col-md-4">
							New Image:<br />
							<div style="border:dotted 1px; padding:2px; margin:5px; height: 15rem">
								<video id="video" width="200rem" height="200rem" autoplay></video>
								<canvas id="canvas" width="200rem" height="200rem"></canvas>
								<span id="image_student"></span>
							</div>
						</div>
						<div class="col-md-4">
							Left Thumb:<br />
							<div style="border:dotted 1px; padding:2px; margin:5px; height: 15rem">
								<img id="imgFinger" width="145px" height="188px" alt="Finger Image" />
								<input type="hidden" name="thumb" id="thumb_left">
								<!-- <input type="button" id="start-camera" value="Start Camera" class="btn btn-primary">
								<video id="video" width="320" height="240" autoplay></video> -->
							</div>
						</div>
						<div class="col-md-4">
							Right Thumb:<br />
							<div style="border:dotted 1px; padding:2px; margin:5px; height: 15rem">
								<img id="imgFingerright" width="145px" height="188px" alt="Finger Image" />
								<input type="hidden" name="thumb2" id="thumb_right">
								<!-- <input type="button" id="click-photo" value="Click Photo" class="btn btn-primary">
								<canvas id="canvas" width="320" height="240"></canvas>
								<input type="hidden" id='webcam' type="text" class='form-control' name='webcam'> -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<hr>
							<input type="button" id="start-camera" value="Start Camera" class="btn btn-primary">
							<input type="button" id="click-photo" value="Click Photo" class="btn btn-primary">
							<input type="hidden" id='webcam' type="text" class='form-control' name='webcam'>
							|
							<input type="submit" id="btnCapture" value="Capture Left" class="btn btn-primary btn-100" onclick="return Capture()" />
							<input type="submit" id="btnCapture" value="Capture Right" class="btn btn-primary btn-100" onclick="return Capture_right()" />
							<br>
							<hr>
							<button type="submit" class="btn bg-green waves-effect">Submit</button>	
						</div>
					</div>
				</form>
			</div>
			
	    </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          	<nav aria-label="Contacts Page Navigation">
            	<ul class="pagination justify-content-center m-0">
              		<li class="page-item active"><a class="page-link" href="#">1</a></li>
              		<li class="page-item"><a class="page-link" href="#">2</a></li>
              		<li class="page-item"><a class="page-link" href="#">3</a></li>
              		<li class="page-item"><a class="page-link" href="#">4</a></li>
              		<li class="page-item"><a class="page-link" href="#">5</a></li>
              		<li class="page-item"><a class="page-link" href="#">6</a></li>
              		<li class="page-item"><a class="page-link" href="#">7</a></li>
              		<li class="page-item"><a class="page-link" href="#">8</a></li>
            	</ul>
          	</nav>
        </div> -->
        <!-- /.card-footer -->
  	</div>
  	<!-- /.card -->

</section>

<!-- check thumb device status -->
<section class="content">
  	<!-- Default box -->
  	<div class="card card-solid">
        <div class="card-body pb-0">
        	<div class="row">
        		<div class="col-12">
					<h4>Check Thumd Device</h4>
					<input type="submit" id="btnInfo" value="Get Info" class="btn btn-primary btn-100" onclick="return GetInfo()" />
					<table align="left" border="0" style="width:100%; padding-right:20px;">
	                    <tr>
	                        <td style="width: 100px;">Key:</td>
	                        <td colspan="3">
	                            <input type="text" value="" id="txtKey" class="form-control" />
	                        </td>
	                    </tr>
	                    <tr>
	                        <td align="left" style="width: 100px;">Serial No:</td>
	                        <td align="left" style="width: 150px;" id="tdSerial"></td>
	                        <td align="left" style="width: 100px;">Certification:</td>
	                        <td align="left" id="tdCertification"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Make:</td>
	                        <td align="left" id="tdMake"></td>
	                        <td align="left">Model:</td>
	                        <td align="left" id="tdModel"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Width:</td>
	                        <td align="left" id="tdWidth"></td>
	                        <td align="left">Height:</td>
	                        <td align="left" id="tdHeight"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Local IP</td>
	                        <td align="left" id="tdLocalIP"></td>
	                        <td align="left">Local MAC:</td>
	                        <td align="left" id="tdLocalMac"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Public IP</td>
	                        <td align="left" id="tdPublicIP"></td>
	                        <td align="left">System ID</td>
	                        <td align="left" id="tdSystemID"></td>
	                    </tr>
			            <tr>
			                <td width="220px">
			                    Status:
			                </td>
			                <td>
			                    <input type="text" value="" id="txtStatus" class="form-control" />
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Quality:
			                </td>
			                <td>
			                    <input type="text" value="" id="txtImageInfo" class="form-control" />
			                </td>
			            </tr>
			        </table>
				</div>
        	</div>
        </div>
    </div>
</section>



<?php /*<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo $edit_data->symbol_number; ?></a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<form method="POST" action="<?php echo site_url('admin/Admitcards/save_image');?>">
				<input type = "hidden" name = "id" id = "id" value="<?php echo set_value('id',(isset($edit_data->id)?$edit_data->id:''));?>"/>
				<div class='form-group'>
					<div class="row">
						<div class="col-md-6">
							First Name: <br /><br /><?php echo $edit_data->first_name; ?>
						</div>
						<div class="col-md-6">
							Last Name: <br /><br /><?php echo $edit_data->last_name; ?>
						</div>
					</div>
					<br /><br /><br />
					<div class="row">
						<div class="col-md-6">
							Old Image:<br /><br />
							<img src="https://nhpc.gov.np/backend/web/<?php echo $edit_data->photo_link?>" class="table_image" height="100px" width="100px">
						</div>
						<div class="col-md-6">
							New Image:<br />
							<input type="button" id="start-camera" value="Start Camera" class="btn btn-primary">
							<video id="video" width="120" height="120" autoplay></video>
							<input type="button" id="click-photo" value="Click Photo" class="btn btn-primary">
							<canvas id="canvas" width="120" height="120"></canvas>
							<input type="hidden" id='webcam' type="text" class='form-control' name='webcam'>
						</div>
					</div>
					
					<!-- <div class="row">
						<div class="col-md-6">
							<input type="button" id="start-camera" value="Start Camera" class="btn btn-primary">
							<video id="video" width="320" height="240" autoplay></video>
						</div>
						<div class="col-md-6">
							<input type="button" id="click-photo" value="Click Photo" class="btn btn-primary">
							<canvas id="canvas" width="320" height="240"></canvas>
							<input type="hidden" id='webcam' type="text" class='form-control' name='webcam'>
						</div>
					</div> -->
				</div>
				<div class='form-group'>
					<label for='title'>Thumb Image</label>

					<table align="left" border="0" width="100%">
	                    <tr>
	                        <td>
	                            
	                        </td>
	                        <td>
	                            
	                        </td>
	                        <td>
	                            
	                        </td>
	                    </tr>
	                   <!--  <tr>
	                        <td colspan="2">
	                            <input type="submit" id="btnCaptureAndMatch" value="Capture and Match" class="btn btn-primary btn-200" onclick="return Match()" />
	                        </td>
	                    </tr>
	                    <tr>
	                        <td colspan="2">
	                            <input type="submit" id="btnMatch" value="Match" class="btn btn-primary btn-200" onclick="return Verify()" />
	                        </td>
	                    </tr>
	                    <tr>
	                        <td>
	                            <input type="submit" id="btnGetPid" value="Get PID (X)" class="btn btn-primary btn-100" onclick="return GetPid()" />
	                        </td>
	                        <td>
	                            <input type="submit" id="btnProtoGetPid" value="Get PID (P)" class="btn btn-primary btn-100" onclick="return GetProtoPid()" />
	                        </td>
	                    </tr>
	                    <tr>
	                        <td>
	                            <input type="submit" id="btnGetRbd" value="Get RBD (X)" class="btn btn-primary btn-100" onclick="return GetRbd()" />
	                        </td>
	                        <td>
	                            <input type="submit" id="btnProtoGetRbd" value="Get RBD (P)" class="btn btn-primary btn-100" onclick="return GetProtoRbd()" />
	                        </td>
	                    </tr> -->
	                </table>
	                <table align="left" border="0" style="width:100%; padding-right:20px;">
	                    <tr>
	                        <td style="width: 100px;">Key:</td>
	                        <td colspan="3">
	                            <input type="text" value="" id="txtKey" class="form-control" />
	                        </td>
	                    </tr>
	                    <tr>
	                        <td align="left" style="width: 100px;">Serial No:</td>
	                        <td align="left" style="width: 150px;" id="tdSerial"></td>
	                        <td align="left" style="width: 100px;">Certification:</td>
	                        <td align="left" id="tdCertification"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Make:</td>
	                        <td align="left" id="tdMake"></td>
	                        <td align="left">Model:</td>
	                        <td align="left" id="tdModel"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Width:</td>
	                        <td align="left" id="tdWidth"></td>
	                        <td align="left">Height:</td>
	                        <td align="left" id="tdHeight"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Local IP</td>
	                        <td align="left" id="tdLocalIP"></td>
	                        <td align="left">Local MAC:</td>
	                        <td align="left" id="tdLocalMac"></td>
	                    </tr>
	                    <tr>
	                        <td align="left">Public IP</td>
	                        <td align="left" id="tdPublicIP"></td>
	                        <td align="left">System ID</td>
	                        <td align="left" id="tdSystemID"></td>
	                    </tr>
	                </table>
	                <table width="100%">
			            <tr>
			                <td width="220px">
			                    Status:
			                </td>
			                <td>
			                    <input type="text" value="" id="txtStatus" class="form-control" />
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Quality:
			                </td>
			                <td>
			                    <input type="text" value="" id="txtImageInfo" class="form-control" />
			                </td>
			            </tr>
			            <!--<tr>
			                <td>
			                    NFIQ:
			                </td>
			                <td>
			                    <input type="text" value="" id="txtNFIQ" class="form-control" />
			                </td>
			            </tr>-->
			            <!-- <tr>
			                <td>
			                    Base64Encoded ISO Template
			                </td>
			                <td>
			                    <textarea id="txtIsoTemplate" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Base64Encoded ANSI Template
			                </td>
			                <td>
			                    <textarea id="txtAnsiTemplate" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Base64Encoded ISO Image
			                </td>
			                <td>
			                    <textarea id="txtIsoImage" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Base64Encoded Raw Data
			                </td>
			                <td>
			                    <textarea id="txtRawData" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Base64Encoded Wsq Image Data
			                </td>
			                <td>
			                    <textarea id="txtWsqData" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr> -->
			            <!-- <tr>
			                <td>
			                    Encrypted Base64Encoded Pid/Rbd
			                </td>
			                <td>
			                    <textarea id="txtPid" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Encrypted Base64Encoded Session Key
			                </td>
			                <td>
			                    <textarea id="txtSessionKey" style="width: 100%; height:50px;" class="form-control"> </textarea>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Encrypted Base64Encoded Hmac
			                </td>
			                <td>
			                    <input type="text" value="" id="txtHmac" class="form-control" />

			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Ci
			                </td>
			                <td>
			                    <input type="text" value="" id="txtCi" class="form-control" />
			                </td>
			            </tr> -->
			            <!-- <tr>
			                <td>
			                    Pid/Rbd Ts
			                </td>
			                <td>
			                    <input type="text" value="" id="txtPidTs" class="form-control" />
			                </td>
			            </tr> -->
			        </table>
					<div class="row">
						
					</div>
				</div>
				<button type="submit" class="btn bg-green waves-effect">Submit</button>	
			</div>
		</div>
	</form>
	</div>
</div>
</section>*/?>

<script type="text/javascript">
	$(function(){
		// $('#video').hide();
		<?php if($edit_data->webcam){?>
			$('#video').hide();
			$('#canvas').hide();
			$('#image_student').html('<img src="<?php echo site_url("uploads/webcam/". $edit_data->webcam)?>" width="200rem" height="200rem">');
			$('#webcam').val('<?php echo $edit_data->webcam?>');
		<?php }else{?>
			$('#canvas').hide();
			$('#image_student').hide();
		<?php }?>

		<?php if($edit_data->thumb){?>
			document.getElementById('imgFinger').src = '<?php echo $edit_data->thumb?>';
            document.getElementById('thumb_left').value = '<?php echo $edit_data->thumb?>';
		<?php }?>

		<?php if($edit_data->thumb){?>
			document.getElementById('imgFingerright').src = '<?php echo $edit_data->thumb2?>';
            document.getElementById('thumb_right').value = '<?php echo $edit_data->thumb2?>';
		<?php }?>
	});
	let camera_button = document.querySelector("#start-camera");
	let video = document.querySelector("#video");
	let click_button = document.querySelector("#click-photo");
	let canvas = document.querySelector("#canvas");

	camera_button.addEventListener('click', async function() {
		$('#video').show();
		$('#canvas').hide();
		$('#image_student').hide();
	   	let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
		video.srcObject = stream;
	});

	click_button.addEventListener('click', function() {
		$('#video').hide();
		$('#canvas').show();
		$('#image_student').hide();
	   	canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
	   	let image_data_url = canvas.toDataURL('image/jpeg');
	   	$('#webcam').val(image_data_url);
	});
	// $(document).ready(function() {
   	// });
</script>

<!-- script for finger print reader -->

<script language="javascript" type="text/javascript">


    var quality = 60; //(1 to 100) (recommanded minimum 55)
    var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

    function GetInfo() {
        document.getElementById('tdSerial').innerHTML = "";
        document.getElementById('tdCertification').innerHTML = "";
        document.getElementById('tdMake').innerHTML = "";
        document.getElementById('tdModel').innerHTML = "";
        document.getElementById('tdWidth').innerHTML = "";
        document.getElementById('tdHeight').innerHTML = "";
        document.getElementById('tdLocalMac').innerHTML = "";
        document.getElementById('tdLocalIP').innerHTML = "";
        document.getElementById('tdSystemID').innerHTML = "";
        document.getElementById('tdPublicIP').innerHTML = "";


        var key = document.getElementById('txtKey').value;

        var res;
        if (key.length == 0) {
            res = GetMFS100Info();
        }
        else {
            res = GetMFS100KeyInfo(key);
        }

        if (res.httpStaus) {

            document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

            if (res.data.ErrorCode == "0") {
                document.getElementById('tdSerial').innerHTML = res.data.DeviceInfo.SerialNo;
                document.getElementById('tdCertification').innerHTML = res.data.DeviceInfo.Certificate;
                document.getElementById('tdMake').innerHTML = res.data.DeviceInfo.Make;
                document.getElementById('tdModel').innerHTML = res.data.DeviceInfo.Model;
                document.getElementById('tdWidth').innerHTML = res.data.DeviceInfo.Width;
                document.getElementById('tdHeight').innerHTML = res.data.DeviceInfo.Height;
                document.getElementById('tdLocalMac').innerHTML = res.data.DeviceInfo.LocalMac;
                document.getElementById('tdLocalIP').innerHTML = res.data.DeviceInfo.LocalIP;
                document.getElementById('tdSystemID').innerHTML = res.data.DeviceInfo.SystemID;
                document.getElementById('tdPublicIP').innerHTML = res.data.DeviceInfo.PublicIP;
            }
        }
        else {
            alert(res.err);
        }
        return false;
    }

    function Capture() {
        try {
            document.getElementById('txtStatus').value = "";
            document.getElementById('imgFinger').src = "data:image/bmp;base64,";
            document.getElementById('txtImageInfo').value = "";
            // document.getElementById('txtIsoTemplate').value = "";
            // document.getElementById('txtAnsiTemplate').value = "";
            // document.getElementById('txtIsoImage').value = "";
            // document.getElementById('txtRawData').value = "";
            // document.getElementById('txtWsqData').value = "";

            var res = CaptureFinger(quality, timeout);
            if (res.httpStaus) {

                document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                    document.getElementById('thumb_left').value = "data:image/bmp;base64," + res.data.BitmapData;
                    var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
                    document.getElementById('txtImageInfo').value = imageinfo;
                    // document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                    // document.getElementById('txtAnsiTemplate').value = res.data.AnsiTemplate;
                    // document.getElementById('txtIsoImage').value = res.data.IsoImage;
                    // document.getElementById('txtRawData').value = res.data.RawData;
                    // document.getElementById('txtWsqData').value = res.data.WsqImage;
                }
            }
            else {
                alert(res.err);
            }
        }
        catch (e) {
            alert(e);
        }
        return false;
    }

    function Capture_right() {
        try {
            document.getElementById('txtStatus').value = "";
            document.getElementById('imgFingerright').src = "data:image/bmp;base64,";
            document.getElementById('txtImageInfo').value = "";

            var res = CaptureFinger(quality, timeout);
            if (res.httpStaus) {

                document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('imgFingerright').src = "data:image/bmp;base64," + res.data.BitmapData;
                    document.getElementById('thumb_right').value = "data:image/bmp;base64," + res.data.BitmapData;
                    var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
                    document.getElementById('txtImageInfo').value = imageinfo;
                }
            }
            else {
                alert(res.err);
            }
        }
        catch (e) {
            alert(e);
        }
        return false;
    }

    /*function Verify() {
        try {
            var isotemplate = document.getElementById('txtIsoTemplate').value;
            var res = VerifyFinger(isotemplate, isotemplate);

            if (res.httpStaus) {
                if (res.data.Status) {
                    alert("Finger matched");
                }
                else {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        alert("Finger not matched");
                    }
                }
            }
            else {
                alert(res.err);
            }
        }
        catch (e) {
            alert(e);
        }
        return false;

    }

    function Match() {
        try {
            var isotemplate = document.getElementById('txtIsoTemplate').value;
            var res = MatchFinger(quality, timeout, isotemplate);

            if (res.httpStaus) {
                if (res.data.Status) {
                    alert("Finger matched");
                }
                else {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        alert("Finger not matched");
                    }
                }
            }
            else {
                alert(res.err);
            }
        }
        catch (e) {
            alert(e);
        }
        return false;

    }

    function GetPid() {
        try {
            var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
            var isoImageFIR = document.getElementById('txtIsoImage').value;

            var Biometrics = Array(); // You can add here multiple FMR value
            Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

            var res = GetPidData(Biometrics);
            if (res.httpStaus) {
                if (res.data.ErrorCode != "0") {
                    alert(res.data.ErrorDescription);
                }
                else {
                    // document.getElementById('txtPid').value = res.data.PidData.Pid
                    // document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                    // document.getElementById('txtHmac').value = res.data.PidData.Hmac
                    // document.getElementById('txtCi').value = res.data.PidData.Ci
                    // document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                }
            }
            else {
                alert(res.err);
            }

        }
        catch (e) {
            alert(e);
        }
        return false;
    }
    function GetProtoPid() {
        try {
            var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
            var isoImageFIR = document.getElementById('txtIsoImage').value;

            var Biometrics = Array(); // You can add here multiple FMR value
            Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

            var res = GetProtoPidData(Biometrics);
            if (res.httpStaus) {
                if (res.data.ErrorCode != "0") {
                    alert(res.data.ErrorDescription);
                }
                else {
                    // document.getElementById('txtPid').value = res.data.PidData.Pid
                    // document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                    // document.getElementById('txtHmac').value = res.data.PidData.Hmac
                    // document.getElementById('txtCi').value = res.data.PidData.Ci
                    // document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                }
            }
            else {
                alert(res.err);
            }

        }
        catch (e) {
            alert(e);
        }
        return false;
    }
    function GetRbd() {
        try {
            var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
            var isoImageFIR = document.getElementById('txtIsoImage').value;

            var Biometrics = Array();
            Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
            Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
            // Here you can pass upto 10 different-different biometric object.


            var res = GetRbdData(Biometrics);
            if (res.httpStaus) {
                if (res.data.ErrorCode != "0") {
                    alert(res.data.ErrorDescription);
                }
                else {
                    // document.getElementById('txtPid').value = res.data.RbdData.Rbd
                    // document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                    // document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                    // document.getElementById('txtCi').value = res.data.RbdData.Ci
                    // document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                }
            }
            else {
                alert(res.err);
            }

        }
        catch (e) {
            alert(e);
        }
        return false;
    }

    function GetProtoRbd() {
        try {
            var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
            var isoImageFIR = document.getElementById('txtIsoImage').value;

            var Biometrics = Array();
            Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
            Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
            // Here you can pass upto 10 different-different biometric object.


            var res = GetProtoRbdData(Biometrics);
            if (res.httpStaus) {
                if (res.data.ErrorCode != "0") {
                    alert(res.data.ErrorDescription);
                }
                else {
                    // document.getElementById('txtPid').value = res.data.RbdData.Rbd
                    // document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                    // document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                    // document.getElementById('txtCi').value = res.data.RbdData.Ci
                    // document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                }
            }
            else {
                alert(res.err);
            }

        }
        catch (e) {
            alert(e);
        }
        return false;
    }*/
</script>