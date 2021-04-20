export default class Order {

    initialize() {
        this.updateStatus()
    }

    updateStatus() {

        let item = document.getElementById('status');

        if (item == null) {
            return;
        }

        item.addEventListener('change', () => {

            let id = item.parentNode.parentNode.id;
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let _data = { status: item.value };

            fetch('order/' + id, {
                method: 'PUT',
                headers: { 'X-CSRF-TOKEN': token, "Content-type": "application/json; charset=UTF-8" },
                body: JSON.stringify(_data)
            })
                .then(response => response.json())
                .then(data => {
                    const Swal = require('sweetalert2');

                    if (data.code == 200) {
                        Swal.fire({
                            title: data.message,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                    }
                    console.log(data);
                })

        });

    }

}
