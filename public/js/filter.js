let campoFiltro = document.querySelector("#filter");

campoFiltro.addEventListener("input", function(){
    let animes = document.querySelectorAll(".animes");

    if (this.value.length > 0){
        for(var i = 0; i< animes.length ; i++ ){
            let anime = animes[i];
            let nome = []
            nome.push(anime.childNodes[1].textContent);

            let text = document.querySelector('#encontrados');

            let Busca = new RegExp(this.value, "i");

            if (Busca.test(nome)){ 
                text.classList.remove("invisible");
                text.innerHTML = nome;
            }
        }
    }else{
        for (var i = 0; i < animes.length; i++){
            let text = document.querySelector('#encontrados');
            text.classList.add("invisible");
        }

    }
    
});