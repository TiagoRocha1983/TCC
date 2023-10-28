function clicou() {

   const input = document.querySelector('input');
   const botao = document.querySelector('.botao');

   if (input.getAttribute('type') === 'text') {
       input.setAttribute('type', 'numeric');
       botao.innerText = 'Novos valores';

   } else {
    input.setAttribute('type', 'text');
    botao.innerText = "Nova consulta";

   }

}