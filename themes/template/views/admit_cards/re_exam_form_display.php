<?php if($result){?>
    <style> 
    
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<?php
                if (isset($error)){
                    echo $error;
                }
            ?>
    <form style=" background-color: #FFFFFF; padding:10px" action="<?php echo site_url("admit_cards/save_re_exam_voucher") ?>"  method="POST"  > 
    <div class="form-group row">
            <!-- <label for="staticName" class="col-sm-2 col-form-label">Name</label> -->
            <div class="col-sm-10">
            <img style="height: 150px; width: 150px;" src="https://nhpc.gov.np/backend/web/<?php echo $result['photo_link']?>" readonly alt="..." class="img-thumbnail">

            <!-- <input type="text" readonly class="form-control-plaintext" id="staticName" value="<?php echo ($result['middle_name'])?$result['first_name'] . ' ' . $result['last_name']:$result['first_name'] . ' ' . $result['middle_name'] . ' ' . $result['last_name']?>"> -->
            </div>
        </div>
        <div class="form-group row">
            <label for="staticName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" readonly class="form-control-plaintext" id="staticName" value="<?php echo ($result['middle_name'])?$result['first_name'] . ' ' . $result['last_name']:$result['first_name'] . ' ' . $result['middle_name'] . ' ' . $result['last_name']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticSymbolNumber" class="col-sm-2 col-form-label">Symbol Number</label>
            <div class="col-sm-10">
            <input type="text" name="symbol_number" readonly class="form-control-plaintext" id="staticSymbolNumber"  value="<?php echo $result['symbol_number']?>" >
            </div>
        </div>
        <div class="form-group row">
            <label for="staticLevel" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
            <input type="text" readonly name="level" class="form-control-plaintext" id="staticLevel"  value="<?php echo $result['level']?>" >
            </div>
        </div>
        <div class="form-group row">
            <label for="staticProgram" class="col-sm-2 col-form-label">Program</label>
            <div class="col-sm-10">
            <input type="text" readonly name="program" class="form-control-plaintext" id="staticProgram" value="<?php echo $result['program']?>" >
            </div>
        </div>
        
        <!-- <div class="form-group row">
            <label for="voucher" class="col-sm-2 col-form-label">Voucher</label>
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="col-sm-10">
                <input type="file" class="custom-file-input" id="voucher" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="voucher">Choose file</label>
                <span id="valid-message" style="color:green;"></span>
                <span id="invalid-message" style="color:red;"></span>

            </div>
            </div> -->

            <div class="form-group col-md-6 row">
            <label for="voucher"  class="col-sm-8 col-form-label">Voucher Image <span style="color:red">*</span> <span style="font-weight: bold;"> (Please upload the Voucher Image)</span></label>
                <input type="file" name="voucher_image" class="form-control voucher" id="voucher" placeholder="voucher">
                <span id="uploaded_voucher_image"></span>
            </div>
            <!-- <div class="col-md-2 submit">
                <label for=""></label>
                <button class="btn btn-custom w-100" onclick="check_user()">Proceed</button>
            </div> -->
            <div id="submitBtn" class="col-md-2 submit">
                <!-- <input type="submit" value="Submit"> -->
              <button class="btn btn-custom w-20" >Submit</button>  
            </div>
        </div>
        
    </form>
    
   
<?php }else{?>
	<h2>Please enter correct data</h2>
<?php }?>
<script>  
 $(document).on('change', '#voucher', function(){
                upload_image(this,'admit_cards/image_upload', '#uploaded_voucher_image',);

            });

    function upload_image(id,url,message){  
      id= id.id;
      let name = document.getElementById(id).files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
            {
            alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById(id).files[0]);
            var f = document.getElementById(id).files[0];
            var fsize = f.size||f.fileSize;
            if(fsize > 2000000)
            {
            alert("Image File Size is very big");
            }
            else
            {
            form_data.append("file", document.getElementById(id).files[0]);
            // console.log('formdata');
            // console.log(form_data);
            $.ajax({
              url:"<?php echo base_url(); ?>"+url,
              method:"POST",
              data: form_data,
              contentType: false,
              cache: false,
              processData: false,
                
              beforeSend:function(){
                
              $(message).html("<label class='text-success'>Image Uploading...</label>");

              },   
              success:function(data)
              {
                
                $(message).html("<label class='text-success'>Image Uploaded</label>");
              },
            
            });

            }

    }
  /* this function will call when page loaded successfully */ 	
  $(document).ready(function(){
        /* this function will call when onchange event fired */ 	
        	$("#voucher").on("change",function(){
          /* current this object refer to input element */ 		
          	var $input = $(this);
          /* collect list of files choosen */ 		
          	var files = $input[0].files;
          var filename = files[0].name;
          /* getting file extenstion eg- .jpg,.png, etc */ 		
          	var extension = filename.substr(filename.lastIndexOf("."));
          /* define allowed file types */ 			
          var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          /* testing extension with regular expression */ 		
          	var isAllowed = allowedExtensionsRegx.test(extension);
          if(isAllowed){
              
            $('#valid-message').html('Valid for upload').fadeOut(5000);
            // $('#submitBtn').html('<input type="submit" value="Submit">')
            
            // alert("File type is valid for the upload");
            /* file upload logic goes here... */ 			}
          else{
            $('#invalid-message').html('InValid for upload').fadeOut(5000);
            // alert("Invalid File Type.");
            return false;
          }
        });
        });
    </script> 