const APP = {
    carregando(mostrar = false) {
        if (mostrar) {
            document.querySelector('.app-loading').classList.add('show')
            return;
        }
        document.querySelector('.app-loading').classList.remove('show')
    },
    api() {
        const baseURL = "";

        const objectToFormData = (obj) => {
            const formData = new FormData();
            for (const key in obj) {
                if (obj[key]) {
                    formData.append(key, obj[key]);
                }
            }
            return formData;
        };

        const upload = async (url, formData) => {

            const r = await fetch(baseURL + url, {
                method: 'POST',
                body: formData
            });
            return r.status == 200 ? r.json() : []
        }

        const post = async (url, obj = {}) => {
            const body = objectToFormData(obj);
            const r = await fetch(baseURL + url, {
                method: "POST",
                body
            });
            return r.status == 200 ? r.json() : []
            
        };

        const get = async (url) => {
            const r = await fetch(baseURL + url);
            return r.status == 200 ? r.json() : []
            // return r.json();
        };


        const tempo = {
            buscar: async (cidade) => await post("./executar",{cidade})
        }
       
        return { tempo };
    }
}