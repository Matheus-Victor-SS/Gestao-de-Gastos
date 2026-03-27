// Aguardar o DOM carregar completamente
document.addEventListener('DOMContentLoaded', function() {
    console.log("JS carregou");
    console.log("Salario:", salario);
    
    // Verificar se o elemento existe
    const salarioBox = document.getElementById('salarioBox');
    
    if (salarioBox) {
        salarioBox.innerHTML = `
            <h3>Salário</h3>
            <p>R$ ${Number(salario).toFixed(2)}</p>
        `;
        console.log("Salário exibido com sucesso!");
    } else {
        console.error("Elemento 'salarioBox' não encontrado!");
    }
});

const abrir = document.getElementById('add')
const fechar = document.getElementById('close')
var cont = document.getElementById('cont')
const btn = document.getElementById('btn')
let motivoSelecionado = ""; // Inicializar a variável

console.log("Event listeners sendo configurados");

abrir.addEventListener('click', ()=>{
    cont.showModal();
})

fechar.addEventListener('click', ()=>{
    cont.close();
})

//pega o motivo selecionado
function selecionar(motivo){
    motivoSelecionado = motivo
    document.getElementById('escolhido').innerText = "selecionado: " + motivo
}

//verifica se ta completa
btn.addEventListener('click', ()=>{
    let descricao = document.getElementById('text').value
    let valor = document.getElementById('num').value

    if(descricao == "" || valor == "" || motivoSelecionado == ""){
        alert("Preencha tudo!")
        return
    }

    let tabela = document.getElementById("tabela").getElementsByTagName('tbody')[0]

    let novaLinha = tabela.insertRow()//adicionar linha nova na tabela
    //indice de cada item
    novaLinha.insertCell(0).innerText = descricao
    novaLinha.insertCell(1).innerText = valor
    novaLinha.insertCell(2).innerText = motivoSelecionado
    novaLinha.insertCell(3).innerText = "Gasto"
    //pega a data do momento
    let data = new Date().toLocaleDateString()
    novaLinha.insertCell(4).innerText = data

    // botão excluir
    let celulaAcao = novaLinha.insertCell(5)
    let btnExcluir = document.createElement("button")
    btnExcluir.innerText = "Excluir"

    btnExcluir.onclick = function(){
        novaLinha.remove()
    }

    celulaAcao.appendChild(btnExcluir)

    // limpar campos
    document.getElementById('text').value = ""
    document.getElementById('num').value = ""
    document.getElementById('escolhido').innerText = "Nenhum selecionado"
    motivoSelecionado = ""

    cont.close()
})