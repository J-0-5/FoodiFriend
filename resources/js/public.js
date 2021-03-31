document.getElementById('department').onchange = function() {
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
            select.innerHTML = `<option selected disabled value="0">Ciudad</option>`;

            data.cities.map(c => {
                let option = document.createElement("option");
                option.text = c.name;
                option.value = c.id;
                select.appendChild(option)
            });
        });

};