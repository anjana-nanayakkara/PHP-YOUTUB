const kits = ["crash", "kick", "snare", "tom"];

const containerEl = document.querySelector(".container");

kits.forEach((kit) => {
    const btnEl = document.createElement("button");
    btnEl.classList.add("btn");
    btnEl.innerText = kit;
    btnEl.style.backgroundImage = "url(images/"+kit+".png";
    const audioEl = document.createElement("audio");
    audioEl.src = "sounds/" + kit + ".mp3";
    btnEl.addEventListener("click", ()=>{
        audioEl.play( )
    });

    window.addEventListener("keydown", (event)=>{
        if(event.key === kit.slice(0,1)){
            audioEl.play()
            btnEl.style.transform = "scale(.9)";
            setTimeout(() =>{
                btnEl.style.transform = "scale(1)";
            },100)
        };
    })
    window.addEventListener
    containerEl.appendChild(audioEl);



    containerEl.appendChild(btnEl);
});