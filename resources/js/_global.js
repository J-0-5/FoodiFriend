export default class Global {
    initialize() {
        this.onChangeDepartment();
    }
    onChangeDepartment() {
        let department = document.getElementById('department');
        if (department == null) {
            return;
        }
        department.onchange = function () {
            let department = document.getElementById("department").value;

            fetch(`/cities?department_id=${department}`)
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById('city');
                    select.innerHTML = `<option selected disabled value="0">Ciudad</option>`;

                    data.cities.map(c => {
                        let option = document.createElement("option");
                        option.text = c.name;
                        option.value = c.id;
                        select.appendChild(option)
                    });
                });
        };
    }
}
