

function fileSelect(evt) {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
            var files = evt.target.files;

            var result = '';
            var file;
            for (var i = 0; file = files[i]; i++) {
                // if the file is not an image, continue
                if (!file.type.match('image.*')) {
                        continue;
                    }

                    reader = new FileReader();
                    reader.onload = (function (tFile) {
                        return function (evt) {

                            var div = document.createElement('div');
                            div.innerHTML = '<img style="width: 300px;" src="' + evt.target.result + '" />';
                            document.getElementById('filesInfo').appendChild(div);
                        };
                    }(file));
                    reader.readAsDataURL(file);
                    }
                } else {
                    alert('The File APIs are not fully supported in this browser.');
                }
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    document.getElementById('filesToUpload').onchange = function(){
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function(ev){
                            document.getElementById('filesInfo').innerHTML = 'Done!';
                        };
                        xhr.open('POST', 'eventsCadastrar', true);
                        var files = document.getElementById('filesInfo').files;
                        var data = new FormData();
                        for(var i = 0; i < files.length; i++) data.append('file' + i, files[i]);
                        xhr.send(data);
                    };
                } else {
                    alert('The File APIs are not fully supported in this browser.');
                }
            }

            document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);