@extends('_layout')

@section('content')

<style>
:root {
  --colorPrimaryNormal: #00b3bb;
  --colorPrimaryDark: #00979f;
  --colorPrimaryGlare: #00cdd7;
  --colorPrimaryHalf: #80d9dd;
  --colorPrimaryQuarter: #bfecee;
  --colorPrimaryEighth: #dff5f7;
  --colorPrimaryPale: #f3f5f7;
  --colorPrimarySeparator: #f3f5f7;
  --colorPrimaryOutline: #dff5f7;
  --colorButtonNormal: #00b3bb;
  --colorButtonHover: #00cdd7;
  --colorLinkNormal: #00979f;
  --colorLinkHover: #00cdd7;
}


.upload_dropZone {
  color: #0f3c4b;
  background-color: var(--colorPrimaryPale, #c8dadf);
  outline: 2px dashed var(--colorPrimaryHalf, #c1ddef);
  outline-offset: -12px;
  transition:
    outline-offset 0.2s ease-out,
    outline-color 0.3s ease-in-out,
    background-color 0.2s ease-out;
}
.upload_dropZone.highlight {
  outline-offset: -4px;
  outline-color: var(--colorPrimaryNormal, #0576bd);
  background-color: var(--colorPrimaryEighth, #c8dadf);
}
.upload_svg {
  fill: var(--colorPrimaryNormal, #0576bd);
}
.btn-upload {
  color: #fff;
  background-color: var(--colorPrimaryNormal);
}
.btn-upload:hover,
.btn-upload:focus {
  color: #fff;
  background-color: var(--colorPrimaryGlare);
}
.upload_img {
  width: calc(33.333% - (2rem / 3));
  object-fit: contain;
}
</style>

<div class=" d-flex justify-content-center align-items-center flex-column h-100">

    @if (isset($errors) && $errors->any())
    <div class="alert alert-danger w-50 mb-3">
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    </div>
    @endif

    <form action="/student-import" class="w-50 d-flex justify-content-center align-items-center flex-column" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset class="upload_dropZone text-center mb-3 p-4 w-100">

            <legend class="visually-hidden">Image uploader</legend>

            <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                <use href="#icon-imageUpload"></use>
            </svg>

            <p class="small my-2">Drag &amp; Drop files inside dashed region<br><i>or</i></p>

            <input id="upload_image_logo" name="file" class="position-absolute invisible" type="file" />

            <label class="btn btn-upload mb-3" for="upload_image_logo">Choose file(s)</label>

            <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

        </fieldset>

        <button class="btn btn-primary mt-3">Import</button>
    </form>

    <svg style="display:none">
        <defs>
            <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
            <path d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z"/>
            </symbol>
        </defs>
    </svg>
</div>


@endsection
