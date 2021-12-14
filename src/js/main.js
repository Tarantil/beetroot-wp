let fields = document.querySelectorAll('.contact__field-wrap');


let showLabel = function(arrc) {
    arrc.forEach((val)=>{
    	let childInput = val.querySelector('.contact__field'); 
	    childInput.addEventListener("focus", () => {
	       val.querySelector('.contact__label').classList.add('contact__label_active');
	    });
	    childInput.addEventListener("blur", () => {
	        if(childInput.value.length==0){
	          val.querySelector('.contact__label').classList.remove('contact__label_active');
	        }
	    });
    });
}

showLabel(fields);

document.addEventListener( 'wpcf7mailsent', function( event ) {
  fields.forEach((field)=>{
  	 field.querySelector('.contact__label').classList.remove('contact__label_active');
  });
}, false );

var smoothLinks = document.querySelectorAll('a[href^="#"]');
  smoothLinks.forEach(element =>{

      element.addEventListener('click', function (e) {
          e.preventDefault();
          var id = element.getAttribute('href');
          document.querySelector(id).scrollIntoView({
              behavior: 'smooth',
              block: 'start'
          });
      });
});