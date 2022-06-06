
let  ProductObject = {
    id: 0,
    title: "title",
    price: 100,
    code: 'default',
    category: "category",
    podcategory: "podcategory",
    counter: 0, 
    allprice: 0,
    img: "img",
    brend: "brend",
    check: 'active'
}
let counterObject = {
    counter: 0,
    allcounter: 0
}
// console.log(ProductObject)
// We save info about product in localstorage
var arrayProducts = []
const button = document.querySelector("#addproduct") // Кнопка добавить 
const showhas = document.querySelector("#show-block")  //  Есть уже в корзине
const blockbasket = document.querySelector(".basket-items") // Родитель заказов в корзине
const classNameDeleteButon = ".basket__item-delete" //Название класса кнопка удалить
const classNamePlus = ".plus" //Название класса кнопка +
const classNameMinus = ".minus" //Название класса кнопка +
const basketAllCounter = document.querySelector(".counter-basket") // Количество товары будет внутри этого блока
const basketAllCounter_1 = document.querySelector(".basket-all-counter--1")
// basket-all-counter
const allPrice = document.querySelector(".allprice--i") // Всего цена
const sectionEmpty = document.querySelector(".empty-section")  // Section of empty space
const sectionBasket = document.querySelector(".basket-section") // Section of basket
const checkBoxsClassName = ".basket__check" //  Название класса чек бокса для выбора
const iden_count = document.querySelector(".iden-count")
// const counterWrapperProducts = document.querySelector(".allcounter-wrapper");  // Обшее количество товаров 



function  checkHasProduct() {
    arrayProducts = []
    crowedArray()
    if (arrayProducts[0] == null ) {
        sectionEmpty.classList.add("active")
        sectionBasket.classList.remove("active")
    } else {
        sectionEmpty.classList.remove("active")
        sectionBasket.classList.add("active")
    }
}

let allcounter = sizeProducts()

writeCounter(allcounter)
writeAllPrice()
function  writeAllPrice() {
    if(allPrice != null) {
        let allpriced = 0
        arrayProducts = []
        crowedArray()
        for(let item of arrayProducts) {
            allpriced = allpriced + item.allprice 
        }
        allPrice.innerHTML = allpriced
    }
  
}

if(button != null ) {
    button.onclick = buttonClick;

    mainChecks()
}

