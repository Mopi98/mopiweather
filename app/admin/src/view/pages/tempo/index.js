(function () {
    var cidade_home = localStorage.getItem('valueText');
    var btn_submit = document.querySelector("#btn_submit");
    var radio1 = document.querySelector("#exampleRadios1");
    var radio2 = document.querySelector("#exampleRadios2");
    const { tempo: API } = APP.api();
    
    
    function converterCelsius(dado) {
        
        return Math.round((dado - 273)) + "°C";
    
    }
    
    function converterFarenheit(dado) {
        return Math.round((((dado - 273.15)*1.8)+32)) + "°F";
        
    } 

    function template(tipo) {
        if(tipo == "dia") {
            document.querySelector('#navbar').setAttribute("class","p-2 d-flex justify-content-left fixed-top bg-light");
            document.querySelector('#btn_submit').setAttribute("class","btn btn-warning ml-2");
            document.querySelector('#card').setAttribute("class","jumbotron px-3 py-3 bg-light");
            document.querySelector('body').setAttribute("style","background-color: #FFA200;");   
            document.querySelector('body').setAttribute("style","background-color: #FFA200;");   
            document.querySelector('#css').setAttribute("href","");   
        } else if (tipo == "noite") {
            document.querySelector('#navbar').setAttribute("class","p-2 d-flex justify-content-left fixed-top");
            document.querySelector('#navbar').setAttribute("style","background-color:  #183F8C;");
            document.querySelector('#btn_submit').setAttribute("class","btn btn-primary ml-2");
            document.querySelector('#card').setAttribute("class","jumbotron px-3 py-3 text-white");
            document.querySelector('#card').setAttribute("style","border-radius: 5.29rem; background-color: #0E0359;");
            document.querySelector('body').setAttribute("style","background: -webkit-gradient(linear, left top, left bottom, from(#1C7CE0), to(#150051));"); 
            document.querySelector('#css').setAttribute("href","");   
            
        } else {
            document.querySelector('#navbar').setAttribute("class","p-2 d-flex justify-content-left fixed-top");
            document.querySelector('#navbar').setAttribute("style","background-color:  #000;");
            document.querySelector('#btn_submit').setAttribute("class","btn btn-dark ml-2");
            document.querySelector('#card').setAttribute("class","jumbotron px-3 py-3 text-white");
            document.querySelector('#card').setAttribute("style","border-radius: 5.29rem; background-color: #737373;");
            document.querySelector('body').setAttribute("style","background: -webkit-gradient(linear, left top, left bottom, from(#262626), to(#404040));"); 
            document.querySelector('#css').setAttribute("href","/admin/src/view/pages/tempo/index.css");   
            
        }
    }



    function iconestempo(id,figura) {

        if(id == 210 || id == 211 || id == 212 || id == 221) {
            if(figura.substr(2,2) == "d") {
                template("dia");
                icon = "/admin/src/view/assets/css/img/iconestempo/raio.svg";
            } else {
                template("noite");
                icon = "/admin/src/view/assets/css/img/iconestempo/raio.svg";
            }
        } else if (id == 200 || id == 201 ||id == 202 || id == 230 || id == 231 || id == 232) {
            template("chuva");
            icon = "/admin/src/view/assets/css/img/iconestempo/raiochuva.svg";
        } else if (id.toString().substr(0,1) == 3) {
            template("chuva");
            icon = "/admin/src/view/assets/css/img/iconestempo/chuvaforte.svg";
        } else if (id == 500 || id == 501 || id == 502 || id == 503 || id == 504) {
            if(figura.substr(2,2) == "d") {
                template("chuva");
                icon = "/admin/src/view/assets/css/img/iconestempo/solcomchuva.svg";             
            } else {
                template("chuva");
                icon = "/admin/src/view/assets/css/img/iconestempo/noitechuva.svg";             
            }
        } else if (id.toString().substr(0,1) == 6) {
            template("noite");
            icon = "/admin/src/view/assets/css/img/iconestempo/neve.svg";
        } else if (id.toString().substr(0,1) == 7) {
            if(figura.substr(2,2) == "d") {
                template("dia");
                icon = "/admin/src/view/assets/css/img/iconestempo/mnuvens.svg";
            } else {
                template("noite");
                icon = "/admin/src/view/assets/css/img/iconestempo/mnuvens.svg";
            }
        } else if (id == 800) {
            if(figura.substr(2,2) == "d") {
                template("dia");
                icon = "/admin/src/view/assets/css/img/iconestempo/sol.svg";             
            } else {
                template("noite");
                icon = "/admin/src/view/assets/css/img/iconestempo/lua.svg";             
            }
        } else if ( id == 801 || id == 802 || id == 803 || id == 804 ) {
            if(figura.substr(2,2) == "d") {
                template("dia");
                icon = "/admin/src/view/assets/css/img/iconestempo/tempofechado.svg";
            } else {
                template("noite");
                icon = "/admin/src/view/assets/css/img/iconestempo/tempofechado.svg";
            }
        }
        return (icon);
    }
    
    
    async function buscarDados() { 
        const cidade_nav = document.querySelector('#cidade').value;

        if( cidade_nav == "") {
            var parametros = await API.buscar(cidade_home);
        } else {
            var parametros = await API.buscar(cidade_nav);
        }

        const isCelcius = document.querySelector('input[name=medida]:checked').value == "c";
    
        
        const temperatura = parametros['list'][0]['main']['temp'];
        const local = parametros['city']['name'];
        const pais = parametros['city']['country'];
        const status = parametros['list'][0]['weather'][0]['description'].toUpperCase();
        const id = parametros['list'][0]['weather'][0]['id'];
        const figura = parametros['list'][0]['weather'][0]['icon'];

        iconestempo(id,figura);
                    
    
        const t = isCelcius ? converterCelsius(temperatura) : converterFarenheit(temperatura);
        
        mudarTela(local,pais,t,status,icon);
     }

   
     function mudarTela(local,pais,temperatura,status,icon) {
        document.querySelector("#view_cidade").innerHTML = `${local}, ${pais}`;
        document.querySelector("#temp_atual").innerHTML = temperatura;
        document.querySelector("#status_tempo").innerHTML = status;
        document.querySelector("#icone_tempo").setAttribute("src",icon); 
    }
    
    buscarDados();

    
    btn_submit.addEventListener("click",buscarDados);

    radio1.addEventListener("click",buscarDados);
    
    radio2.addEventListener("click",buscarDados)
      
    })();
    
    
    