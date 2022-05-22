// FUNÇÕES DA TELA Request@add
function generateValue(element) {
  const partial = "qt_";
  const partialText = "qt_text_";
  let attribute = element.getAttribute("attr-value");
  let elementText = document.getElementById(partialText + attribute);

  elementText.value = (element.value * attribute).toLocaleString("pt-br", {
    minimumFractionDigits: 2,
  });
  toUpdateValueTotal();
}

function toUpdateValueTotal() {
  elements = document.querySelectorAll(".input_text");
  let valueTotal = 0.0;
  elements.forEach((item) => {
    if (item.value !== "") {
      valueTotal = valueTotal + parseFloat(getMoney(item.value));
    }
    document.getElementById("value_total").value = valueTotal.toLocaleString(
      "pt-br",
      { minimumFractionDigits: 2 }
    );
  });
}

function getMoney(str) {
  return str
    .replace(/[^\d,]+/g, "") // Remove caracteres desnecessários.
    .replace(",", "."); // Troca o separador decimal (`,` -> `.`)
}

function getShippingById(element) {
  let value_input = element.value;
  let attr = element.getAttribute("attr-value");
  $("#id_" + attr)
    .find("option")
    .each(function () {
      let vl = $(this).val();
      if (vl == value_input) {
        $(this).attr("selected", true);
      }
    });
}

function functionConfirmChek(url) {
  let checados = [];
  $.each($("input[name='setados[]']:checked"), function () {
    checados.push($(this).val());
  });
  let string = "";
  checados.map((item, index) => {
    if (index + 1 < checados.length) {
      string += item + ",";
    } else {
      string += item;
    }
  });

  let dateInitial = document.getElementById("date_initial").value;
  let dateFinal = document.getElementById("date_final").value;
  string = { checados: string, dateInitial: dateInitial, dateFinal: dateFinal };

  $.ajax({
    url: url + "/request/search",
    type: "POST",
    data: string,
  })
    .done(function (response) {
      console.log(response);
      window.location.replace(url + "/request/view");
      $("#date_initial").val(dateInitial);
      $("#date_final").val(dateFinal);
      document.getElementById("pesquisar").click();
    })
    .fail(function (jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    })
    .always(function () {
      console.log("completou");
    });
}

/*function saveAndConitnueRequest() {
  let elements = document.querySelectorAll('.element')
  console.log(elements.length)
  const el = Array()
  for(x=0; x <= elements.length; x++){
    el.push(elements[x].name, elements[x].value)
    //console.log(elements[x].name)
  }
  if(localStorage.getItem('request') === null){
    localStorage.setItem('request', JSON.stringify([el]))
  }else{
    localStorage.getItem('request', 
      JSON.stringify([
        ...JSON.parse(localStorage.getItem('request')),
        el
      ])
    )
  }

  for(x=0; x <= elements.length; x++ ){
    elements[x].value = null;
  }
}*/
