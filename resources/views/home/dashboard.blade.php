@extends("layout")

@section('home')
    






<div class="content-wrapper">

<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Hi, {{auth()->user()->username}} Welcome to your Dashboard</h4>
          <div class="table-responsive">
            <h6 class="card-title">Wallet Balance : N {{auth()->user()->balance}}</h6>
            <a class="btn btn-primary" href="{{route('fund')}}">Fund Wallet</a>
            <a class="btn btn-info">Withdraw Fund</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- content-wrapper ends -->
    
@endsection