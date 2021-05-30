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

$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
	autoclose: true
    /*startDate: '-3d'*/
});
$(".month_year").datepicker( {
    format: "MM-yyyy",
    startView: "months", 
    minViewMode: "months",
	autoclose: true,
});

$(".month").datepicker( {
    format: "MM",
    startView: "months", 
    minViewMode: "months",
	autoclose: true
});

$('.pos_from').datepicker({
    autoclose: true,
    format: 'MM-yyyy',
	startView: "months", 
	minViewMode: "months",
}).on('changeDate', function(selected){
       var startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getMonth(new Date(selected.date.valueOf())));
        $('.pos_to').datepicker({
			format: 'MM-yyyy',
			startView: "months", 
			minViewMode: "months",
			autoclose: true,
			startDate: startDate
		}).trigger('changeDate');
    }); 

$('.pos_to').datepicker({
    autoclose: true,
    format: 'MM-yyyy',
	startView: "months", 
	minViewMode: "months",
}).on('changeDate', function(selected){
        var FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getMonth(new Date(selected.date.valueOf())));
        $('.pos_from').datepicker({
			format: 'MM-yyyy',
			startView: "months", 
			minViewMode: "months",
			autoclose: true,
			endDate: FromEndDate
		});
    });


	/*--Unblock client--*/
	function unblck(clientyt){ 
        var clientid=$(clientyt).data('blcid');
        $.ajax({
            url: 'clientdetailsunblock.php',
            type: 'post',
            data: {clientid:clientid},
             beforeSend: function(){
                        /*$('.tbl_data .fblo' +clientid).html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');*/
                    },
                    success: function(resp){
                        $('.tbl_data .fblo' +clientid).html(resp);
                        $('.tbl_data #blkr' +clientid).css('display','none');
                    }
        })
    }
	/*--Unblock client ends--*/