if(blockbasket != null) {
    // Мы находимся в корзине
    
    writeProducts()
    blockDelete()
    blockMinusPlus()
    checkHasProduct()
    CheckBoxBlock()

    function CheckBoxBlock() {
        const checkBoxinputs = document.querySelectorAll(checkBoxsClassName)
        for(let item of checkBoxinputs) {
            item.onclick = clickCheckBox;
        }
    }

    function blockDelete() {
        const deleteButton = document.querySelectorAll(classNameDeleteButon) //Кнопка удалить    
        for(let item of deleteButton) {
            item.onclick = deleteFunction;
        }
    }

    function blockMinusPlus() {
        // alert("ok")
        const plusbuttons = document.querySelectorAll(classNamePlus)
        // console.log(plusbuttons)
        const minusbuttons = document.querySelectorAll(classNameMinus)
        for(let item of  plusbuttons) {
            item.onclick = plusFunction;
        }

        for(let item of minusbuttons) {
            item.onclick = minusFunction;
        }

    }
    orderBlock()
    function orderBlock() {
        // const oneOrderButton = document.querySelectorAll(".order-btn") // Если есть у каждого товара кнопка заказать отдельно
        const keepOrder = document.querySelector(".basket-btn-order") // оформить заказ
        const keepOrder1 = document.querySelector(".info-bottom")
        keepOrder.onclick = getValuestoText2
        // keepOrder1.onclick = getValuestoText2
        // for(let item of oneOrderButton) {
        //     item.onclick = getValuestoText1
        // }
    }
   
    function getValuestoText1() {
        // alert("ok")
        // console.log( $(".textarea--class"))
        arrayProducts = []
        crowedArray()
        let tableItems = '<table width="100%" border="1" cellspacing="1" cellpadding="1"> <tr><th>Наименование</th><th>Цена продукта </th><th>Количество</th><th> Итоговая цена</th> </tr>';
        for(let item of arrayProducts) {
           
                if(item.id == this.getAttribute("data-id")) {
                    tableItems = tableItems + `<tr> <td> ${item.title} </td>  <td> ${item.price} </td> <td> ${item.counter} </td> <td> ${item.allprice} </td> </tr>`
                    tableItems = tableItems + `<tr> <td> Общая стоимость</td> <td colspan="3">${item.allprice}</td> </tr>`
                }
            
            
        }
        
        $(".textarea--class").text(tableItems)
        // alert(tableItems)
    }
    function getValuestoText2() {
        // alert("ok")
        // console.log( $(".textarea--class"))
        arrayProducts = []
        crowedArray()
        allpricea = 0;
        
        let tableItems = '<table width="100%" border="1" cellspacing="1" cellpadding="1"> <tr><th>Наименование</th><th>Цена продукта </th><th>Количество</th><th> Итоговая цена</th> </tr>';
        for(let item of arrayProducts) {
            // if(item.id == this.getAttribute("data-id")) {
            // Можно убрать первую условию check если хотим чтобы все заказы заказались
            if(item.check === 'active') {
                allpricea = allpricea + item.allprice;
                tableItems = tableItems + `<tr> <td> ${item.title} </td>  <td> ${item.price} </td> <td> ${item.counter} </td> <td> ${item.allprice} </td> </tr>`
            // }
            }
        }
        tableItems = tableItems + `<tr> <td> Общая стоимость</td> <td colspan="3"> ${allpricea}</td> </tr>`
        $(".textarea--class").text(tableItems)
        // alert(tableItems)
    }
    function deleteFunction() {
        if(deleteInStorage(this.getAttribute("data-id"))) {
            writeProducts()
            blockDelete()
            blockMinusPlus()
            CheckBoxBlock() 
            // checkHasProduct()
        }
    }
    function  plusFunction() {
        const valuesCounter = document.querySelectorAll(".basket__item-counter-value")
        for(let item of valuesCounter) {
            if(item.getAttribute("data-id") == this.getAttribute("data-id")) {
                let newItem = valuechange(item.getAttribute("data-id"), "+")
                item.innerHTML = newItem.counter
                writeAllPrice()
            }
        }
          let allcounter = sizeProducts()
          writeCounter(allcounter)
        
    }

    function minusFunction() {
        const valuesCounter = document.querySelectorAll(".basket__item-counter-value")
        for(let item of valuesCounter) {
            if(item.getAttribute("data-id") == this.getAttribute("data-id")) {
                let newItem = valuechange(item.getAttribute("data-id"), "-")
                item.innerHTML = newItem.counter
                writeAllPrice()
            }
        }

        let allcounter = sizeProducts()
        writeCounter(allcounter)


        
        
    }
    function  valuechange(id, type) {
        arrayProducts = []
        crowedArray()
        for(let item  of arrayProducts) {
            if( parseInt(item.id) == parseInt(id) ) {
                if(type == "+") {
                   item.counter = item.counter + 1 
                }
                if (type == "-") {
                    if(item.counter>1) {
                        item.counter = item.counter  - 1
                    }
                }
                item.allprice = item.counter * item.price;
                localStorage.setItem("product", JSON.stringify(arrayProducts))
                return item
            }
        }
    }

    function clickCheckBox() {{
        arrayProducts = []
        crowedArray()
        for(let item  of arrayProducts) { 
            if(item.id == this.getAttribute("data-id")) {
                if(item.check == 'active') {
                    item.check = ""
                    this.classList.remove("active")
                } else {
                    item.check = "active"
                    this.classList.add("active")   
                } 
                localStorage.setItem("product", JSON.stringify(arrayProducts))
                return
            }
        }

    }}
    
}

