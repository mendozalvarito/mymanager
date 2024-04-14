const myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
const form = document.getElementById("formProduct");
const name = document.getElementById("name");
const description = document.getElementById("description");
const image = document.getElementById("imgPreview");
const inputMethod = document.createElement('input');
const title = document.getElementById('titleModal');
const button = document.getElementById('buttonModal');
inputMethod.type = 'hidden';
inputMethod.name = '_method';
inputMethod.value = 'put';
inputMethod.id = 'inputUpdate';

function update(id) {
    let routeEdit = "{{ route('products.edit', ':id') }}";
    let routeUpdate = "{{ route('products.update', ':id') }}";
    let uri = routeEdit.replace(":id", id);

    fetch(uri)
        .then((response) => response.json()) // convertir a json
        .then((data) => {
            name.value = data.name;
            description.value = data.description;
            image.src = "/storage/uploads/images/products/" + data.image;
            form.action = routeUpdate.replace(":id", id);
            form.appendChild(inputMethod);
            title.innerHTML = "{{ trans('Update :name', ['name' => __('Product')]) }}";
            button.innerHTML = "{{ __('Update') }}";
            myModal.show();
        }) //imprimir los datos en la consola
        .catch((err) => console.log(err)); // Capturar errores
}

function crear() {
    form.reset();
    image.src = '';
    form.action = "{{ route('products.store') }}";
    title.innerHTML = "{{ trans('Create :name', ['name' => __('Product')]) }}";
    button.innerHTML = "{{ __('Create') }}";
    if (document.getElementById('inputUpdate') !== null) {
        form.removeChild(inputMethod);
    }
    myModal.show();
}

const buttons = document.querySelectorAll("button[id^='update']");
buttons.forEach(button => {
    const idButton = button.getAttribute('id').split(' ')[1];
    button.addEventListener('click', function() {
        update(idButton);
    });
});

const buttonCreate = document.getElementById('create');
buttonCreate.addEventListener('click', function() {
    crear();
});

const inputImage = document.getElementById("image");

const previewImage = () => {
    const file = inputImage.files;
    if (file) {
        const fileReader = new FileReader();
        fileReader.onload = function(event) {
            image.src = event.target.result;
        };
        fileReader.readAsDataURL(file[0]);
    }
};


inputImage.addEventListener('change', previewImage);
