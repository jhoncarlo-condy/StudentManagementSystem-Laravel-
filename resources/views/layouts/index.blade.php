@extends('layouts.app')
@section('content')
<div class="container">
   @if (Session::has('message'))
    <script>
        $(document).ready(function(){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
            })
        });
    </script>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <span class="sr-only">Close</span>
       </button>
       <strong>{{ session('message') }}</strong>
   </div>

   @endif

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
                <td>
                    <!-- Edit button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edituser{{ $student->id }}">
                        <i class="fas fa-user-edit"></i>
                      Edit
                    </button>
                    <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="sumbit" class="btn btn-danger">
                        <i class="fas fa-eraser"></i>Delete
                        </button>
                    </form>
                </td>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="edituser{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        <div class="form-group">
                                        <label for="editStudentID{{ $student->id }}">Student ID</label>
                                        <input type="text" name="stud_id"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ $student->stud_id }}">
                                        @error('stud_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="editFirstName{{ $student->id }}">First Name</label>
                                            <input type="text" name="FirstName" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $student->students_name->FirstName }}">
                                            @error('FirstName')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="editMiddleName{{ $student->id }}">Middle Name</label>
                                            <input type="text" name="MiddleName"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ $student->students_name->MiddleName }}">
                                            @error('MiddleName')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="editLastName{{ $student->id }}">Last Name</label>
                                            <input type="text" name="LastName" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $student->students_name->LastName }}">
                                            @error('LastName')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="editAge{{ $student->id }}">Age</label>
                                            <input type="text" name="age"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ $student->age }}">
                                            @error('age')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="editGradeLevel{{ $student->id }}">Grade Level</label>
                                            <input type="text" name="grade_level" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $student->grade_level }}">
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
                @empty
                <td>No students available</td>

            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Button trigger modal -->


<!-- Add Modal -->
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
                    <input type="text" name="stud_id"  class="form-control" placeholder="" aria-describedby="helpId">
                    @error('stud_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" name="FirstName"  class="form-control" placeholder="" aria-describedby="helpId">
                        @error('FirstName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="MiddleName">Middle Name</label>
                        <input type="text" name="MiddleName" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('MiddleName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" name="LastName" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('LastName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Age">Age</label>
                        <input type="text" name="age" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('age')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="GradeLevel">Grade Level</label>
                        <input type="text" name="grade_level" class="form-control" placeholder="" aria-describedby="helpId">
                        @error('grade_level')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
