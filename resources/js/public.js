// $(document).ready(function () {
//     $('.empresaEmpleado').on('change', function () {
//         $('.centrosEmpleado').html('<option selected disabled value="">Centros</option>')
//         $.get("centrosDeCosto", {
//             idEmpresa: $(this).val()
//         }, function (data) {
//             if (data.res == 'ok') {
//                 data.centros.map(c => {
//                     $('.centrosEmpleado').append(`
//                     <option value="${c.id}">${c.centro}</option>
//                 `)
//                 })
//             }
//         },
//             "json"
//         );
//     })
// });
// alert(111);
document.getElementById('department').onchange = function () {
    let department = document.getElementById("department").value;
    let url = new URL("http://127.0.0.1:8000/cities");
    const params = { department_id: department };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));
    console.log(url);
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data.cities);
            let select = document.getElementById('city');

            for (let i = 0; i <= select.childElementCount + 1; i++) {
                select.remove(1);
            }

            data.cities.map(c => {
                let option = document.createElement("option");
                option.text = c.name;
                option.value = c.id;
                select.appendChild(option)
            });
        });

};
