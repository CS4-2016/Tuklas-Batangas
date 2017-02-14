$(document).ready(function() {
    $('.summernote').summernote({
        height: 250,   //set editable area's height
        codemirror: { // codemirror options
        theme: 'monokai'
        }
    });
});

//var edit = function() {
//  $('.click2edit').summernote({ height: 300, focus: true});
//};
//
//var edit2 = function() {
//  $('.click2edit2').summernote({ height: 300, focus: true});
//};
//
//var edit3 = function() {
//  $('.click2edit3').summernote({ height: 300, focus: true});
//};
//
//var save = function() {
//  var markup = $('.click2edit').summernote('code');
//     $('input[name="content"]').val(markup);
//    
//};
//
//var save2 = function() {
//  var markup = $('.click2edit2').summernote('code');
//     $('input[name="content2"]').val(markup);
//    
//};
//
//var save3 = function() {
//  var markup = $('.click2edit3').summernote('code');
//     $('input[name="content3"]').val(markup);
//   
//};