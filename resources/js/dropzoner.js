import Dropzone from 'dropzone'
import 'dropzone/dist/dropzone.css'
// import Toastify from 'toastify-js'
// import 'toastify-js/src/toastify.css'

Dropzone.autoDiscover = false

const Dropzoner = (
    element,
    key,
    {
        urlStore,
        urlDestroy,
        csrf,
        acceptedFiles,
        files,
        maxFiles,
        kind,
        old,
    }
) => {
    // validate element throw error
    if (!element) {
        throw new Error('Element not found')
    }
    // validate urlStore throw error
    if (!urlStore) {
        throw new Error('URL Store not found')
    }
    // validate csrf throw error
    if (!csrf) {
        throw new Error('CSRF not found')
    }
    // validate acceptedFiles throw error
    if (!acceptedFiles) {
        throw new Error('Accepted Files not found')
    }
    // validate maxFiles throw error
    if (!maxFiles) {
        throw new Error('Max Files not found')
    }
    // validate kind throw error
    if (!kind) {
        throw new Error('Kind not found')
    }

    console.log('dropzoner work')

    const myDropzone = new Dropzone(element, {
        url: urlStore,
        headers: {
            'X-CSRF-TOKEN': csrf
        },
        acceptedFiles: acceptedFiles,
        maxFiles: maxFiles,
        addRemoveLinks: true,
        init: function () {
            // Add existent files
            if (files) {
                let input = document.createElement('input')

                // check files is not array
                // if (old) {
                //     Object.values(files).forEach(file => {
                //         const mockFile = {
                //             name: file,
                //             size: 0,
                //             accepted: true,
                //             kind: 'image',
                //             upload: {
                //                 filename: file,
                //                 size: 0
                //             },
                //             dataURL: file
                //         };

                //         // reference:
                //         this.emit("addedfile", mockFile);
                //         this.emit("thumbnail", mockFile, file);
                //         this.emit("complete", mockFile);

                //         input = document.createElement('input')
                //         input.setAttribute('type', 'hidden')
                //         input.setAttribute('name', `${key}[]`)
                //         input.setAttribute('value', file)
                //         mockFile.previewElement.appendChild(input)

                //     })

                //     return
                // }

                files.forEach(file => {
                    const mockFile = {
                        name: file.file_name,
                        size: file.size,
                        accepted: true,
                        kind,
                        upload: {
                            filename: file.file_name,
                            size: file.size
                        },
                        dataURL: file.original_url
                    };

                    // reference: https://github.com/dropzone/dropzone/blob/main/src/dropzone.js#L18
                    this.emit("addedfile", mockFile);
                    this.emit("thumbnail", mockFile, file.original_url);
                    this.emit("complete", mockFile);

                    input = document.createElement('input')
                    input.setAttribute('type', 'hidden')
                    input.setAttribute('name', `${key}[]`)
                    input.setAttribute('value', file.file_name)
                    mockFile.previewElement.appendChild(input)
                })
            }
        },
        success: function (file, response) {
            file.upload.filename = response.name
            file.upload.size = response.size
            console.log('success')

            const input = document.createElement('input')
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', `${key}[]`)
            input.setAttribute('value', response.name)
            file.previewElement.appendChild(input)
        },
        removedfile: function (file) {
            $.ajax({
                type: 'DELETE',
                url: urlDestroy,
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                data: {
                    filename: file.name,
                },
                success: function (data) {
                    console.log(data)
                },
                error: function (e) {
                    console.log(e)
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        // remove error
        error: function (file, response) {
            var _ref;
            new Toastify({
                message: response.message,
                type: 'error',
                duration: 5000
            })

            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
    })

    return myDropzone
}

// window Dropzoner
window.Dropzoner = Dropzoner

// export default Dropzoner

// var myDropzone = new Dropzone("#myDropzone", {
//     url: "{{ route('storage.store') }}",
//     headers: {
//         'X-CSRF-TOKEN': "{{ csrf_token() }}"
//     },
//     acceptedFiles: 'image/*',
//     maxFiles: 3,
//     addRemoveLinks: true,
//     init: function () {
//         @if ($item->getMedia('images'))
//             let input = document.createElement('input')
//             @foreach ($item->getMedia('images') as $image)
//                 var mockFile = {
//                     name: "{{ $image->file_name }}",
//                     size: {{ $image->size }},
//                     accepted: true,
//                     kind: 'image',
//                     upload: {
//                         filename: "{{ $image->file_name }}",
//                         size: {{ $image->size }}
//                     },
//                     dataURL: "{{ $image->getFullUrl() }}"
//                 };
//                 this.emit("addedfile", mockFile);
//                 this.emit("thumbnail", mockFile, "{{ $image->getFullUrl() }}");
//                 this.emit("complete", mockFile);

//                 input = document.createElement('input')
//                 input.setAttribute('type', 'hidden')
//                 input.setAttribute('name', 'images[]')
//                 input.setAttribute('value', "{{ $image->file_name }}")
//                 mockFile.previewElement.appendChild(input)
//             @endforeach
//         @endif
//     },
//     success: function (file, response) {
//         file.upload.filename = response.name
//         file.upload.size = response.size

//         const input = document.createElement('input')
//         input.setAttribute('type', 'hidden')
//         input.setAttribute('name', 'images[]')
//         input.setAttribute('value', response.name)
//         file.previewElement.appendChild(input)
//     },
//     removedfile: function (file) {
//         const name = file.upload.filename
//         const size = file.upload.size
//         $.ajax({
//             type: 'DELETE',
//             url: "{{ route('storage.destroy') }}",
//             headers: {
//                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
//             },
//             data: {
//                 filename: file.name,
//             },
//             success: function (data) {
//                 console.log(data)
//             },
//             error: function (e) {
//                 console.log(e)
//             }
//         });
//         var _ref;
//         return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
//     },
//     // remove error
//     error: function (file, response) {
//         var _ref;
//         return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

//         // Toast
//         const toast = new Toast({
//             message: response.message,
//             type: 'error',
//             duration: 5000
//         })
//     }
// });