function deleteInStorage(id) {
    arrayProducts = []
    crowedArray()
    for(let item in arrayProducts) {
        if(parseInt(arrayProducts[item].id) == parseInt(id)) {
            if (item > -1) {
                arrayProducts.splice(item, 1);
                localStorage.setItem("product", JSON.stringify(arrayProducts))
                let allcounter = sizeProducts()
                writeCounter(allcounter)
                writeAllPrice()
                checkHasProduct()
                return true
            }
            
        }
    }
    return false
}


function writeProducts() {
    arrayProducts = []
    crowedArray()
    blockbasket.innerHTML= ""
    for(let item of arrayProducts) {
        let div = document.createElement('div');
        div.className = "basket__item-block"
        div.innerHTML = `
        <div class="basket__check ${item.check}" data-id="${item.id}"></div>
        <div class="basket__item">
            <div class="basket-left">
                <div class="basket__item-info">
                    <div class="basket__item-img">
                        <img src="${item.img}" alt="">
                    </div>
                    <div class="basket__item-texts">
                        <div class="basket__item-title">
                                ${item.title}
                        </div>
                        <div class="basket__item-brend">
                            Бренд: <span>  ${item.brend} </span>
                        </div>
                        <div class="basket__item-code">
                            Код товара:  <span>${item.code}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basket-center">
                <div class="basket__item-counter">
                    <span class="plus basket__item-counter-btn" data-id="${item.id}"></span>
                    <span class="basket__item-counter-value" data-id="${item.id}"> ${item.counter} </span>
                    <span class="minus basket__item-counter-btn" data-id="${item.id}"></span>
                </div>
            </div>
            <div class="basket-right">
                <div class="basket__item--prices">
                    <div class="basket__item-delete" data-id="${item.id}">
                        <svg width="30" height="32" viewBox="0 0 30 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.6665 13.3333V24C10.6665 24.3536 10.807 24.6928 11.057 24.9428C11.3071 25.1929 11.6462 25.3333 11.9998 25.3333C12.3535 25.3333 12.6926 25.1929 12.9426 24.9428C13.1927 24.6928 13.3332 24.3536 13.3332 24V13.3333C13.3332 12.9797 13.1927 12.6406 12.9426 12.3905C12.6926 12.1405 12.3535 12 11.9998 12C11.6462 12 11.3071 12.1405 11.057 12.3905C10.807 12.6406 10.6665 12.9797 10.6665 13.3333Z" fill="#7E7E7E"/>
                            <path d="M17.3333 12C17.687 12 18.0261 12.1405 18.2761 12.3905C18.5262 12.6406 18.6667 12.9797 18.6667 13.3333V24C18.6667 24.3536 18.5262 24.6928 18.2761 24.9428C18.0261 25.1929 17.687 25.3333 17.3333 25.3333C16.9797 25.3333 16.6406 25.1929 16.3905 24.9428C16.1405 24.6928 16 24.3536 16 24V13.3333C16 12.9797 16.1405 12.6406 16.3905 12.3905C16.6406 12.1405 16.9797 12 17.3333 12Z" fill="#7E7E7E"/>
                            <path d="M20 5.33333H28C28.3536 5.33333 28.6928 5.47381 28.9428 5.72386C29.1929 5.97391 29.3333 6.31305 29.3333 6.66667C29.3333 7.02029 29.1929 7.35943 28.9428 7.60948C28.6928 7.85952 28.3536 8 28 8H26.5253L24.52 26.0693C24.3389 27.7001 23.5627 29.2068 22.34 30.301C21.1174 31.3953 19.5341 32.0002 17.8933 32H11.44C9.7992 32.0002 8.21596 31.3953 6.99331 30.301C5.77066 29.2068 4.99448 27.7001 4.81333 26.0693L2.80533 8H1.33333C0.979711 8 0.640573 7.85952 0.390525 7.60948C0.140476 7.35943 0 7.02029 0 6.66667C0 6.31305 0.140476 5.97391 0.390525 5.72386C0.640573 5.47381 0.979711 5.33333 1.33333 5.33333H9.33333C9.33333 3.91885 9.89524 2.56229 10.8954 1.5621C11.8956 0.561903 13.2522 0 14.6667 0C16.0812 0 17.4377 0.561903 18.4379 1.5621C19.4381 2.56229 20 3.91885 20 5.33333ZM14.6667 2.66667C13.9594 2.66667 13.2811 2.94762 12.781 3.44772C12.281 3.94781 12 4.62609 12 5.33333H17.3333C17.3333 4.62609 17.0524 3.94781 16.5523 3.44772C16.0522 2.94762 15.3739 2.66667 14.6667 2.66667ZM5.49067 8L7.464 25.776C7.57293 26.7543 8.03874 27.658 8.77231 28.3144C9.50588 28.9707 10.4557 29.3335 11.44 29.3333H17.8933C18.8772 29.3328 19.8263 28.9697 20.5594 28.3135C21.2924 27.6572 21.7578 26.7538 21.8667 25.776L23.8453 8H5.49333H5.49067Z" fill="#7E7E7E"/>
                        </svg>
                    </div>
                    <div class="basket__price"> ${item.price} ₸ </div>
                </div>
            </div>
        </div>`
        blockbasket.append(div)
    }
   
    
}




