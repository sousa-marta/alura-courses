let companyTitle = "Durga Nutrição"
document.querySelector('#title').textContent = companyTitle
document.querySelector('title').textContent = companyTitle


//Pegando informações do paciente e nela selecionando dados que quero:
var pacientes = document.querySelectorAll('.paciente')

for (let i = 0; i < pacientes.length; i++) {
  paciente = pacientes[i]
  var peso = paciente.querySelector('.info-peso').textContent
  var altura = paciente.querySelector('.info-altura').textContent
  var imcTabela = paciente.querySelector('.info-imc')
  
  //Validações
  if (peso <= 0 || peso >= 1000 && altura >= 3){
    imcTabela.textContent = "Peso e altura inválidos!"
    paciente.classList.add('paciente-invalido')
  } else if (peso <= 0 || peso >= 1000) {
    imcTabela.textContent = "Peso inválido"
    paciente.classList.add('paciente-invalido')
  } else if (altura >= 3) {
    imcTabela.textContent = "Altura inválida"
    paciente.classList.add('paciente-invalido')
  } else {
    // Se passar nas validações, calcula IMC
    var imc = peso/(altura*altura)
    imcTabela.textContent = imc.toFixed(2)
  }
}




