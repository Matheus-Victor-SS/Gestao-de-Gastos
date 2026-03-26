const abrir = document.getElementById('add')
const fechar = document.getElementById('close')
var cont = document.getElementById('cont')

abrir.addEventListener('click', ()=>{
    cont.showModal();
})
fechar.addEventListener('click', ()=>{
    cont.close();
})
//pega o motivo selecionado
function selecionar(motivo){
    motivoSelecionado=motivo
    document.getElementById('escolhido').innerText = "selecionado: " + motivo
}
