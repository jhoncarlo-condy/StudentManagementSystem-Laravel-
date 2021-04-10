@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table bordered">
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
                <td scope="row">C-001-21</td>
                <td>Jhon Carlo</td>
                <td>Barili</td>
                <td>Condy</td>
                <td>23</td>
                <td>Grade 12</td>
            </tr>

        </tbody>
    </table>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
@endsection
