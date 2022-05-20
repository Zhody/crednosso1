// FUNÇÕES DA TELA Request@add
function generateValue(element) {
  const partial = 'qt_'
  const partialText = 'qt_text_'
  let attribute = element.getAttribute('attr-value')
  let elementText = document.getElementById(partialText+attribute)
  
   elementText.value = (element.value*attribute)
    .toLocaleString('pt-br', {minimumFractionDigits: 2})
   toUpdateValueTotal()
}

function toUpdateValueTotal() {
  elements = document.querySelectorAll('.input_text')
  let valueTotal = 0.0
  elements.forEach(item => {
    if(item.value !== ''){
      valueTotal = valueTotal + parseFloat(getMoney(item.value))  
    }
    document.getElementById('value_total').value = valueTotal
    .toLocaleString('pt-br', {minimumFractionDigits: 2})
  })
}

function saveAndConitnueRequest() {
  console.log("Faltando implementar a funçao");
  alert("Faltando implementar a funçao");
}

function getMoney(str) {
  return str
    .replace(/[^\d,]+/g, '') // Remove caracteres desnecessários.
    .replace(',', '.');      // Troca o separador decimal (`,` -> `.`)
}
