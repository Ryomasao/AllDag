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
    console.log(files);
    fileInput.files = files;
})

var path = document.getElementsByClassName('submitPath');

fileInput.onchange = function(){
    console.log(this.files[0].name);
    path[0].value = this.files[0].name;
}