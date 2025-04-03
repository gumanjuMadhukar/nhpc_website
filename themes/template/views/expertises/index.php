<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
									<?php  echo form_open_multipart(site_url('expertises/save'), array('id' =>'form-admit-card')); ?>
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
												<h4>Professional Detail</h4>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6">
												<label for="">Academic Qualification*</label>
												<select class="form-control" name="applied_qualification" name="applied_qualification">
													<option>Bachelor</option>
													<option>BACHOLOR / Masters</option>
													<option>BACHOLOR / Masters / MPHIL</option>
													<option>Bachelor /Masters / MPHIL / P.HD</option>
												</select>
												<!-- <input type="text" class="form-control" placeholder="Applied For Academic Qualificationn" id="applied_qualification" name="applied_qualification" required> -->
											</div>
											<!-- <div class="col-md-4">
												<label for="">Education*</label>
												<select class="form-control" name="level" id="level" required>
													<option>--Please Select--</option>
													<?php foreach ($level as $key => $value) {?>
														<option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
													<?php }?>
												</select>
											</div> -->
											<div class="col-md-6">
												<label for="">Speialization*</label>
												<input type="text" class="form-control" placeholder="Speialization" id="specialization" name="specialization" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Courses Taught / Area of Expertise*</label>
												<input type="text" class="form-control" placeholder="Course Studied / Area of Expertise" id="area_of_expertise" name="area_of_expertise" required>
											</div>
											<div class="col-md-6">
												<label for="">Applied For*</label>
												<select class="form-control" name="subject[]" id="subject" required  multiple="multiple">
													<!-- <option>--Applied For--</option> -->
													<?php //foreach ($subject as $key => $value) {?>
														<!-- <option value="<?php echo $value['name']?>"><?php echo $value['name']?></option> -->
													<?php // }?>
													<option>M.Sc. MLT/Medical/Clinical Bio-Chemistry</option>
													<option>M.Sc. MLT/Medical/Clinical (Hematology & Transfusion Medicine)</option>
													<option>M.Sc. MLT/Medical/Clinical Microbiology</option>
													<option>Master In Homeopathy (MD)</option>
													<option>M.Sc. Perfusion Technology</option>
													<option>Master In Clinical Yoga/Yoga And Rehabilitation(MD)</option>
													<option>Master In Optometry/Master Of Optometry/ Master Of Clinical Optometry/M.Sc. In Optometry/M.Phil In O</option>
													<option>M.Sc. In Medical Imaging Technology/M.Sc. In Radiology Technology (M.Sc. MIT)</option>
													<option>M.Phil. In Clinical Psychology</option>
													<option>Master Of Public Health (MPH)</option>
													<option>Master Of Physiotherapy (MPT)</option>
													<option>Master Of Audiology & Speech Language Pathology (MASLP)</option>
													<option>Master Of Science Immunology</option>
													<option>MPT (Obstetrics And Gynecology)</option>
													<option>M.Sc. Anesthesia Technology</option>
													<option>MD Clinical Naturopathy</option>
													<option>Master In Health Promotion And Education (MHPE)</option>
													<option>Master in Dentel Surgery (MDS)</option>
													<option>B.Sc. Anaesthesia Technology</option>
													<option>Bachelor Of Science In MLT (B.Sc. MLT/ BMLT)</option>
													<option>Bachelor In Optometry / D. Optometry</option>
													<option>B.Sc. Medical Microbiology</option>
													<option>B.Sc. Medical Imaging Technology</option>
													<option>Bachelor Of Physiotherapy (BPT)</option>
													<option>Bachelor In Homoeopathic Medicine And Surgery (BHMS)</option>
													<option>Bachelor In Naturopathy & Yogic Sciences (BNYS)</option>
													<option>Bachelor In Audiology And Speech Language Pathology (BASLP)</option>
													<option>Bachelor Of Public Health (BPH)</option>
													<option>B.Sc. Cardiac Technology</option>
													<option>B.Sc. Radiotherapy Technology</option>
													<option>Bachelor In Perfusion Technology</option>
													<option>B.Sc. Renal Dialysis Techonology</option>
													<option>Bachelor Of Prosthetics And Orthotics</option>
													<option>B.Sc. Medical Biochemistry</option>
													<option>Bachelor Of Occupational Therapy</option>
													<option>Bachelor in Sowa-Rigpa</option>
													<option>Post Graduate Diploma In Health Promotion & Education</option>
													<option>B.Sc. Operation Theatre Technology</option>
													<option>Bacholer in dentel surgery (BDS)</option>
													<option>PCL In Radiography/Diploma In X-Ray Technology</option>
													<option>PCL in Dental Science (Dental Hygiene)</option>
													<option>PCL In Ophthalmic Science/Diploma In Ophthalmic Technique</option>
													<option>PCL In Medical Laboratory Technology (CMLT/ DMLT)</option>
													<option>PCL In General Medicine (HA)</option>
													<option>PCL In Physiotherapy</option>
													<option>Diploma In Operation Theatre Technology</option>
													<option>Diploma In Dialysis Technology</option>
													<option>PCL In Acupuncture, Acupressure And Moxibustion</option>
													<option>Dental science (DH)</option>
													<option>PCL in Sowa-Rigpa</option>

												</select>
												<script type="text/javascript">
													$(document).ready(function() {
													    $('#subject').select2();
													});
												</script>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6">
												<label for="">Council Registration* </label>
												<select class="form-control" name="" required>
													<option value="YES">YES</option>
													<option value="NO">NO</option>
													<option value="NOT AVAILABLE">NOT AVAILABLE</option>
												</select>
												<!-- <input type="text" class="form-control" placeholder="Registration No." id="registration_no" name="registration_no" required> -->
											</div>
											<div class="col-md-6">
												<label for="">Experience(In Year)*</label>
												<input type="text" class="form-control" placeholder="Experience" id="experiance" name="experiance" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Council Registration No.</label>
												(If yes : Specify Council Number)
												<!-- <select class="form-control" name="registration_no" required>
													<option value="YES">YES</option>
													<option value="NO">NO</option>
													<option value="NOT AVAILABLE">NOT AVAILABLE</option>
												</select> -->
												<input type="text" class="form-control" placeholder="Council Registration No." id="registration_no" name="registration_no">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label for="">Current Position*</label>
												<input type="text" class="form-control" placeholder="Current Position" id="verified_position" name="verified_position" required>
											</div>
											<div class="col-md-4">
												<label for="">Institutional Affilation*</label>
												<input type="text" class="form-control" placeholder="Institutional Affilation" id="institutional_affilation" name="institutional_affilation" required>
											</div>
											<div class="col-md-4">
												<label for="">Institutional Address*</label>
												<input type="text" class="form-control" placeholder="Institutional Address" id="institutional_address" name="institutional_address" required>
											</div>
										</div>
										<div class="row form-group">
											
											
										</div>
										
										<div class="row form-group">
											<div class="col-md-2 submit">
												<label for=""></label>
												<button class="btn btn-custom w-100">Submit</button>
											</div>
										</div>
									<?php echo form_close();?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
