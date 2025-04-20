@extends('partials.layout')

@section('content')
  <main class="main">
    <div class="page-title">
    <div class="heading">
      <div class="container">
      <div class="row d-flex justify-content-center text-center" data-aos="fade-up">
        <div class="col-lg-10">
        <h1 class="heading-title mb-4">Latar Belakang Lazismu</h1>
        <hr>
        @foreach ($latarbelakang as $latar)
      <p class="text-left mb-3">
        {!! nl2br(e($latar->isi)) !!}
      </p>
    @endforeach
        </div>
      </div>
      </div>
    </div>
    </div>
  </main>
@endsection