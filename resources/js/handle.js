$(document).ready(function () {
    $().jquery;
});
let name = document.getElementById("name");
let description = document.getElementById("description");

function update(id) {
    let path = "{{ route('products.edit', ':id') }}";
    let uri = path.replace(":id", id);

    let myModal = new Boo.Modal(document.getElementById("modalForm"), {});
    fetch(uri)
        .then((response) => response.json()) // convertir a json
        .then((data) => {
            name.value = data.name;
            description.value = data.description;
            myModal.show();
        }) //imprimir los datos en la consola
        .catch((err) => console.log(err)); // Capturar errores
}
