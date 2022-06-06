
const mySlider = document.querySelector(".cards-wrapper")
let viewsSlider = 5 // Всегда

const lengthItems = mySlider.children.length


if(lengthItems >= viewsSlider) {
    mySlider.classList.add("myslider-wrapper")
} else {
    mySlider.classList.add("myslider-wrapper-not")
}
// parseInt()
const centerItemIndex =  parseInt(viewsSlider / 2) 

let counterIndex = 0
let wrapperItems = mySlider.children
for(let item of wrapperItems) {
    item.classList.add("myslider__item")
    item.classList.add("margin-ani")
    item.onmouseover = orderFunction;
    if (counterIndex <= viewsSlider + 1) {
        if(counterIndex == centerItemIndex ) {
             item.classList.add('myslider-active')
             item.classList.add('myslider-center')
        }  else if(counterIndex == 3) {
            item.classList.add('last--item')
            item.classList.add('myslider-active')
            // item.classList.add('myslider-center')
       } else {
             item.classList.add('myslider-active')
        }
    }
    counterIndex++
}

function orderFunction(){
    if(!this.classList.contains("z-fav")) {
        for(let item of wrapperItems) { 
            item.classList.remove("z-fav")
            item.classList.remove("myslider-center")
            item.classList.remove("margin-ani")
            item.classList.remove("last--item")
        }
        this.classList.add("z-fav")
    
        setTimeout(() => {
            for(let item of wrapperItems) { 
                    item.classList.add("margin-ani")
            }
        }, 600);
    }
   
}


