<section id="inner-banner" class="">
	<div class="inner-banner-wrapper service-banner-wrapper">
		<div class="image-wrapper">
			<img src="https://images.unsplash.com/photo-1579684453377-48ec05c6b30a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1968&q=80" alt="">
		</div>
		<div class="image-overlay"></div>
		<div class="crum-page-title">
			<div class="container">
				<div class="d-flex justify-content-between">
					<div class="heading">
						<h3>RE-EXAM</h3>
						<!-- <h3>Coming Soon</h3> -->
					</div>
					<div class="bread-crum">
						<span><a href="">HOME </a> / RE-EXAM</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="search-now">
	<div class="search-now-wrapper">
		<div class="container">
			<div class="col-md-12">
				<div class="search-tabs">
					<ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-HP" role="tab" aria-controls="pills-home" aria-selected="true">RE-EXAM</a>
						</li>
					</ul> 
                    <div class="tab-card"> 
                        <h4>Note</h4>
                        <p>Please make sure to pay the voucher of amout 3000 for the all subject as Re-exam form in designated nhpc account.</p>
                        <p>Upload the valid voucher  image in next step of this page so that our administration team will verify it.  </p>
                        <p>Please rename the voucher photo's name into your firstname and don't use any space or ' . '  Thank you.</p>
                        <p>New symbol Number will be provided to you after the verification process is complete. Thank you !</p>
                    </div>
					<div class="tab-content" id="pills-tabContent tab-content">
						<div class="tab-pane fade show active" id="pills-HP" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="tab-card"> 
								<div class="search-area"> 
									<?php //echo form_open('', array('id' =>'form-admit-card')); ?>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12 col-lg-6">
												<label for="">Symbol Number</label>
												<input type="text" class="form-control" placeholder="Symbol Number" id="symbol_number" name="symbol_number">
											</div>
											<div class="col-md-12 col-lg-6">
												<label for="">Date of Birth (YYYY-MM-DD) (Example:2045-12-12)<sub style="color:red">Please enter nepali date of birth</sub></label>
												<input type="text" class="form-control" placeholder="Date of Birth (YYYY-MM-DD)" id="dob" name="dob">
											</div> 
											<div class="col-md-2 submit">
												<label for=""></label>
												<button class="btn btn-custom w-100" onclick="check_user()">Proceed</button>
											</div>
										</div>
									</div>
									<?php //echo form_close(); ?>
								</div>
								 
							</div>
						</div>
                        <div class="search-display" id="show_result">

								</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function isValidDate(dateString) {
  		var regEx = /^\d{4}-\d{2}-\d{2}$/;
  		return dateString.match(regEx) != null;
	}
    let viewAllCompletedBooking = document.getElementById('pills-HP');
	function check_user() {
        
		var symbol_number = $('#symbol_number').val();
		var dob = $('#dob').val();
		var url = '<?php echo site_url("admit_cards/re_exam_json") ?>';

		if(!symbol_number){
			alert('Please enter your symbol number');
			return false;
		}
		if(!dob){
			alert('Please enter your date of birth');
			return false;
		}

		if(!isValidDate(dob)){
			alert('Please enter correct date format');
			return false;
		}
      
            console.log(viewAllCompletedBooking);

		$.post(url,{symbol_number:symbol_number, dob:dob}, function(data){
          
            $("#pills-HP").removeClass("active");
			$('#show_result').html(data);

            
		},'html')
	}
	</script>
