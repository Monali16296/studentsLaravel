@extends('layouts.app')

@section('title', 'All Students')

@section('content')
<div class="row">
    @if(isset($updatemsg))
    <div class="alert alert-success">
        {{ $updatemsg }}
    </div>
    @endif
    @if(isset($deletemsg))
    <div class="alert alert-success">
        {{ $deletemsg }}
    </div>
    @endif
    <a href="{{ URL::to('form') }}">Add New</a>
    <table class="table table-bordered" id='table'>
        <thead>
            <tr>
                <th></th>
                <th>Random Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Dob</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>       
            @foreach($data as $student)
            <tr>
                <td><a href="{{ URL::to('delete', $student->randomId) }}">Delete</a></td>
                <td><a href="{{ URL::to('edit', $student->randomId) }}">{{ $student->randomId }}</td>
                <td>{{ $student->firstName }}</td>
                <td>{{ $student->lastName }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
            @endforeach         
           
        <!-- if you want to use paginate then for other pages you can use below method-->
        
            {{-- {{ $data->links() }} --}}
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="http://localhost/studentsLaravel/public/js/jquery.dataTables.min.js"></script>        
<script>
    $(function(){
       $('#table').DataTable({
           //for changing show entries by default it's starting from 10 but we want from 5
           "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
       }); 
    });
</script>
@stop

