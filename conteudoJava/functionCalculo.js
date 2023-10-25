function clicou() {

    const input = document.querySelector('input');
    const botao = document.querySelector('.botao');

    if (input.getAttribute('type') === 'text'){
        input.setAttribute('type', 'number');
        botao.innerText = "Mostrar Calculo";
    } else {
        input.setAttribute('type', 'text');
        botao.innerText = "Nova consulta";
    }

    
}