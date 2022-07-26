@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="container mt-5 text-center">
                    <h2 class="mb-4 text-white">
                        Upload Payment Billing Information
                    </h2>
                    <form action="{{ route('payment-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="form-control custom-file-input" id="customFile" accept="application/vnd.ms-excel" onchange="setfilename(this.value)">
                                <label id="filename" class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>
                    </form>
                </div>
            </div>
            <div class="row">
                    @error('file')
                    <div class="alert alert-danger container text-center mt-5">
                    {{-- <div class="invalid-feedback"  role="alert"> --}}
                        <strong>  {{ $message }} </strong></div>
                    @enderror
                    @if (session('error'))
                    <div class="alert alert-danger container mt-5 text-center">
                        <strong>  {{ session('error') }}</strong>
                    </div>
                    @endif
                    {{-- notifikasi sukses --}}
                    @if (session('status'))
                        <div class="alert alert-success container text-center mt-5">
                            <strong>  {{ session('status') }}</strong>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        function setfilename(val)
        {
          filename = val.split('\\').pop().split('/').pop();
        //   filename = filename.substring(0, filename.lastIndexOf('.'));
          document.getElementById('filename').innerHTML = filename;
        }
      </script>
@endpush
