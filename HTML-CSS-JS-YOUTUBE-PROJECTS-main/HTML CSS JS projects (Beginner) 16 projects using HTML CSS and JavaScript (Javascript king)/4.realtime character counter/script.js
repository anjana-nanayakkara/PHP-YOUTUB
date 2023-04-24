const textareaEl = document.getElementById("textarea")

const totalCounterE1 = document.getElementById("total-counter")

const remainigCounterE1 = document.getElementById("remaining-counter");

textareaEl.addEventListener("keyup", ()=>{
    // console.log("key is pressed")
    updateCounter()
})

function updateCounter(){
    totalCounterE1.innerText = textareaEl.value.length
    remainigCounterE1.innerText =
      textareaEl.getAttribute("maxLength") - textareaEl.value.length;
}

