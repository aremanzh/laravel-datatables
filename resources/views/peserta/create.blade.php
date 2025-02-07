@extends('layout.app')

@section('content')  
<div class="container">
  @include('layout.notification')
  <div class="panel panel-default"> 
    <x-header :heading="'Tambah Senarai Peserta'" :section="'Selenggara'" :subsection="'Tambah Peserta'"/>
    <div class="panel-body">
      <form action="{{route('peserta.store')}}" method="post">
        @csrf
        @method('post')
          <x-input :label="'Nama'" :required="true" :type="'text'" :value="'nama'" :placeholder="'John Doe'"/>
          <x-input :label="'Emel'" :required="true" :type="'email'" :value="'emel'" :placeholder="'johndoe@domain.com'"/>
          <div class="form-group {{ $errors->has('jantina') ? 'has-error' : '' }}">
            <label for="jantina">Jantina <span class="text-danger">*</span></label>
            <select id="jantina" class="form-control" name="jantina">
              <option value="" disabled selected>Pilih jantina</option>
              <option value="Lelaki" {{ old('jantina') == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
              <option value="Perempuan" {{ old('jantina') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option> 
            </select>
            @error('jantina')
              <span class="help-block">
                {{ $message }}
              </span>
            @enderror
          </div>
          <x-input :label="'No. Telefon'" :required="true" :type="'tel'" :value="'no_telefon'" :placeholder="'0124562587'"/>
          
          <div>
            <a href="{{route('peserta.index')}}" class="btn btn-default" role="button">
              <span class="fa--mail-reply-all"></span>
              Kembali
            </a>
            <button class="btn btn-success" type="submit">
              <span class="fa--save"></span>
              Simpan
            </button>
          </div>
      </form>  
    </div>
  </div>
</div>
@endsection