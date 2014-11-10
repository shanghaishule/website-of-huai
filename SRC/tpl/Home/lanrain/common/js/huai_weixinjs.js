
$(document).ready(function(e) {			
	t = $('.fixed_huai').offset().top;
	mh = $('.main_huai').height();
	fh = $('.fixed_huai').height();
	$(window).scroll(function(e){
		s = $(document).scrollTop();	
		if(s > t - 10){
			$('.fixed_huai').css('position','fixed_huai');
			if(s + fh > mh){
				$('.fixed_huai').css('top',mh-s-fh+'px');	
			}				
		}else{
			$('.fixed_huai').css('position','');
		}
	})
});
