@extends('layouts.backend.app')
@section('title','Data Kosan')
@section('content')
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @elseif($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Data List users
              </h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table zero-configuration">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th class="text-nowrap">Nama</th>
                      <th class="text-nowrap">Email</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key => $item)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td><a href="/admin/user/{{$item->id}}/delete" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>

@endsection
@section('scripts')
<script type="text/javascript">
    // Status users
    $(document).on('click', '#statususers', function () {
    var id = $(this).attr('data-id-users');
    $.get('status-users', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
        location.reload()
    });
    });
</script>
@endsection
