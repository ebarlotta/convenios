@extends('adminlte::page')
<!DOCTYPE HTML>
<script src="https://cdn.tiny.cloud/1/8b4aqnclfsiuag8khmdbjpbglxtdo2r8qpw20xkkhxld9w0o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent'
      });
    </script>

  <script src="https://cdn.tiny.cloud/1/8b4aqnclfsiuag8khmdbjpbglxtdo2r8qpw20xkkhxld9w0o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
  <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@livewireScripts

@section('js')
    <script> console.log('Hi!'); </script>
@stop