var pageTitle = document.querySelector('#title')
pageTitle.textContent = "Durga Nutrição"

//Pegando informações do paciente e nela selecionando dados que quero:
var paciente = document.querySelector('#primeiro-paciente')
var peso = paciente.querySelector('.info-peso').textContent
var altura = paciente.querySelector('.info-altura').textContent
var imcTabela = paciente.querySelector('.info-imc')

//Validações
if (peso <= 0 || peso >= 1000 && altura >= 3){
  imcTabela.textContent = "Peso e altura inválidos!"
} else if (peso <= 0 || peso >= 1000) {
  imcTabela.textContent = "Peso inválido"
} else if (altura >= 3) {
  imcTabela.textContent = "Altura inválida"
} else {
  // Se passar nas validações, calcula IMC
  var imc = peso/(altura*altura)
  imcTabela.textContent = imc
}



