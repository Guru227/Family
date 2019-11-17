//gen-styles.js

/*
scroll_function function(timer){
  window.addEventListener('load', scroll_listen, false);
}	


scroll_listen function(){
  	var el = document.querySelector('body');
    el.addEventListener('scroll', change_attributes, false);
}	
//an event listener has been added to body. 
//change_attributes is executed everytime an onscroll message is sent

change_attributes function(e){
	e.classList.add('scroll_start');
	clearTimeout(timer);
	timer = setTimeout(	
		function(){
		el.classList.remove('scroll_start');
		}, 100);    
}


scroll_function();	//scroll_function is running; onload of webpage scroll_listen is run
*/

(function(timer) {
  window.addEventListener('load', function() {
    var el = document.querySelector('body');
    el.addEventListener('scroll', function(e) {
    (function(el){
      el.classList.add('scroll_start');
      clearTimeout(timer);
      timer = setTimeout(function() {
        el.classList.remove('scroll_start');
      }, 100);    
    })(el);
    })
  })
})();