@extends('layouts.app')
@section('content')
<div class="container">
    <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#modelId">
        Add New User
      </button>
    <table class="table bordered" id="studtable">
        <thead>
            <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Grade Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $key => $student)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $student->stud_id}}</td>
                <td>{{ $student->students_name->FirstName}}</td>
                <td>{{ $student->students_name->MiddleName}}</td>
                <td>{{ $student->students_name->LastName}}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->grade_level }}</td>
                <td>Edit</td>

                @empty
                <td>No students available</td>

            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<form action="{{ route('students.store') }}" method="post">
    @csrf
    @method('POST')
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                    <label for="StudentID">Student ID</label>
                    <input type="text" name="stud_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('stud_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" name="FirstName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('FirstName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="MiddleName">Middle Name</label>
                        <input type="text" name="MiddleName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('MiddleName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" name="LastName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('LastName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Age">Age</label>
                        <input type="text" name="age" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('age')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="GradeLevel">Grade Level</label>
                        <input type="text" name="grade_level" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('grade_level')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#studtable').DataTable();
    } );
</script>
@endsection
