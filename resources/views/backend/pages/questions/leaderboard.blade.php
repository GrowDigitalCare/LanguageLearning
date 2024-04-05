@extends('backend.layouts.layout')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="{{asset('admin')}}/assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{asset('admin')}}/assets/css/pages/simple-datatables.css">
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Languages Skill Test Leader Board Table</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">TestYour Skills Leader Board Table</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            Leader Board Table
        </div>

        <div class="card-body" style="overflow-x: auto;">
            <div class="table-responsive" style="max-height: 400px;">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Test Name</th>
                            <th scope="col">Total Marks</th>
                            <th scope="col">Marks Obtained</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($leaderboard as $entry)
                            <tr>
                                <td>{{ $entry->id }}</td>
                                <td>{{ $entry->user->name }}</td>
                                <td>{{ $entry->test ? $entry->test->title : 'No associated test' }}</td>
                                <td>
                                    @if ($entry->test)
                                        {{ optional($entry->test)->total_marks }}
                                    @else
                                        No data available
                                    @endif
                                </td>
                                <td>{{ $entry->marks_obtained }}</td>
                                <td>{{ $entry->test ? $entry->test->level : 'No associated test' }}</td>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <a href="{{ route('admin-testyourskills_delete', ['id' => $entry->id]) }}" onclick="confirmation(event)" style="margin-right: 10px;">
                                            <i class="bi bi-trash" style="color: red; font-size:20px"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</div>

</div>
<script src="{{asset('admin')}}/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{asset('admin')}}/assets/js/pages/simple-datatables.js"></script>
<script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you want to Delete this Data",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
              window.location.href = urlToRedirect;
          }
      });
  }
</script>
@endsection
