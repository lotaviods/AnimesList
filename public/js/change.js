function toggleInput(animeId) {
    const nomeanimeEl = document.getElementById(`nome-anime-${animeId}`);
    const inputanimeEl = document.getElementById(`input-nome-anime-${animeId}`);
    if (nomeanimeEl.hasAttribute('hidden')) {
        nomeanimeEl.removeAttribute('hidden');
        inputanimeEl.hidden = true;
    } else {
        inputanimeEl.removeAttribute('hidden');
        nomeanimeEl.hidden = true;
    }
}

function editaranime(animeId) {
    let formData = new FormData();
    const nome = document
        .querySelector(`#input-nome-anime-${animeId} > input`)
        .value;
    const token = document
        .querySelector(`input[name="_token"]`)
        .value;
    formData.append('nome', nome);
    formData.append('_token', token);
    const url = `/animes/${animeId}/editaNome`;
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(animeId);
        document.getElementById(`nome-anime-${animeId}`).textContent = nome;
    });
}