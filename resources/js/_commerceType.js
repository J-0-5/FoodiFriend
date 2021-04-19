export default class CommerceType {

    initialize() {
        this.editCommerceType();
        this.deleteCommerceType();
    }

    editCommerceType() {
        let btnEditType = document.getElementsByClassName('btnEditType');
        let form = document.getElementById('editForm');

        if (btnEditType == null) {
            return;
        }

        [].forEach.call(btnEditType, function (btn) {
            btn.addEventListener('click', () => {
                let commerceType = btn.parentNode.parentNode;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


                fetch(`/commerceType/${commerceType.id}/edit`,
                    {
                        headers:
                        {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {

                        form.setAttribute("action", 'commerceType/' + data.data.id);

                        document.getElementById('edit_name').value = data.data.name;

                        let route = document.getElementById('imgUpdate').getAttribute('data-route');
                        document.getElementById('imgUpdate').setAttribute('src', 'img/product-placeholder.jpg');

                        if (data.data.type_img != null) {
                            document.getElementById('imgUpdate').setAttribute('src', route + '/' + data.data.type_img);
                        }

                        let select = document.getElementById('edit_state');
                        let selected = '';

                        if (data.data.state == 1) {
                            selected = 'selected';
                        }

                        select.innerHTML = `<option value="0">Inactivo</option> <option ${selected} value="1">Activo</option>`;
                    });
            });
        });
    }

    deleteCommerceType() {

        const Swal = require('sweetalert2')
        let btnDeletecommerceType = document.getElementsByClassName('btnDeletecommerceType');

        if (btnDeletecommerceType == null) {
            return;
        }


        [].forEach.call(btnDeletecommerceType, function (btn) {
            btn.addEventListener('click', () => {

                let commerceType = btn.parentNode.parentNode;

                Swal.fire({
                    title: '¿Seguro que quieres continuar?',
                    text: 'Se eliminaran todos los comercios de este tipo',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {

                        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        let url = '/commerceType/' + commerceType.id;

                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.code == 200) {
                                    Swal.fire({
                                        title: 'Comercio eliminado',
                                        icon: 'success',
                                        confirmButtonText: 'Ok'
                                    })
                                    commerceType.remove();
                                } else {
                                    Swal.fire({
                                        title: data.message,
                                        icon: 'error',
                                        confirmButtonText: 'Ok'
                                    })
                                }
                            })
                            .catch(function () {
                                Swal.fire({
                                    title: 'Ups!',
                                    text: 'Ha ocurrido un error. Intentalo mas tarde',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            });
                    }
                })
            });
        });
    }
}
