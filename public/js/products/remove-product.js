const buttonsDelete = document.querySelectorAll('.btn-delete');
let formDelete = document.querySelector('#form-delete');

buttonsDelete.forEach(buttonDelete => {
    buttonDelete.onclick = () => {
        let id = buttonDelete.getAttribute('data-id');
        formDelete.setAttribute('action', `/produtos/${id}`);
    }
});
