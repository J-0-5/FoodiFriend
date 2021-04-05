export default class ProductCategory {

    initialize() {
        this.editProductCategory()
        this.deleteProductCategory()
    }

    editProductCategory(){

        let btnEditProductCategory = document.getElementsByClassName('btnEditProductCategory');
        [].forEach.call(btnEditProductCategory, function (btn) {
            btn.addEventListener('click', () => {
                console.log("AAAAAAAAAAA")
                alert("si");
                console.log(btn.parentNode.parentNode.id);

                let productCategory = btn.parentNode.parentNode;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let url = '/productCategory/' + productCategory.id;
                    fetch(url, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    }).then((result) => result.json())
                    .then((data) => {
                        console.log(data);
                    }).catch((error) => {
                        console.error(error);
                    })

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
