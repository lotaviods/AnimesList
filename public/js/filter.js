let campoFiltro = document.querySelector("#filter");

campoFiltro.addEventListener("input", function(){
    const animes = document.querySelectorAll(".animes");

    if (this.value.length > 0){

        for(let i = 0; i< animes.length ; i++ ){
            let anime = animes[i];
            let nome = []
            nome.push(anime.childNodes[1].textContent);

            let text = document.querySelector('#link_encontrados');
            let Busca = new RegExp(this.value, "i");

            if (Busca.test(nome)){ 
                text.classList.remove("invisible");
                text.innerHTML = nome;
                text.href = `#${nome}`;
                campoFiltro.addEventListener("keypress", function(){
                    console.log("botão clicado"); // https://stackoverflow.com/questions/14542062/eventlistener-enter-key/50993410
                });

                anime.classList.remove("blob")
            }else{
                anime.classList.add("blob")
            }
        }
    }else{
        for (let i = 0; i < animes.length; i++){
            let anime = animes[i];
            let text = document.querySelector('#link_encontrados');
            text.classList.add("invisible");
            anime.classList.remove("blob")
            
        }

    }
    
});