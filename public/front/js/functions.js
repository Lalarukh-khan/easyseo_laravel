 $(document).ready(function(){


 	var val1 = 0;

 	$('.navbar-trigger').children("img").click(function(){

 		if(val1==0){
			// const info = "http://localhost:8000/front/images/cross.png";
			// var image = document.getElementById("nwwblogo")
			// image.src=info;
 			$('.navbar-custom').attr("style","background: black; z-index: 1; padding: 20px 15px 30px 15px;");
 		$('.navbar-custom').slideToggle();

 		val1 = 1;
 	
 	}
 	else {
 		$('.navbar-custom').slideToggle();
 		// $(this).attr("src","{{asset('front')}}/images/hamburger.png");
 		val1 = 0;

 	}
 	})
 })



 $('.scroll-link').on('click', function(event) {
  var target = $(this.getAttribute('href'));
  if (target.length) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: target.offset().top
    }, 1000);
  }
});



 $(window).scroll(function() {
var $height1 = $(window).scrollTop();
if($height1 > 10) {
 $('body').addClass("header-fixed");

} else {
 $('body').removeClass("header-fixed");
}
});



 $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
  $(e.target)
    .prev()
    .find("i:last-child")
    .toggleClass("fa-minus fa-plus");
});
