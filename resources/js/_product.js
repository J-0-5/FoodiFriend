export default class Product {
    initialize() {
        this.onChangeCommerce();
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
}
