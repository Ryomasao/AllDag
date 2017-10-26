console.log('im loaded');

var dropArea = document.getElementsByClassName('dropArea');
var fileInput = document.getElementById('fileInput');

dropArea[0].addEventListener('dragover', function(evt){
    evt.preventDefault();
})

dropArea[0].addEventListener('dragleave', function(evt){
    evt.preventDefault();
})

dropArea[0].addEventListener('drop', function(evt){
    evt.preventDefault();
    var files = evt.dataTransfer.files;
    //console.log(files);
    fileInput.files = files;
})