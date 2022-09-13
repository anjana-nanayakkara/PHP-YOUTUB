const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e)=>{
    e.preventDefault();
    statusTxt.style.colour = "#d6efd";
    statusTxt.style.display = "block";
    statusTxt.innerText = "sending your message...";
    form.classList.add("disabled");

    let xhr = new XMLHttpRequest();
    xhr.open("POST","message.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.State == 200){
            let responce = xhr.response;
            if (responce.indexOf("Email and message field is required!") != -1 || responce.indexOf("enter a valid email address") != -1 || responce.indexOf("sorry faild to send your message") != -1){
                statusTxt.style.color ="red"
            }

            else{
                form.reset();
                setTimeout(()=>{
                    statusTxt.style.display = "none";
                }, 3000);
            }

            statusTxt.innerText = responce;
            form.classList.remove("disabled");

        }
    }

    let formData =new FormData(form);
    xhr.send(formdata);

}