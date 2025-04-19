<!DOCTYPE html>
<html>

<head>
    @include('admin.style')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.nav-tables')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Student List</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/index">Home</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong>Student Information : </strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No.#</th>
                                                <th>First</th>
                                                <th>Last</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>Time Created</th>
                                                <th>Number</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                            <tr>
                                                <th scope="row">{{ $student->id }}</th>
                                                <td>{{ $student->first_name }}</td>
                                                <td>{{ $student->last_name }}</td>
                                                <td>{{ $student->password }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->created_at }}</td>
                                                <td>{{ $student->number }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $student->id }}" data-first_name="{{ $student->first_name }}" data-last_name="{{ $student->last_name }}" data-password="{{ $student->password }}" data-email="{{ $student->email }}" data-number="{{ $student->number }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $student->id }}">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST" action="/tables/update">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" id="edit-id">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Student</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" id="edit-first-name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last_name" id="edit-last-name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="text" name="password" id="edit-password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email" id="edit-email" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Number</label>
                                                            <input type="text" name="number" id="edit-number" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST" action="/tables/delete">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="id" id="delete-id">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirm Deletion</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this student?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <div class="title"><strong>Deleted Student Information : </strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No.#</th>
                                                <th>First</th>
                                                <th>Last</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>Deleted At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($deletedStudents as $deletedStudent)
                                            <tr>
                                                <td>{{ $deletedStudent->id }}</td>
                                                <td>{{ $deletedStudent->first_name }}</td>
                                                <td>{{ $deletedStudent->last_name }}</td>
                                                <td>{{ $deletedStudent->password }}</td>
                                                <td>{{ $deletedStudent->email }}</td>
                                                <td>{{ $deletedStudent->number }}</td>
                                                <td>{{ $deletedStudent->deleted_at }}</td> <!-- Assuming you have a deleted_at field -->
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#restoreModal" data-id="{{ $deletedStudent->id }}">
                                                        Restore
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Restore Modal -->
                            <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="restoreModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="POST" action="/tables/restore">
                                        <!-- Ensure the action points to the correct route -->
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="restore-id">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Restoration</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to restore this student?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Yes, Restore</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('admin.footer')
        </div>
    </div>
    <script>
    // Fill edit modal fields
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        $('#edit-id').val(button.data('id'));
        $('#edit-first-name').val(button.data('first_name'));
        $('#edit-last-name').val(button.data('last_name'));
        $('#edit-password').val(button.data('password'));
        $('#edit-email').val(button.data('email'));
        $('#edit-number').val(button.data('number'));
    });

    // Set student ID in delete modal
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        $('#delete-id').val(button.data('id'));
    });

    // Set student ID in restore modal
    $('#restoreModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var studentId = button.data('id'); // Extract info from data-* attributes
        $('#restore-id').val(studentId); // Update the modal's input field with the student ID
    });

    </script>
</body>

</html>
