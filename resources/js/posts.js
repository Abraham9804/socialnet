import { Dropzone } from "dropzone";
Dropzone.autoDiscover = false;

const dropZoneCreatePost = () => {
    const dropZone = new Dropzone("#my-dropzone", { 
            createImageThumbnails: true,
            dictDefaultMessage: "Sube aqui tus fotos e imagenes",
            acceptedFiles: '.jpg,.png,.jpeg',
            addRemoveLinks: true,
            paramName: "imagen"
        });

        dropZone.on('success',function(response){
            const respuesta = JSON.parse(response.xhr.response)
            console.log(respuesta.message)
        })
}

export default dropZoneCreatePost