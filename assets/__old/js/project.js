
var months = ['','बैशाख','जेठ','असार','श्रावण','भदौ','आश्विन','कार्तिक','मंसिर','पुष','माघ','फाल्गुन','चैत्र'];
// var days = ['SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA'];
var days = ['आइत', 'सोम', 'मगल', 'बुध', 'बिहि', 'शुक्र', 'शनि'];
var nepali_number = ['०','१','२','३','४','५','६','७','८','९','१०','११','१२','१३','१४','१५','१६','१७','१८','१९','२०','२१','२२','२३','२४','२५','२६','२७','२८','२९','३०','३१','३२','३३','३४','३५','३६','३७','३८','३९','४०','४१','४२','४३','४४','४५','४६','४७','४८','४९','५०','५१','५२','५३','५४','५५','५६','५७','५८','५९','६०','६१','६२','६३','६४','६५','६६','६७','६८','६९','७०','७१','७२','७३','७४','७५','७६','७७','७८','७९','८०','८१','८२','८३','८४','८५','८६','८७','८८','८९','९०','९१','९२','९३','९४','९५','९६','९७','९८','९९','१००',]

function uploadReady(selector,image,image_name,image_delete,action,source_folder)
{

    uploader=$('#'+selector);
    
	
	new AjaxUpload(uploader, {
		action: action,
		name: 'userfile',
		responseType: "json",
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif|pdf)$/.test(ext))){ 
                // extension is not allowed 
                $.messager.show({title: 'error',msg: 'Only pdf, JPG, PNG or GIF files are allowed'});
                return false;
            }
            //status.text('Uploading...');
        },
        onComplete: function(file, response){
        	if(response.error==null){
        		var filename = response.file_name;
        		$('#'+selector).hide();
        		$('#'+image).val(filename);
        		$('#'+image_name).html('<img src="'+source_folder+'/'+filename+'" height="100px" width="100px"> <buttton type="button" onclick="remove_doc()" class="btn btn-danger"><i class="fa fa-trash"></i></button>');
        		$('#'+image_name).show();
        		$('#'+image_delete).show();
        	}else{
        		alert(response.error);
        	}
        	
        }       
    });
}

function get_nepali_year(year){
    // var output = [];
    year_np = '';
    for (var i = 0; i <= year.toString().length - 1; i++) {
      // output.push(+year.toString().charAt(i));
      year_np += nepali_number[year.toString().charAt(i)];
    }
    return year_np;
    // console.log(year_np);
}