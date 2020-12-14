var campoFiltro = document.querySelector("#filter");

campoFiltro.addEventListener("input", function(){
    var animes = document.querySelectorAll(".animes");
    if (this.value.length > 0){
        for(var i = 0; i< animes.length ; i++ ){
            var anime = animes[i];

            var nome = anime.childNodes[1].textContent;
            var Busca = new RegExp(this.value, "i");
            if (!Busca.test(nome)){
                anime.classList.add("invisible");

            }else{
                anime.classList.remove("invisible");
            }
        }
    }else{
        for (var i = 0; i < animes.length; i++){
            var anime = animes[i];
            anime.classList.remove("invisible");
        }
    }
});