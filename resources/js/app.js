require('./bootstrap');

global.bootstrap = require('bootstrap');
global.Notiflix = require('notiflix');


import Alpine from 'alpinejs';
import Notiflix from 'notiflix';

window.Alpine = Alpine;

Alpine.start();

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-tooltip="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})


/**
 * Envia para o backend os dados de formulario para inserção de dados
 * @param {event} ev
 */
global.submit = async function(ev){

    const url = ev.target.getAttribute('action');
    const method = ev.target.getAttribute('method')

    var formData = new FormData(ev.target);
    const plainFormData = Object.fromEntries(formData.entries());
	const formDataJsonString = JSON.stringify(plainFormData);

    const response = await fetch(url, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
        method: method,
        body: formDataJsonString
    });

    const responseJson = await response.json();

    switch(responseJson.code){
        case 201:
        case 200:
            Notiflix.Notify.success(responseJson.detail);
        break;

        default:
            Notiflix.Notify.failure(responseJson.detail);
            console.log(responseJson.error)
            return false;
        break;
    }

    return true;
}


/**
 * Faz o submit do form de cadastro de funcionarios
 * @param {event} ev
 */
global.insertEmployee = async function(ev){
    ev.preventDefault();
    Notiflix.Loading.dots('Salvando novo funcionário');
    const result = await submit(ev);

    if(result){
        var myModalEl = document.querySelector('.modal.fade.show');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide()

        Notiflix.Loading.change('Recarregando página')
        setTimeout(()=>{ location.reload();},1000);
    }else{
        Notiflix.Loading.remove();
    }

}


/**
 * Faz o submit do form de cadastro das movimentações
 * @param {event} ev
 */
global.insertMovement = async function(ev){
    ev.preventDefault();
    Notiflix.Loading.dots('Salvando nova movimentação');
    const result = await submit(ev);

    if(result){
        var myModalEl = document.querySelector('.modal.fade.show');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide()

        Notiflix.Loading.change('Recarregando página')
        setTimeout(()=>{ location.reload();},1000);
    }else{
        Notiflix.Loading.remove();
    }
}


/**
 * Faz o submit do form de atualização de funcionarios
 * @param {*} ev
 */
global.updateEmployee = async function(ev){
    ev.preventDefault();
    Notiflix.Loading.dots('Atualizando funcionário');
    const result = await submit(ev);

    if(result){
        var myModalEl = document.querySelector('.modal.fade.show');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide()

        Notiflix.Loading.change('Recarregando página')
        setTimeout(()=>{ location.reload();},1000);
    }else{
        Notiflix.Loading.remove()
    }
}





/**
 * Confirmação de exclusao de usuario
 * @param {*} idUser
 */
global.deleteEmployee = async function(nameUser, url){

    Notiflix.Confirm.show(
        'Exclusão de funcionário',
        `Tem certeza que quer deletar o funcionário ${nameUser}?`,
        'Sim',
        'Não',

        async function okCb() {
            Notiflix.Loading.dots('Removendo funcionário')
            const result = await destroy(url)

            Notiflix.Loading.change('Recarregando página')
            setTimeout(()=>{ location.reload();},1000);
        },

        function cancelCb() {},

        {},
    );

}



/**
 * Requisita no backend a exclusao do usaurio
 * @param {*} url
 * @returns
 */
global.destroy = async function(url){

    const token = document.querySelector('[name="csrf-token"]').getAttribute('content');

    const response = await fetch(url, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
          },
        method: 'DELETE'
    });

    const responseJson = await response.json();

    switch(responseJson.code){
        case 200:
            Notiflix.Notify.success(responseJson.detail);
        break;

        default:
            Notiflix.Notify.failure(responseJson.detail);
            console.log(responseJson.error)
            return false;
        break;
    }

    return true;
}
