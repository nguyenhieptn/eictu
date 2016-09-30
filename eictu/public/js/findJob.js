

function scoll(page){
	$(window).scroll(function() { //detect page scroll
    if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
        page++; //page number increment
        load2(page); //load content   
    	}
	});  
}

function add(){

}

// READY
$(document).ready(function() {
	$('.errors').hide();
	$('.success').hide();
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	var load = function(){
		$.get('data',function(datas){
		 $('#content-js').html(datas);  
		});
	}
	$('.btn-post').click(function(e){
		e.preventDefault();
		var content = $('#content').val();
		$.post('post-add',{content:content},function(data){
			if(data.errors==true){
				$('.errors').show();
				if(data.messages.content != undefined){
					$('.text-danger').text(data.messages.content);
				}
			}else{
				$('.success').show();
				$('.text-success').text(data.messages);
			}
			return false;
		});
	}); 
	load();
});

