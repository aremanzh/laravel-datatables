@extends('layout.app')

@section('content')  
<div class="container">
  @include('layout.notification')
  <div class="panel panel-default"> 
    <x-header :heading="'Kemaskini Senarai Peserta'" :section="'Selenggara'" :subsection="'Kemaskini Peserta'"/>
    <div class="panel-body">
      <form action="{{route('peserta.update', ['peserta' => $peserta->id])}}" method="post">
        @csrf
        @method('put') 
            <x-input :label="'Nama'" :required="true" :type="'text'" :value="'nama'" :placeholder="'John Doe'" :data="$peserta->nama"/>
            <x-input :label="'Emel'" :required="true" :type="'email'" :value="'emel'" :placeholder="'johndoe@domain.com'" :data="$peserta->emel"/>
            <div class="form-group @error('jantina') has-error @enderror">
              <label for="jantina">Jantina <span class="text-danger">*</span></label>
              <select id="jantina" class="form-control" aria-label="jantina" name="jantina">
                <option value="" disabled selected>Pilih jantina</option>
                <option value="Lelaki" {{ $peserta->jantina === 'Lelaki' ?? 'selected' || old('jantina') == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                <option value="Perempuan" {{ $peserta->jantina === 'Perempuan' ?? 'selected' || old('jantina') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option> 
              </select>
              @error('jantina')
                <div class="help-block">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <x-input :label="'No. Telefon'" :required="true" :type="'tel'" :value="'no_telefon'" :placeholder="'0124562587'" :data="$peserta->no_telefon"/>
          <div>
            <a href="{{route('peserta.index')}}" class="btn btn-default" role="button">
              <span class="fa--mail-reply-all"></span>
              Kembali
            </a>
            <button class="btn btn-success" type="submit">
              <span class="fa--save"></span>
              Kemaskini
            </button>
          </div>
      </form>  
    </div>
  </div>
</div> 
@endsection  