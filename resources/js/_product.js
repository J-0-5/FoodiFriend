export default class Product {
    initialize() {
        this.onChangeCommerce();
        this.deleteProduct();
    }

    onChangeCommerce() {

        let commerce = document.getElementById('commerce_id');

        if (commerce == null) {
            return;
        }

        commerce.onchange = function () {
            let commerce = document.getElementById("commerce_id").value;
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/productCategory/categories/${commerce}`,
                {
                    headers:
                    {
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById('productCategory');
                    select.innerHTML = `<option selected disabled value="0">Categoria de producto</option>`;

                    data.categories.map(c => {
                        let option = document.createElement("option");
                        option.text = c.name;
                        option.value = c.id;
                        select.appendChild(option)
                    });
                });
        };
    }

    deleteProduct() {

        const Swal = require('sweetalert2')
        let btnDeleteProduct = document.getElementsByClassName('btnDeleteProduct');

        if (btnDeleteProduct == null) {
            return;
        }

        [].forEach.call(btnDeleteProduct, function (btn) {
            btn.addEventListener('click', () => {

                let product = btn.parentNode.parentNode;

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
                    let url = '/product/' + product.id;

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
                                product.remove();
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
