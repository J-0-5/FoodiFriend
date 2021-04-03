export default class ProductCategory {

    initialize() {
        this.deleteProductCategory()
    }

    deleteProductCategory() {

        const Swal = require('sweetalert2')
        let btnDeleteProductCategory = document.getElementsByClassName('btnDeleteProductCategory');

        if (btnDeleteProductCategory == null) {
            return;
        }


        [].forEach.call(btnDeleteProductCategory, function (btn) {
            btn.addEventListener('click', () => {

                console.log(btn.parentNode.parentNode.id);
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
                    }
                })
            });
        });
    }
}
