@extends("layout")

@section('home')
    






<div class="content-wrapper">

<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All User's Transaction</h4>
          <div class="table-responsive">
          <table class="table">
              <thead>
                <tr>
                  <th>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </th>
                  <th> type </th>
                  <th> Amount </th>
                </tr>
              </thead>
              <tbody>
                @forelse($trans as $user)
                <tr>
                  <td>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td> {{$user->type}} </td>
                  <td> {{$user->amount}} </td>
                </tr>
                @empty
                  No transactions yet
                @endforelse


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- content-wrapper ends -->
    
@endsection