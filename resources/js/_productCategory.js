import { forEach } from 'lodash';

export default class ProductCategory {

    initialize() {
        this.editProductCategory()
        this.deleteProductCategory()
    }

    editProductCategory() {

        let btnEdit = document.getElementsByClassName('btnEditProductCategory');
        let form = document.getElementById('editForm');

        if (btnEdit == null) {
            return;
        }

        [].forEach.call(btnEdit, function (btn) {
            btn.addEventListener('click', () => {

                let productCategory = btn.parentNode.parentNode;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/productCategory/${productCategory.id}/edit`,
                    {
                        headers:
                        {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {

                        form.setAttribute("action", 'productCategory/' + data.data.id);
                        document.getElementById('edit_name').value = data.data.name;
                        document.getElementById('edit_description').value = data.data.description;

                        if (data.userId == 1) {
                            let selectedCommerceId = data.CommerceSelected.id;
                            let selectCommerceId = document.getElementById('edit_commerce_id');

                            let options = ``;
                            data.commerces.map(commerce => {
                                if (commerce.id == selectedCommerceId) {
                                    options += `<option selected value="${commerce.id}">${commerce.name}</option>`;
                                } else {
                                    options += `<option value="${commerce.id}">${commerce.name}</option>`;
                                }

                            });
                            selectCommerceId.innerHTML = options;
                        }

                        let selectState = document.getElementById('edit_state');
                        if (data.data.state == 1) {
                            selectState.innerHTML = `<option selected value="1">Activo</option> <option value="0">Inactivo</option>`;
                        } else {
                            selectState.innerHTML = `<option selected value="0">Inactivo</option> <option value="1">Activo</option>`;
                        }

                    });
            });
        });
    }

    deleteProductCategory() {

        const Swal = require('sweetalert2')
        let btnDeleteProductCategory = document.getElementsByClassName('btnDeleteProductCategory');

        if (btnDeleteProductCategory == null) {
            return;
        }


        [].forEach.call(btnDeleteProductCategory, function (btn) {
            btn.addEventListener('click', () => {

                let productCategory = btn.parentNode.parentNode;

                Swal.fire({
                    title: 'Eliminar Categoria de Producto!',
                    text: '¿Seguro que quieres continuar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (result.value) {
                        return;
                    }

                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    let url = '/productCategory/' + productCategory.id;

                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                        .then(() => {
                            Swal.fire({
                                title: 'Categoria de Producto eliminada',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            })
                            productCategory.remove();
                        })
                        .catch(function () {
                            Swal.fire({
                                title: 'Ups!',
                                text: 'Ha ocurrido un error. Intentalo mas tarde',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        });
                })
            });
        });
    }
}
