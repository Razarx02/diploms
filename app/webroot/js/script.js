'use strict' 

$(document).ready(function(){
  
// form price 

$(".select--form").change(function(){
  // alert("ok")
  $(".form--price").click()
  
})




  // slider 
let alertt = document.querySelector(".alert--fixed");
let alertClose = document.querySelectorAll(".alert--close")
for (let item of alertClose ) {
    item.addEventListener('click', function(event) {
        alertt.classList.remove("alert--active")
        alertt.classList.remove("alert--warning")
        alertt.classList.remove("alert--error")
    })
}

$('.products-images').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  dots:true,
  arrows:false
});

$('.main-wrapper').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots:true,
  arrows:false
});

$('.partner-wrapper').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  dots:true,
  arrows:true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },{
      breakpoint: 580,
      settings: {
        slidesToShow: 2,
        arrows:false,
        dots: true
      }
    }
  ]
});

window.onscroll = function(){
  var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
  var header = $('.header');

  if(top > 50){
    $(header).addClass('scroll');
  } else {
    $(header).removeClass('scroll');
  }
}

var windowsize = $(window).width()
$(window).resize( function(){
    windowsize = $(window).width()
})
mobileDonw()
function mobileDonw() {
  $(".sub--a").click(function(){
    if(!$(this).hasClass("active--a")) {
      $(this).find(".option-ul").slideDown()
      $(this).addClass("active--a")
    } else {
      $(this).find(".option-ul").slideUp()
      $(this).removeClass("active--a")
    }
   
  })
}

$(document).mouseup(function(e) {
  if(windowsize < 1100) {
      var container = $(".sidebar");
      // alert("lk")
      if($(".filtr--block").has(e.target).length == 1) {
         if(!$(".burger").hasClass("active")) {
            $(".filtr--burger").toggleClass("active")
            $(".sidebar").toggleClass("active")
        }
      } else if (container.has(e.target).length == 0 ){
          if($(".filtr--burger").hasClass("active")) {
            // alert("ok")
            $(".filtr--burger").removeClass("active")
            $(".sidebar").removeClass("active")
          }
      }


  }
});

// $(".filtr--block").click(function(){
//   if(!$(".burger").hasClass("active")) {
//       $(".filtr--burger").toggleClass("active")
//       $(".sidebar").toggleClass("active")
//   }
// })

let lpr = JSON.parse(localStorage.getItem("product"))
$(".cards-btn").each(function(){
  for(let item in lpr) {
    if($(this).attr("data-id") == lpr[item].id) {
      $(this).addClass("active")
    }

  }
})




// enda
})
$(".burger").click(function(){
  $(this).toggleClass("active")
  $(".header-menu").toggleClass("active")
})


// maska tell
$('input[type="tel"]').click(function(){
    $(this).setCursorPosition(3);
}).mask("+7 (999) 999 99 99");
  
  


// console.log(adventages[0])
adventFunc(1) 
var endA = 7
//  adventages[start]
 function adventFunc(start ) {
  //  let item = adventages[start - 1]
  var adventages = document.querySelectorAll(".adventages__item")
  let ind = adventages.item(start - 1)
  let ina = adventages.item(start)

  if (start == endA) {
      start = -1
  } 
 
  setTimeout( () => {
    if(start > 0) {
      // alert("ok")
      if(ind != null) {
        ind.classList.remove("box-shadow--item")
      }
   
    }
    if( ina != null) {
      ina.classList.add("box-shadow--item")
    }
    
    adventFunc(start + 1)
 }, 800 ) 
 
//  $(".divselect-options").slideUp()
 
}

const divselect = document.querySelector(".divselect")
const optionsSelect = document.querySelector(".divselect-options")
// const subsa = document.querySelectorAll(".sub--a")

function hasItSub(litem) {
  for(let item of subsa) {
    if(litem == item) {
      return true
    }
  }

  return false
}

function selectFunc(event) {
  if(optionsSelect.classList.contains("active")) {
   optionsSelect.classList.remove("active") 
  } else {
   if(event.target.classList.contains("sub--a") || event.target.parentElement.classList.contains("sub--a")) {
  
   } else {
     optionsSelect.classList.add("active")
   }
  }
}

divselect.onclick = selectFunc







function checkClick(tar) {
  let elementss =  document.querySelectorAll(".divselect-options__item")
  for(let item in elementss) {
    if (tar == item) {
      return true
    }
  }
  return false
}






// multi slider
const minvalue = document.querySelector("#minvalue")

const maxvalue = document.querySelector("#maxvalue")
$("#for-multislider").ionRangeSlider({
  type: "double",
  min: 1000,
  max: 30000,
  from: 2000,
  to: 10000,
  onChange: function(data) {
    minvalue.value = data.from
    maxvalue.value = data.to
    
  }
});

let  my_range = $("#for-multislider").data("ionRangeSlider"); 


let froma = 1000
let toa = 10000

minvalue.onchange = minvalueFunc
maxvalue.onchange = maxvalueFunc



function minvalueFunc() {
  // alert("ok")
  let val = this.value
  // console.log(val)
  maxvalue.setAttribute("min", val)
  maxvalue.setAttribute("value", val)
  froma = this.value
  toa = maxvalue.value
  
  my_range.update(
    {
      from: froma,
        to: toa
    } 
  )

}


function maxvalueFunc() {
  toa = maxvalue.value
  froma = minvalue.value
  my_range.update(
    {
      from: froma,
        to: toa
    } 
  )
}



