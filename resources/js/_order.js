export default class Order {

    initialize() {
        this.editStatus()
    }

    editStatus(){
        //let dropdownStatus = document.getElementsByClassName('dropdown-menu'); 
        let dropdownItem = document.getElementsByClassName('dropdown-item');

        if(dropdownItem == null){
            return;
        }

        [].forEach.call(dropdownItem, function (btn) {
            btn.addEventListener('click', () => {
                
                let orderId = btn.parentNode.parentNode.parentNode.parentNode;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                let orderStatusSelected = dropdownItem.id;
                console.log(orderId.id);
                
                // fetch(`/order/${orderId.id}/status/${orderStatusSelected}`,
                //     {
                //         headers:
                //         {
                //             'X-CSRF-TOKEN': token
                //         }
                //     })
                //     .then(response => response.json())
                //     .then(data => {
                //         console.log(data);
                //     });
            });
        });
    }

}