function mainChecks() {
     if(HasId(button.getAttribute("data-id")) == true) {
        button.classList.remove("active")
        showhas.classList.add("active")
     } else {
        button.classList.add("active")
        showhas.classList.remove("active")
     }
}

function HasId(id) {
    crowedArray()
    if(CheckLocal() == true ) {
        for(let item of arrayProducts) {
            
            if (item.id == parseInt(id)) {
                arrayProducts = []
                return true
            }
        }
    }

    return false
}

function buttonClick() {  

    arrayProducts = []
    crowedArray()
    let newItem = ProductObject;
    newItem.id = parseInt(this.getAttribute('data-id'))
    newItem.title = this.getAttribute('data-title')
    newItem.price = parseInt(this.getAttribute('data-price'))
    newItem.img = this.getAttribute('data-img')
    newItem.category = this.getAttribute('data-category')
    newItem.code = this.getAttribute('data-code')
    newItem.brend = this.getAttribute('data-brend')
    newItem.check = 'active' 
    newItem.counter = 1
    newItem.allprice = newItem.counter * newItem.price
    productadd(newItem) 
    mainChecks()
    let allcounter = sizeProducts()
    writeCounter(allcounter)
    writeAllPrice()

}
function  sizeProducts() {
    arrayProducts = []
    
    crowedArray()
    
    let cointOb = counterObject
    
    cointOb.counter = arrayProducts.length
    cointOb.allcounter = 0
    for(let item of arrayProducts) {
        cointOb.allcounter = cointOb.allcounter + item.counter
    }

    return  cointOb;


}
function crowedArray() {
    let jsons  = JSON.parse(localStorage.getItem("product"))
    for(let item in jsons) {
        arrayProducts.push(jsons[item])    
    }
}

function productadd(knownItem) {
//  Добавляет продукт
    // localStorage.clear("product")
    arrayProducts.push(knownItem)
    localStorage.setItem("product", JSON.stringify(arrayProducts))
    // checkHasProduct()
}


function CheckLocal() {
    if (localStorage.getItem("product") == null) {
        return false
    } else {
        return true
    }
}

function  writeCounter(counterOb) {

    if(parseInt(counterOb.counter) != 0 ) {
        basketAllCounter.innerHTML = `${counterOb.counter}`
        // counterWrapperProducts.innerHTML = `<span class="class-allcounter-products"> ${counterOb.allcounter} </span>`
        if(iden_count) {
            iden_count.innerHTML = `(${counterOb.allcounter})`
        }
        if(basketAllCounter_1 != null) {
            basketAllCounter_1.innerHTML = counterOb.counter
        }
    } else {
        basketAllCounter.innerHTML = "0"
        // counterWrapperProducts.innerHTML = "";
        if(iden_count) {
            iden_count.innerHTML = ""
        }
        
        if(basketAllCounter_1 != null) {
            basketAllCounter_1.innerHTML = "0"
        }
    }   
    
}







