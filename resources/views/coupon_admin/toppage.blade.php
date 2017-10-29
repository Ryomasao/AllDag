<!DOCTYPE html><html><head><meta charset="UTF-8"><meta content="text/html; charset=UTF-8" http-equiv="Content-Type"><meta name="viewport" content="width=device-width"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="csrf-token" content="{{ csrf_token() }}"><meta name="description" content=""><meta name="keywords" content=""><meta name="robots" content="noindex"><title>DIMクーポンサービス</title><link rel="shortcut icon" href="/img/favicon.ico"><!--temporary--><link rel="stylesheet" href="/css/toppage.css"></head><!--del--><!--include ../script/_config.pug--><body><!--サイドメニューとメインコンテンツの2カラムレイアウト--><div class="root"><div class="sidebar"><!--ハンバーガーメニュー--><a class="sidebar-trigger" href="#"> <span></span><span></span><span></span></a><div class="sidebar-menu"><ul><li><a href="#">sample1</a></li><li><a href="#">sample2</a></li><li><a href="#">sample3</a></li></ul></div></div><script src="js/sidemenu_pure.js"></script><main class="pageContent"><!--include ./config/mockup/_toppage.pug--><!-- コンテンツヘッダー--><div class="header"> <p class="title">実績反映ファイルアップロード</p><!--ToDo イメージをかえる--><a class="logout" href="#"><img src="https://placehold.jp/15x15.png"><span>ログアウト</span></a></div><!--+contentHeader('upload') --><div class="mainContent"> <form class="fileUpload" method="post" action="/posts/admin/items/upload" enctype="multipart/form-data"><span>{{ csrf_field() }}</span><div class="fileUpload-title"><p>ファイルアップロード</p></div><div class="fileUpload-dropArea" v-on:dragleave.prevent v-on:dragover.prevent v-on:drop.prevent="onDrop"><div v-if="!file"><img src="https://placehold.jp/100x100.png"><p>ドラッグ&ドロップでファイルをアップロード</p></div><div v-else><p>送信ボタンを押す</p></div></div><div class="fileUpload-submitArea"><span>ファイルアップロード</span><input type="text" readonly="disable" v-bind:value="fileName"><label class="square_btn">選択<input type="file" name="up_file" v-on:change="onChange" id="fileInput"></label><button class="square_btn">送信</button></div></form></div></main><!--del--><!--script(src="/js/manifest.js")--><!--script(src="/js/vendor.js")--><script src="/js/toppage.js"></script></div></body></html>