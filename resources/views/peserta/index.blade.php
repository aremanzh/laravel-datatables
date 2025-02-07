@extends('layout.app')

@section('content') 
<div class="container">
    @include('layout.notification')
    <div class="panel panel-default"> 
        <x-header :heading="'Senarai Peserta'" :section="'Selenggara'" :subsection="'Peserta'"/>
        <x-datatables :isSSR="true" :data="$data"/>
    </div>
</div>
@endsection