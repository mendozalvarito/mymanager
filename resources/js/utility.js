import { Modal } from "bootstrap";
export default {
    update(id) {
        var myModal = new Modal(document.getElementById("exampleModal"));
        let name = document.getElementById("name");
        let description = document.getElementById("description");
        let path = "{{ route('products.edit', ':id') }}";
        let uri = path.replace(":id", id);
        fetch(uri)
            .then((response) => response.json()) // convertir a json
            .then((data) => {
                name.value = data.name;
                description.value = data.description;
                myModal.show();
            }) //imprimir los datos en la consola
            .catch((err) => console.log(err)); // Capturar errores
    },
};
