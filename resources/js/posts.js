import { Dropzone } from "dropzone";
Dropzone.autoDiscover = false;

const dropZoneCreatePost = () => {
    const dropZone = new Dropzone("#my-dropzone", { 
            createImageThumbnails: true,
            dictDefaultMessage: "Sube aqui tus fotos e imagenes",
            acceptedFiles: '.jpg,.png,.jpeg',
            addRemoveLinks: true,
            paramName: "imagen",
            init: function(){
                if(document.querySelector("#imagen").value.trim()){
                    const imagenPublicada = {}
                    imagenPublicada.size = 12
                    imagenPublicada.name = document.querySelector("#imagen").value

                    this.options.addedfile.call(this, imagenPublicada)
                    this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`)
                    imagenPublicada.previewElement.classList.add('dz-success','dz-complete')
                }
            }
        });

        dropZone.on('success',function(response){
            const respuesta = JSON.parse(response.xhr.response)
            document.querySelector("#imagen").value = respuesta.message
            console.log(respuesta.message)
        })
}

export default dropZoneCreatePost