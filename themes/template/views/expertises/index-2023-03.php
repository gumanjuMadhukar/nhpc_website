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
						<h3>Experts Registration Form</h3>
						<!-- <h3>Coming Soon</h3> -->
					</div>
					<div class="bread-crum">
						<span><a href="">HOME </a> / Experts Registration Form</span>
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
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-HP" role="tab" aria-controls="pills-home" aria-selected="true">Personal Detail</a>
						</li>
					</ul> 
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-HP" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="tab-card"> 
								<div class="search-area">
									<h2>Under Maintenance</h2>
									<?php /* echo form_open_multipart(site_url('expertises/save'), array('id' =>'form-admit-card')); ?>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">First Name (English)*</label>
												<input type="text" class="form-control" placeholder="First Name (English)" id="first_name" name="first_name" required>
											</div>
											<div class="col-md-4">
												<label for="">Middle Name (English)</label>
												<input type="text" class="form-control" placeholder="Middle Name (English)" id="middle_name" name="middle_name">
											</div>
											<div class="col-md-4">
												<label for="">Last Name (English)*</label>
												<input type="text" class="form-control" placeholder="Last Name (English)" id="last_name" name="last_name" required>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">First Name (Nepali)*</label>
												<input type="text" class="form-control" placeholder="First Name (Nepali)" id="first_name_np" name="first_name_np" required>
											</div>
											<div class="col-md-4">
												<label for="">Middle Name (Nepali)</label>
												<input type="text" class="form-control" placeholder="Middle Name (Nepali)" id="middle_name_np" name="middle_name_np">
											</div>
											<div class="col-md-4">
												<label for="">Last Name (Nepali)*</label>
												<input type="text" class="form-control" placeholder="Last Name (Nepali)" id="last_name_np" name="last_name_np" required>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">Phone</label>
												<input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
											</div>
											<div class="col-md-4">
												<label for="">Mobile*</label>
												<input type="text" class="form-control" placeholder="Mobile" id="mobile" name="mobile" required>
											</div>
											<div class="col-md-4">
												<label for="">Email*</label>
												<input type="text" class="form-control" placeholder="Email" id="email" name="email" required>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">Passsport Size Profile Picture*</label>
												<input type="file" id="file" name="profile_image" accept="image/png, image/jpg, image/jpeg" required>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-md-4">
												<h4>Permanent Address</h4>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">Province*</label>
												<select class="form-control" name="province_id" id="province_id" required>
													<option>--Province--</option>
													<?php foreach ($provinces as $key => $value) {?>
														<option value='<?php echo $value->id?>'><?php echo $value->name?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<label for="">District*</label>
												<select class="form-control" name="district_id" id="district_id" required>
													<option>--District--</option>
													<?php foreach ($district_mvs as $key => $value) {?>
														<option value='<?php echo $value->id?>'><?php echo $value->name?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<label for="">City*</label>
												<select class="form-control" name="city_place_id" id="city_place_id">
													<option>--City--</option>
													<?php foreach ($city_places as $key => $value) {?>
														<option value='<?php echo $value->id?>'><?php echo $value->name?></option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6">
												<label for="">Ward*</label>
												<input type="text" class="form-control" placeholder="Ward" id="ward" name="ward" required>
											</div>
											<div class="col-md-6">
												<label for="">Address*</label>
												<input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<h4>Temporary Address</h4>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">Province</label>
												<select class="form-control" name="temp_province_id" id="temp_province_id">
													<option>--Province--</option>
													<?php foreach ($provinces as $key => $value) {?>
														<option value='<?php echo $value->id?>'><?php echo $value->name?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<label for="">District)</label>
												<select class="form-control" name="temp_district_id" id="temp_district_id">
													<option>--District--</option>
													<?php foreach ($district_mvs as $key => $value) {?>
														<option value='<?php echo $value->id?>'><?php echo $value->name?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<label for="">City</label>
												<select class="form-control" name="temp_city_place_id" id="temp_city_place_id">
													<option>--City--</option>
													<?php foreach ($city_places as $key => $value) {?>
														<option value='<?php echo $value->id?>'><?php echo $value->name?></option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6">
												<label for="">Ward</label>
												<input type="text" class="form-control" placeholder="Ward" id="temp_ward" name="temp_ward">
											</div>
											<div class="col-md-6">
												<label for="">Address</label>
												<input type="text" class="form-control" placeholder="Address" id="temp_address" name="temp_address">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<h4>Professional Detail</h4>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">Education*</label>
												<select class="form-control" name="level" id="level" required>
													<option>--Please Select--</option>
													<?php foreach ($level as $key => $value) {?>
														<option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<label for="">Subject*</label>
												<select class="form-control" name="subject" id="subject" required>
													<option>--Subject--</option>
													<?php foreach ($subject as $key => $value) {?>
														<option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<label for="">Specialization*</label>
												<select class="form-control" name="qualification" id="qualification" required>
													<option>--Specialization--</option>
													<?php foreach ($subject as $key => $value) {?>
														<option value="<?php echo $value['name']?>"><?php echo $value['qualification']?></option>
													<?php }?>
												</select>
												<!-- <input type="text" class="form-control" placeholder="qualification" id="qualification" name="qualification"> -->
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6">
												<label for="">NHPC Council Registration No.*</label>
												<input type="text" class="form-control" placeholder="Registration No." id="registration_no" name="registration_no" required>
											</div>
											<div class="col-md-6">
												<label for="">Experiance(In Year)*</label>
												<input type="text" class="form-control" placeholder="Experiance" id="experiance" name="experiance" required>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6">
												<label for="">Detail Biography (Resume)*</label>
												<input type="file" id="doc_cv" name="doc_cv" accept="image/png, image/jpg, image/jpeg, application/pdf" required>
											</div>
										</div>
										<div class="row form-group">
											
											<div class="col-md-6">
												<label for="">Council Certificate(Front)*</label>
												<input type="file" id="doc_certificate" name="doc_certificate" accept="image/png, image/jpg, image/jpeg, application/pdf" required>
											</div>
											<div class="col-md-6">
												<label for="">Council Certificate(Back)*</label>
												<input type="file" id="certificate_back" name="certificate_back" accept="image/png, image/jpg, image/jpeg, application/pdf" required>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<label for="">Short Informative Bio</label>
												<textarea class="form-control" placeholder="Remark" id="remark" name="remark" rows="8" style="height:278px"></textarea> 
											</div>
										</div>
										<!-- <div class="row form-group">
											<div class="col-md-12">
												<label for="">Date of Birth (YYYY-MM-DD) (Example:2045-12-12)<sub style="color:red">Please enter nepali date of birth</sub></label>
							
												<input type="text" class="form-control" placeholder="Date of Birth (YYYY-MM-DD)" id="dob" name="dob">
											</div> --> 
										<div class="row form-group">
											<div class="col-md-2 submit">
												<label for=""></label>
												<button class="btn btn-custom w-100">Submit</button>
											</div>
										</div>
									<?php echo form_close(); */?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
