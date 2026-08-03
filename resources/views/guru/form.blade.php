<div class="mb-3">

<label>Nama</label>

<input type="text"
name="nama"
class="form-control"
value="{{ old('nama',$guru->nama ?? '') }}">

</div>

<div class="mb-3">

<label>NIP</label>

<input type="text"
name="nip"
class="form-control"
value="{{ old('nip',$guru->nip ?? '') }}">

</div>

<div class="mb-3">

<label>Jabatan</label>

<input type="text"
name="jabatan"
class="form-control"
value="{{ old('jabatan',$guru->jabatan ?? '') }}">

</div>

<div class="mb-3">

<label>Foto</label>

<input type="file"
name="foto"
class="form-control">

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control">{{ old('deskripsi',$guru->deskripsi ?? '') }}</textarea>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option value="1">Aktif</option>

<option value="0">Tidak Aktif</option>

</select>

</div>

<div class="mb-3">

<label>Urutan</label>

<input type="number"
name="urutan"
class="form-control"
value="{{ old('urutan',$guru->urutan ?? 0) }}">

</div>