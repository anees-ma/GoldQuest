var htmlEduContent = $(".edu-sec-outer").html();
$('.add-edu-sec').click(function(){
	let btnDelete = '<div class="col-lg-12"><span class="delete-edu-sec" style="float:right">Remove</span> </div>';
	if($('.edu-section').length<4){
		$('.edu-sec-outer').append(btnDelete);
		$('.edu-sec-outer').append(htmlEduContent);
	}

	if($('.edu-section').length==4){
		$('.add-edu-sec').fadeOut();
	}
	
});

$(document).on('click','.delete-edu-sec',function(){
	let element2Delete = $(this).parent().next();
	let btn2Delete = $(this).parent();
	$(element2Delete).remove();
	$(btn2Delete).remove();
	if($('.edu-section').length<4){
		$('.add-edu-sec').fadeIn();
	}
	
});

var htmlEmpContent = $(".emp-sec-outer").html();
$('.add-emp-sec').click(function(){
	let btnDelete = '<div class="col-lg-12"><span class="delete-emp-sec" style="float:right">Remove</span> </div>';
	if($('.emp-section').length<4){
		$('.emp-sec-outer').append(btnDelete);
		$('.emp-sec-outer').append(htmlEmpContent);
	}

	if($('.emp-section').length==4){
		$('.add-emp-sec').fadeOut();
	}
	
});

$(document).on('click','.delete-emp-sec',function(){
	let element2Delete = $(this).parent().next();
	let btn2Delete = $(this).parent();
	$(element2Delete).remove();
	$(btn2Delete).remove();
	if($('.emp-section').length<4){
		$('.add-emp-sec').fadeIn();
	}
	
});