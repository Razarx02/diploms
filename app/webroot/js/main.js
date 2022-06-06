

(function (){
	
	const burger = document.querySelector('.burger');
    const nav__items = document.querySelector('.nav__items');
    
    burger.addEventListener('click', () =>{
        if(document.body.clientWidth > 1350){
            document.querySelector('.nav__items').style.display = "block";
			burger.classList.toggle('burger_active');
        }else {
            burger.classList.toggle('burger_active');
            nav__items.classList.toggle('nav__items_active');
        } 
	});
    
}());

(function () {
  // const item = document.getElementsByClassName('item_link');
  const header = document.querySelector('.header__top');
  
  window.onscroll = () => {
      if (header&&window.pageYOffset > 50) {
          
          header.classList.add('header_active');
          // item.classList.add('nav__active');
          
      } else if(header) {
          header.classList.remove('header_active');
          // item.classList.remove('nav__active');
      }
  };
}());

// const anchors = document.querySelectorAll('a[href*="#]')

// for (let anchor of anchors){
//   anchor.addEventListener("click", function(event) {
//     event.preventDefault();
//     const blockID = anchor.getAttribute('href')
//     document.querySelector('' + blockID).scrollIntoView({
//       behavior: "smooth",
//       block: 'start'
//     })
//   })
// }

$('input[type="tel"]').click(function(){
  $(this).setCursorPosition(3);
}).mask("+7 (999) 999 99 99");

$.fn.setCursorPosition = function(pos) {
if ($(this).get(0).setSelectionRange) {
  $(this).get(0).setSelectionRange(pos, pos);
} else if ($(this).get(0).createTextRange) {
  var range = $(this).get(0).createTextRange();
  range.collapse(true);
  range.moveEnd('character', pos);
  range.moveStart('character', pos);
  range.select();
}
};


let alertt = document.querySelector(".alert--fixed");
    let alertClose = document.querySelectorAll(".alert--close")
    for (let item of alertClose ) {
        item.addEventListener('click', function(event) {
            alertt.classList.remove("alert--active")
            alertt.classList.remove("alert--warning")
            alertt.classList.remove("alert--error")
        })
    }


    $('.way').waypoint({
      handler: function() {
      $(this.element).addClass("way--active")
      },
      offset: '90%'
    });