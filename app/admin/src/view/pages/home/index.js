(function () {

var input = document.querySelector("#cidade");
var btn_submit = document.querySelector("#btn_submit");
const { tempo: API } = APP.api();


btn_submit.addEventListener("click",buscarDados)

 async function buscarDados() { 
    const cidade = input.value;
    localStorage.setItem('valueText', cidade);
    window.location.href = "tempo";
    
}

})();


