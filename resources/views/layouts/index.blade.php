@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table bordered" id="studtable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Grade Level</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse ($collection as $item)

                @empty

                @endforelse
            </tr>

        </tbody>
    </table>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#studtable').DataTable();
    } );
</script>
@endsection
