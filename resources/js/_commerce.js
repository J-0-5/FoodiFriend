export default class Commerce {

    initialize() {
        this.deleteCommerce()
    }

    deleteCommerce() {

        const Swal = require('sweetalert2')
        let btnDeleteCommerce = document.getElementsByClassName('btnDeleteCommerce');

        if (btnDeleteCommerce == null) {
            return;
        }

        [].forEach.call(btnDeleteCommerce, function (btn) {
            btn.addEventListener('click', () => {

                let commerce = btn.parentNode.parentNode;

                Swal.fire({
                    title: '¿Seguro que quieres continuar?',
                    text: 'Se eliminaran todos los productos y categorias de este comercio',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (!result.value) {
                        return;
                    }

                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    let url = '/commerce/' + commerce.id;

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
                                commerce.remove();
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

                })
            });
        });
    }
}
