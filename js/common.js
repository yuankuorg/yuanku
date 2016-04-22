function redriect( url, data ){
	if( !url||url=="" ){
		return;
	}
	
	if( !data ) {
		data = {};
	}
	
	$.ajax({
		url  : url,
		type : "post",
		data : data,
		success:function(text){
			$(".main").fadeOut(function(){
				$(this).empty().html(text);
				$(this).fadeIn();
			})
		},
		async:true
	});
}

//多选框批量选择
function all(){
	$("#all").unbind().click(function(){
		var flag = $(this).is(":checked");
		$(".table input[type = checkbox]").not($(this)).each(function(){				
			$(this).get(0).checked = flag;				
		});
	});
}


//触摸左右滑动

function touchLr(){
	$("#index").on("swipeleft",function(){
	    $.mobile.changePage("#shang",{transition:"slide"});
	});
	
	$("#shang").on("swipeleft",function(){
	    $.mobile.changePage("#chuang",{transition:"slide"});
	}).on("swiperight",function(){
		 $.mobile.changePage("#index",{transition:"slide",reverse:"reverse"});
	});
	
	$("#chuang").on("swipeleft",function(){
	    $.mobile.changePage("#fen",{transition:"slide"});
	}).on("swiperight",function(){
		 $.mobile.changePage("#shang",{transition:"slide",reverse:"reverse"});
	});
	
	$("#fen").on("swipeleft",function(){
	    $.mobile.changePage("#mine",{transition:"slide"});
	}).on("swiperight",function(){
		 $.mobile.changePage("#chuang",{transition:"slide",reverse:"reverse"});
	});
	
	$("#mine").on("swiperight",function(){
	    $.mobile.changePage("#fen",{transition:"slide"});
	});
	
	
    $("#slider").responsiveSlides({
    auto: true,
    pager: false,
    nav: true,
    speed: 500,
    // 对应外层div的class : slide_container
    namespace: "slide"
    });
}
