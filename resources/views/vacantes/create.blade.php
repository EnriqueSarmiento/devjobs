@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css" integrity="sha512-qkeymXyips4Xo5rbFhX+IDuWMDEmSn7Qo7KpPMmZ1BmuIA95IPVYsVZNn8n4NH/N30EY7PUZS3gTeTPoAGo1mA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection


@section('content')
    <div class="w-full max-w-sm mx-auto">
        <h1 class="text-2xl text-center mt-10">Nueva Vacantes</h1>
        <form class="max-w-lg mx-auto my-10" action="{{ route('vacantes.store') }}" method="POST">
            @csrf
            <div class="my-5">
                <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>
                <input id="titulo" type="titulo" class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') border-red-500 border @enderror" name="titulo" value="{{ old('titulo') }}"  autocomplete="titulo" autofocus
                    placeholder="Titulo de la vacante"
                >

                @error('titulo')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="my-5">
                <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
                <select name="categoria" id="categoria" class="block appearence-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100">
                    <option disabled selected>- Selecciona una catgeoria -</option>
                    @foreach ($categorias as $categoria )
                        <option
                            {{ old('categoria') == $categoria->id? 'selected' : '' }}
                        value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="my-5">
                <label for="experiencia" class="block text-gray-700 text-sm mb-2">experiencia:</label>
                <select name="experiencia" id="experiencia" class="block appearence-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100">
                    <option disabled selected>- Selecciona una categoria -</option>
                    @foreach ($experiencias as $experiencia )
                        <option 
                        {{ old('experiencia') == $experiencia->id? 'selected' : '' }}
                        value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>
                    @endforeach
                </select>
                @error('experiencia')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="my-5">
                <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion:</label>
                <select name="ubicacion" id="ubicacion" class="block appearence-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100">
                    <option disabled selected>- Selecciona una ubicacion -</option>
                    @foreach ($ubicaciones as $ubicacion )
                        <option 
                        {{ old('ubicacion') == $ubicacion->id? 'selected' : '' }}
                        value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                    @endforeach
                </select>
                @error('ubicacion')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
                
            </div>
            <div class="my-5">
                <label for="salario" class="block text-gray-700 text-sm mb-2">salario:</label>
                <select name="salario" id="salario" class="block appearence-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100">
                    <option disabled selected>- Selecciona una categoria -</option>
                    @foreach ($salarios as $salario )
                        <option 
                        {{ old('salario') == $salario->id? 'selected' : '' }}
                        value="{{ $salario->id }}">{{ $salario->nombre }}</option>
                    @endforeach
                </select>
                @error('salario')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror

            </div>
            <div class="my-5">
                <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion del pesto:</label>
                <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700">

                </div>
                <input type="hidden" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
                @error('descripcion')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="my-5">
                <label for="habilidades" class="block text-gray-700 text-sm mb-2">habilidades y Conocomientos:<span class="text-xs"> (Elige al menos 3)</span></label>
                @php
                    $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
                @endphp
                <lista-skills :skills="{{ json_encode($skills) }}" :oldskills="{{ json_encode( old('skills') ) }}"></lista-skills>
                @error('skills')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="my-5">
                <label for="dropzoneDevJobs" class="block text-gray-700 text-sm mb-2">Imagen vacante:</label>
                <div class="dropzone rounded bg-gray-100" id="dropzoneDevJobs">

                </div>
                <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">
                @error('imagen')
                    <div class="bg-red-100 border border-red-400 text-red 700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
                <p id="error"></p>
            </div>



            <button type="submit" class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">Publicar Vacante</button>
        </form>
    </div>

@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.js" integrity="sha512-FFyHlfr2vLvm0wwfHTNluDFFhHaorucvwbpr0sZYmxciUj3NoW1lYpveAQcx2B+MnbXbSrRasqp43ldP9BKJcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', () => {
        //Medium Editor
        const editor = new MediumEditor('.editable', {
            toolbar : {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                static: true,
                sticky: true,
            },
            placeholder: {
                text: 'informacion de la vacancte',
            }
        });
        //agrega al input hidden lo que el usuario escribe en medium editor
        editor.subscribe('editableInput', function(eventObj, editable){
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })
        //llena el editor con el contenido del inout hidden, el e caso de error al envio se mantiene la iformacion en el div. y no se escribira de nuevo. 
        editor.setContent( document.querySelector('#descripcion').value );
        


        //Dropzone
        const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
            url: '/vacantes/imagen',
            dictDefaultMessage: 'sube tu archivo',
            acceptedFiles: ".png, .jpg, .jpeg, .gif",
            addRemoveLinks: true,
            divRevomeFile: 'borrar archivo',
            maxFiles: 1,
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            init: function(){
                if(document.querySelector('#imagen').value.trim()){
                    //recreando el objeto de ddropzone para subir la imagen de nevo en caso de que el form no pas ela validacion
                    let imagenPublicada = {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('#imagen').value;

                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                    imagenPublicada.previewElement.classlist.add('dz-sucess')
                    imagenPublicada.previewElement.classlist.add('dz-complete')
                }
            },
            success: function(file, response){
                console.log(response.correcto);
                console.log(response.idk);
                // console.log(file);
                document.querySelector('#error').textContent = '';

                //coloca la respuesta del servidor en el input hidden
                document.querySelector('#imagen').value = response.correcto;
                
                //a;adir al objeto de archivo el nombre del servidor
                file.nombreServidor = response.correcto;
            },
            // error: function(file, response){
            //     // console.log(response);
            //     // console.log(file);
            //     document.querySelector('#error').textContent = 'formato no valido';
            // },
            maxfilesexceeded: function(file){
               if(this.files[1] != null){
                   this.removeFile(this.files[0]); //ESTO ELIMINA EL ARCHIVO ANTERIOR
                   this.addFile(file); // agrega el nuevo archivo
               }
            },
            removedfile: function(file, response){
                // console.log(file);
                file.previewElement.parentNode.removeChild(file.previewElement);
                params = {
                    //revisa por el name del servidor o por el query selector
                    imagen: file.nombreServidor ?? document.querySelector('#imagen').value,
                }
                axios.post('/vacantes/borrarimagen', params )
                .then(respuesta => console.log(respuesta))
            }
        })

    })
</script>
@endsection