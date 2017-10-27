'use strict';

window.Vue = require('vue');


new Vue({
    el:'.fileUpload',
    data:{
        fileName:'',
        file:'',
    },
    methods:{
        //drag&dropでファイルを置いたときに発火するイベント
        onDrop:function(event){
            this.file = event.dataTransfer.files;
            //このコードをvueでやる場合、どうしたらいいんだろう
            document.getElementById('fileInput').files = this.file;
        },
        //フォームでファイル選択をしたときに発生するイベント
        onChange:function(event){
            this.fileName = event.target.files[0].name;
        }

    }
})
