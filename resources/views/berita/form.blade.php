<div class="form-group">
    <label>Judul Berita</label>
    <input type="text"
           name="judul"
           class="form-control"
           value="{{ old('judul',$berita->judul ?? '') }}"
           required>
</div>

<div class="form-group">
    <label>Thumbnail</label>

    <input type="file"
           name="thumbnail"
           class="form-control">

    @isset($berita)
        @if($berita->thumbnail)
            <img src="{{ asset('storage/'.$berita->thumbnail) }}"
                 width="150"
                 class="mt-2">
        @endif
    @endisset
</div>

<div class="form-group">
    <label>Isi Berita</label>

    <textarea
    id="editor"
    name="isi"
    rows="10"
    class="form-control"></textarea>
</div>

<div class="form-group">
    <label>Status</label>

    <select name="status" class="form-control">

        <option value="1"
            {{ old('status',$berita->status ?? 1)==1?'selected':'' }}>
            Publish
        </option>

        <option value="0"
            {{ old('status',$berita->status ?? 1)==0?'selected':'' }}>
            Draft
        </option>

    </select>
</div>

@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

</script>

@stop