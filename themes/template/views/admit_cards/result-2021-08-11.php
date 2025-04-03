<?php /*if(!$student_record){?>
	<h3 style="color:red">No record found</h3>
	<a href="<?php echo site_url('admit_cards')?>">Back</a>
<?php }else{?>
	<div id="admit_card">
		<h2>Admit Card</h2>
	</div>
<?php }*/?>

<style type="text/css">
@media print
{    
	body *,  #tawkchat-minified-container {
		visibility: hidden;
	}
	#printable_section * {
		visibility: visible;
	}
}
</style>
<?php
if($student_record){?>
	<div class="row" style="line-height: 1" id="size">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="printable_section" style="border: 1px solid black; margin-left: 3%; box-shadow: 10px 10px 5px #888888;">
			<br />
			<center style="line-height: .5;  font-size:16px">
				<img width="75" height="75" style="left: 6%; position: absolute; padding-top:-10px" src="<?php echo site_url(); ?>/assets/img/logo.jpg">
				<h3>नेपाल स्वास्थ्य व्यवसायी परिषद</h3>
				<h5>स्वास्थ्य व्यवसायी नाम दर्ता प्रमाण–पत्र परीक्षा</h5>
				<h5>२०७८</h5>
				<h3>प्रवेश पत्र </h3>
			</center>
			<br />
			<br />
			<p style="padding-left:30px;">परीक्षार्थीको लागि</p>
			<div style="border-style:solid; border-width:1px; padding:5px">
				<div style="width: 150px; height: 20px; padding-left: 70%;  text-align: center;">
					<img width="150px;" height="150px; object-fit: cover; object-position: 50% 100%;" src="<?php echo $student_record['photo_link'] ? 'https://nhpc.gov.np/backend/web'.$student_record['photo_link']:'' ; ?>">
					<br />
					<p id="showBarcode" style="text-align: center;"></p>
					<?php
					// $optionsArray = array(
					// 	'elementId'=> 'showBarcode', /* div or canvas id*/
					// 		'value'=>'324242424324242',//$student_record['symbol_number'], /* value for EAN 13 be careful to set right values for each barcode type */
					// 		'value'=>$student_record['symbol_number'],//'324242424324242',//$student_record['symbol_number'], /* value for EAN 13 be careful to set right values for each barcode type */
					// 		'type'=>'code39',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
					// 	);
					// 	echo BarcodeGenerator::widget($optionsArray);
					?>
				</div>
				<div style="width: 145px; height: 20px; padding-left: 85%;  text-align: center; margin-top:-19px">
					<div style="border-style:dashed; border-width: 1px;height: 130px;width: 130px; object-position: 50% 100%; padding:10px; line-height:1.5">
						हालसालै खिचेको पासपोर्ट साइजको फोटो
					</div>
				</div>

				<div class="admit_card" style="font-size: 14px; margin-left: 20px;">
					<!-- <div class="admit_card" style="font-size: 20px; margin-left: 20px;"> -->

					<!-- <p>रोल नम्बर    <span style="padding-left:1em;">: <?php echo $student_record['symbol_number'] ? $student_record['symbol_number'] : '';?> <span> -->
					<table>
						<tr>
							<!-- <td>Bar code</td> -->
							<td height="1px" width="1px">
								<img src="<?php echo site_url($barcode); ?>">
							</td>
						</tr>
					</table>
					<p>रोल नम्बर    <span style="padding-left:1em;">: <?php echo @$symbol_number ? $symbol_number : '';?> </span>
					</p>
					<p>पर्रीक्षार्थीको नाम <span style="padding-left:1em;">: <?php echo $student_record['middle_name'] ? $student_record['first_name'] . ' ' . $student_record['middle_name'] . ' ' . $student_record['last_name']: $student_record['first_name'] . ' ' . $student_record['last_name'];?></span>
					</p>
						लिङ्ग <?php echo $student_record['sex']; ?>
					<p>
					</p>
					<p>जन्ममिती<span style="padding-left:1em;"> : साल <?php echo $student_record['year_dob_nepali_date'] ? $student_record['year_dob_nepali_date']: '';?>&nbsp; &nbsp;महिना <?php echo $student_record['month_dob_nepali_date'] ? $student_record['month_dob_nepali_date']: '';?> &nbsp; &nbsp;  गते <?php echo $student_record['day_dob_nepali_date'] ? $student_record['day_dob_nepali_date']: '';?> &nbsp; &nbsp; &nbsp;( AD : <?php echo $student_record['DOB'] ? $student_record['DOB']: '' ;?> ) </span></p>
					<p>ठेगाना, फोन नं.<span style="padding-left:1em;">: <?php echo $student_record['vdc_municipality_english'] ? $student_record['vdc_municipality_english']: '' ;?>, <?php echo $student_record['phone_id']?>  </span></p>
					
					<p>विषयको नाम <span style="padding-left:1em;">:  <?php echo $student_record['program'] ? $student_record['program']: '' ;?> || तह :  <?php echo $student_record['level'] ? $student_record['level']: '' ;?></span>
					</p>
					<p>परीक्षा केन्द्र <span style="padding-left:1em;">: Pulchowk Engineering Collage</span>
					</p>

					<div style="float:left;">परीक्षार्थीको हस्ताक्षर : <br>
						<div style="border-width: 1px; height: 50px; width:200px; border-style: dashed;"></div>
					</div>

					<!-- <div style="width: 100%;">परीक्षार्थीको हस्ताक्षर : <img width="120px;" height="80px;" src="<?php echo  'https://nhpc.gov.np/backend/web'.$student_record['student_signature']; ?>"> -->

					<div style="height:50px; padding-top:50px; float:left; padding-left: 8%; padding-right: 8%;">
						<div style="position:absolute; left:783px; top:410px">
						..................................................<br/>
						सदस्य सचिवको हस्ताक्षर 
					</div>
						<!-- <img src="<?php echo  'https://nhpc.gov.np/backend/web'.$student_record['student_signature']; ?>" width="150px" height="70px";></div> -->
					</div>
					<div style="padding-left: 70%;">
						<table style="border: 1px solid black; width: 305px; border-collapse: collapse; text-align:center; overflow: auto;">
							<tr>
								<td colspan="2" style="text-align: center;">औँठा छाप</td>
							</tr>
							<tr>
								<td style="border: 1px solid black; border-collapse: collapse; text-align:center">दाँया</td>
								<td style="border: 1px solid black; border-collapse: collapse; text-align:center">बायाँ</td>
							</tr>
							<tr>
								<td style="height: 100px; width:100px;border: 1px solid black; border-collapse: collapse; text-align:center"></td>
								<td style="height: 100px; width:100px;border: 1px solid black; border-collapse: collapse; text-align:center"></td>
							</tr>
						</table>
					</div>
					<div style="clear: both;">
					</div>

				</div>
			</span>
		</p>
	</div>
	<br />

			<!-- <center> -->
			<div class="row" style="font-size: 12px; margin-left: 20px;">
				<h5><strong style="font-size: 15px;">परिक्षार्थीले पालना  गर्नुपर्ने नियमहरु :</strong></h5>
			</div>
			<!-- </center> -->
			<div class="row" style="font-size: 14px; margin-left: 20px; line-height: 1.3;">
				<!-- <div class="row" style=" font-size: 20px; margin-left: 20px;"> -->
				<p>(क)   अनलाइन फारम भर्दा राखेको फोटोको सक्कलै फोटो टासी तोकेको स्थानमा दस्तखत (दुवै फोटोमा पर्ने गरी समेत) र प्रस्ट रेखा देखिने औँठा छाँप लगाई प्रवेश पत्र तयार गर्नु पर्दछ । फोटो नटासेको औँठा छाप नलगाएको र तोकेको स्थानमा दस्तखत नगरेको प्रवेशपत्र मान्य हुनेछैन । परीक्षा दिन नपाएका वा परीक्षा छुटेका परीक्षार्थीको परीक्षा शुल्क फिर्ता हुने छैन । </p>
				<p>(ख)   प्रवेश पत्र रुजु र सुरक्षा जाँच भएपछि परीक्षार्थीले आफुलाई परीक्षा दिन तोकेको स्थानमा गई बस्नु पर्नेछ ।   </p>
				<p>(ग)   परीक्षा शुरु हुनुभन्दा २ घण्टा अगाडी परीक्षा केन्द्रमा उपस्थित हुनु पर्नेछ ।</p>
				<p>(घ)   परीक्षा सुरु भएको पन्ध्र (१५) मिनेट भन्दा पछि आउने परीक्षार्थीलाई परीक्षा केन्द्रमा प्रवेश गर्न दिईने छैन । </p>
				<p>(ङ)   परीक्षा सुरु भएको एक घण्टा अगाडि परीक्षा हल र दुईघण्टा अगाडि परीक्षा केन्द्र परिसर छाड्न पाईने छैन ।</p>
				<p>(च)   परीक्षार्थीले अनिवार्य रुपमा सक्कल नागरीकता वा सवारी चालक प्रमाण पत्र परीक्षा केन्द्रमा ल्याउनु पर्नेछ ।   </p>
				<p>(छ)	परीक्षा केन्द्रभित्र हुल हुज्जत वा होहल्ला गर्न पाइने छैन । </p>
				<p>(ज)	परीक्षा सञ्चालन गर्ने जिम्मेवारी लिएका केन्द्राध्यक्ष, पर्यवेक्षक, निरिक्षक र कर्मचारी समेतलाई धाक धम्की वा कुटपिट वा अभद्र व्यवहार गर्न पाइने छैन । </p>
				<p>(झ)	परीक्षा केन्द्रमा हातहतियार वा विस्फोटक पदार्थ ल्याउन पाइने छैन । </p>
				<p>(ञ)	परीक्षा कोठामा किताब, कपी, नोटस, चिट तथा मोवाईल जस्ता विद्युतिय उपकरणहरु, ब्लुटुथ, चस्मा, क्यालकुलेटर, पेन ड्राइभ ल्याउन पाइने छैन । यदि ल्याएको खण्डमा हराएमा वा टुटफुट भएमा परिषद् जिम्मेवारी हुने छैन् । </p>
				<p>(ट)	परीक्षामा यताउति हेर्न, ईसारा गर्न, सार्न, नक्कल गर्न र अन्य परीक्षार्थीसँग सरसल्लाह समेतका अनुचित काम गर्न पाइने छैन । </p>
				<p>(ठ)	परीक्षा केन्द्रको सम्पत्तिलाई हानी नोक्सानी पुर्याउन पाइने छैन ।  </p>
				<p>(ड)   परीक्षाको समय २ घण्टा, पुर्णङ्क १०० र उत्तीर्ण ५० हुनेछ । </p>
				<p>(ढ)   माथि उल्लेखित निर्देशन विपरित कार्यगर्ने परीक्षार्थीलाई तोकिए बमोजिमको कानुनी कारबाहि गरिनेछ ।   </p>

			</div>
			<br />
			<center>परीक्षा केन्द्र पुल्चोक इन्जीनियरीङ क्याम्पस, पुल्चोक, ललितपुर </center>
			<center>परीक्षाको मिति र समयको लागि परिषद्को वेवसाईटमा हेर्नुहुन जानकारी गराईन्छ । </center>
			<p style="padding-left:1000px">Website: www.nhpc.gov.np</p>
			<hr>
			<br />
			<br />
			<br />
			<br />

			<center style="line-height: .5;  font-size:16px">
				<img width="75" height="75" style="left: 6%; position: absolute; padding-top:-10px" src="<?php echo site_url(); ?>/assets/img/logo.jpg">
				<h3>नेपाल स्वास्थ्य व्यवसायी परिषद</h3>
				<h5>स्वास्थ्य व्यवसायी नाम दर्ता प्रमाण–पत्र परीक्षा</h5>
				<h5>२०७८</h5>
				<h3>प्रवेश पत्र </h3>
			</center>
			<p style="padding-left:1000px">Website: www.nhpc.gov.np</p>
			<p style="padding-left:30px">कार्यालय प्रयोजनको लागि</p>
			<div style="border-style:solid; border-width:1px; padding:5px">
				<div style="width: 145px; height: 20px; padding-left: 90%;  text-align: center;">
					<div style="border-style:dashed; border-width: 1px;height: 130px;width: 130px; object-position: 50% 100%; padding:10px; line-height:1.5">
						हालसालै खिचेको पासपोर्ट साइजको फोटो
					</div>
				</div>
				<div class="admit_card" style="font-size: 14px; margin-left: 20px;">
					<!-- <div class="admit_card" style="font-size: 20px; margin-left: 20px;"> -->

					<!-- <p>रोल नम्बर    <span style="padding-left:1em;">: <?php echo $student_record['symbol_number'] ? $student_record['symbol_number'] : '';?> <span> -->
					<p>रोल नम्बर    <span style="padding-left:1em;">: <?php echo @$symbol_number ? $symbol_number : '';?> </span>
					</p>
					<p>पर्रीक्षार्थीको नाम <span style="padding-left:1em;">: <?php echo $student_record['middle_name'] ? $student_record['first_name'] . ' ' . $student_record['middle_name'] . ' ' . $student_record['last_name']: $student_record['first_name'] . ' ' . $student_record['last_name'];?></span>
					</p>
					<p>जन्ममिती<span style="padding-left:1em;"> : साल <?php echo $student_record['year_dob_nepali_date'] ? $student_record['year_dob_nepali_date']: '';?>&nbsp; &nbsp;महिना <?php echo $student_record['month_dob_nepali_date'] ? $student_record['month_dob_nepali_date']: '';?> &nbsp; &nbsp;  गते <?php echo $student_record['day_dob_nepali_date'] ? $student_record['day_dob_nepali_date']: '';?> &nbsp; &nbsp; &nbsp;( AD : <?php echo $student_record['DOB'] ? $student_record['DOB']: '' ;?> ) </span></p>
					<p>ठेगाना, फोन नं.<span style="padding-left:1em;">: <?php echo $student_record['vdc_municipality_english'] ? $student_record['vdc_municipality_english']: '' ;?>, <?php echo $student_record['phone_id']?>  </span></p>
					<p>शिक्षण संस्थाको नाम<span style="padding-left:1em;">: <?php echo $student_record['college_name'] ?>  </span></p>
					<p>विषयको नाम <span style="padding-left:1em;">:  <?php echo $student_record['program'] ? $student_record['program']: '' ;?> || तह :  <?php echo $student_record['level'] ? $student_record['level']: '' ;?></span>
					</p>
					<p>परीक्षा केन्द्र <span style="padding-left:1em;">: Pulchowk Engineering Collage</span>
					</p>

					<div style="">परीक्षार्थीको हस्ताक्षर : <br>
						<div style="border-width: 1px; height: 50px; width:200px; border-style: dashed;"></div>
					</div>
				</div>
			</div>
			
		</div>


		<div class="col-md-2"></div>       
		<button class="btn btn-primary hide_section" onclick="print();"> print </button>                                      
	</div>

<?php }else{?>
	<h3 style="color:red">Admit Card is not Available.</h3>
<?php }?>