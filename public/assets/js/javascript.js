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

  if (checados.length == 0) {
    document.getElementById("msg").innerHTML =
      "Precisa selecionar algum dos pedidos!";
  } else {
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
    string = {
      checados: string,
      dateInitial: dateInitial,
      dateFinal: dateFinal,
    };

    $.ajax({
      url: url + "/request/search/ajax",
      type: "POST",
      data: string,
    })
      .done(function (response) {
        console.log(response);
        window.location.replace(url + "/request/search");
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
}

function functionConfirmPartial(url) {
  let checados = [];
  $.each($("input[name='setados[]']:checked"), function () {
    checados.push($(this).val());
  });
  if (checados.length > 0) {
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

    let array = [];

    stringValus = "";
    let cassA = document.getElementById("modal_10").value;
    let cassB = document.getElementById("modal_20").value;
    let cassC = document.getElementById("modal_50").value;
    let cassD = document.getElementById("modal_100").value;
    stringValus += cassA != "" ? "cass_A=" + cassA + "&" : "cass_A=0&";
    stringValus += cassB != "" ? "cass_B=" + cassB + "&" : "cass_B=0&";
    stringValus += cassC != "" ? "cass_C=" + cassC + "&" : "cass_C=0&";
    stringValus += cassD != "" ? "cass_D=" + cassD : "cass_D=0";

    string = {
      checados: string,
      dateInitial: dateInitial,
      dateFinal: dateFinal,
      values: stringValus,
    };

    $.ajax({
      url: url + "/request/search/partial",
      type: "POST",
      data: string,
    })
      .done(function (response) {
        console.log(response);
        window.location.replace(url + "/request/search");
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
  } else {
    closeModal();
  }
}
function openModalConfirmParcial(url) {
  let checados = [];
  $.each($("input[name='setados[]']:checked"), function () {
    checados.push($(this).val());
  });
  if (checados.length > 0) {
    $("#modal").css({ opacity: "1" });
    $("#modal").css({ pointerEvents: "auto" });
  }
  document.getElementById("msg").innerHTML =
    "Precisa selecionar algum dos pedidos!";
  console.log(checados.length);
}

function generateValueInModal(element) {
  const partialText = "modal_text_";
  let attribute = element.getAttribute("attr-value");
  let elementText = document.getElementById(partialText + attribute);

  elementText.value = (element.value * attribute).toLocaleString("pt-br", {
    minimumFractionDigits: 2,
  });
  toUpdateValueTotalInModal();
}

function toUpdateValueTotalInModal() {
  elements = document.querySelectorAll(".input_modal_text");
  let valueTotal = 0.0;
  elements.forEach((item) => {
    if (item.value !== "") {
      valueTotal = valueTotal + parseFloat(getMoney(item.value));
    }
    document.getElementById("value_total_modal").value =
      valueTotal.toLocaleString("pt-br", { minimumFractionDigits: 2 });
  });
}

function closeModal() {
  $("#modal").css({ opacity: "0" });
  $("#modal").css({ pointerEvents: "none" });
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
