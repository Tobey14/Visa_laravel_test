@extends("layout")

@section('home')
    






<div class="content-wrapper">

<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Users</h4>
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
                  <th> username</th>
                  <th> email </th>
                  <th> balance </th>
                  <th> Actions </th>
                </tr>
              </thead>
              <tbody>
                @forelse($users as $user)
                <tr>
                  <td>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td> {{$user->username}} </td>
                  <td> {{$user->email}} </td>
                  <td> {{$user->balance}} </td>
                  <td>
                    <form action="{{route('transaction.index')}}" method="get" class="form-group">
                        <input type="hidden" class="id" name="id" value="{{$user->id}}">
                        <button class="badge badge-outline-danger" href="">Transactions</button>
                  
                    </form>
                  </td>
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