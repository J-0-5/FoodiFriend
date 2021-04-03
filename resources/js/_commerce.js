import { result } from 'lodash';

export default class Commerce {
    initialize() {
        this.deleteCommerce()
    }
    deleteCommerce() {
        const Swal = require('sweetalert2')
        let btnDeleteCommerce = document.getElementById('btnDeleteCommerce');
        btnDeleteCommerce.addEventListener('click', () => {
            Swal.fire({
                title: 'Eliminar Comercio!',
                text: '¿Seguro que quieres continuar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    let commerce = document.querySelector('.idCommerce');
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    // alert(token);

                    let url = '/commerce/' + commerce.id;


                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                        .then(() => {
                            Swal.fire({
                                title: 'Comercio eliminado',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            })
                            commerce.remove();
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
    }
}
