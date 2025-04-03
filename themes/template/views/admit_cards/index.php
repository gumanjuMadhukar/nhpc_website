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
						<h3>Admit Card</h3>
						<!-- <h3>Coming Soon</h3> -->
					</div>
					<div class="bread-crum">
						<span><a href="">HOME </a> / Admit Card</span>
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
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-HP" role="tab" aria-controls="pills-home" aria-selected="true">Download Your Admit Card</a>
						</li>
					</ul> 
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-HP" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="tab-card"> 
								<div class="search-area">
									<?php //echo form_open('', array('id' =>'form-admit-card')); ?>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="">First Name</label>
												<!-- <input type="text" class="form-control" placeholder="User Name" id="username" name="username"> -->
												<input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name">
											</div>
											<div class="col-md-6">
												<label for="">Last Name</label>
												<input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
											</div>
											<div class="col-md-12">
												<label for="">Date of Birth (YYYY-MM-DD) (Example:2045-12-12)<sub style="color:red">Please enter nepali date of birth</sub></label>
												<input type="text" class="form-control" placeholder="Date of Birth (YYYY-MM-DD)" id="dob" name="dob">
											</div> 
											<div class="col-md-2 submit">
												<label for=""></label>
												<button class="btn btn-custom w-100" onclick="download_card()">Download</button>
											</div>
										</div>
									</div>
									<?php //echo form_close(); ?>
								</div>
								<!-- <div class="search-display" id="show_health_professional">

								</div>  -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function download_card() {
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var dob = $('#dob').val();
		var url = '<?php echo site_url("admit_cards/download") ?>?first_name=' + first_name + '&last_name=' + last_name + '&dob=' + dob;


		myWindow = window.open(url,"", "height=900,width=1300");

		myWindow.document.close(); 

		myWindow.focus();
		myWindow.print();
	}
	</script>
