@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Session</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2">21,459</h4>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <p class="mb-0">Total Users</p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-user bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Paid Users</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2">4,567</h4>
                                    <small class="text-success">(+18%)</small>
                                </div>
                                <p class="mb-0">Last week analytics </p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bx bx-user-check bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Active Users</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2">19,860</h4>
                                    <small class="text-danger">(-14%)</small>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-group bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Pending Users</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2">237</h4>
                                    <small class="text-success">(+42%)</small>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="bx bx-user-voice bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                    <div class="col-md-4 ">
                        <select id="UserRole" class="form-select text-capitalize">
                            <option value=""> Select Role </option>
                            <option value="Admin">Admin</option>
                            <option value="Author">Author</option>
                            <option value="Editor">Editor</option>
                            <option value="Maintainer">Maintainer</option>
                            <option value="Subscriber">Subscriber</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select id="FilterTransaction" class="form-select text-capitalize">
                            <option value=""> Select Status </option>
                            <option value="Pending" class="text-capitalize">Pending</option>
                            <option value="Active" class="text-capitalize">Active</option>
                            <option value="Inactive" class="text-capitalize">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        {{-- button filter --}}
                        <button type="button" class="btn btn-primary mx-2" id="filterButton"><span><i class="bx bx-filter me-0 me-sm-1"></i><span
                            class="d-none d-sm-inline-block">Filter</span></span></button>
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#backDropModal"><span><i class="bx bx-plus me-0 me-sm-1"></i><span
                                    class="d-none d-sm-inline-block">Add New User</span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top dataTable no-footer dtr-column collapsed"
                    id="DataTables_Table_0">
                    <thead>
                        <tr>
                            <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px;"
                                aria-label=""></th>
                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" style="width: 229px;"
                                aria-label="User: activate to sort column ascending" aria-sort="descending">User</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 107px;"
                                aria-label="Role: activate to sort column ascending">Role</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 132px;"
                                aria-label="Billing: activate to sort column ascending">Billing</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 65px;"
                                aria-label="Status: activate to sort column ascending">Status</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                style="width: 88px;" aria-label="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <td class="control" tabindex="0" style=""></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/2.png"
                                                alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column"><a href="app-user-view-account.html"
                                            class="text-body text-truncate"><span class="fw-medium">Zsazsa
                                                McCleverty</span></a><small
                                            class="text-muted">zmcclevertye@soundcloud.com</small></div>
                                </div>
                            </td>
                            <td><span class="text-truncate d-flex align-items-center"><span
                                        class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i
                                            class="bx bx-pie-chart-alt bx-xs"></i></span>Maintainer</span></td>
                            <td><span class="fw-medium">Enterprise</span></td>
                            <td><span class="badge bg-label-success">Active</span></td>
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <button class="btn btn-sm btn-icon edit-record" data-bs-toggle="modal" data-bs-target="#editUserModal" data-id="1" data-name="Zsazsa McCleverty" data-email="zmcclevertye@soundcloud.com" data-role="Maintainer" data-billing="Enterprise" data-status="Active"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-icon delete-record" data-id="1"><i class="bx bx-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="even">
                            <td class="control" tabindex="0" style=""></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/7.png"
                                                alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column"><a href="app-user-view-account.html"
                                            class="text-body text-truncate"><span class="fw-medium">Yoko
                                                Pottie</span></a><small class="text-muted">ypottiec@privacy.gov.au</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-truncate d-flex align-items-center"><span
                                        class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i
                                            class="bx bx-user bx-xs"></i></span>Subscriber</span></td>
                            <td><span class="fw-medium">Basic</span></td>
                            <td class=""><span class="badge bg-label-secondary">Inactive</span></td>
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <button class="btn btn-sm btn-icon edit-record" data-bs-toggle="modal" data-bs-target="#editUserModal" data-id="2" data-name="Yoko Pottie" data-email="ypottiec@privacy.gov.au" data-role="Subscriber" data-billing="Basic" data-status="Inactive"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-icon delete-record" data-id="2"><i class="bx bx-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal Backdrop -->
        <div class="col-lg-4 col-md-3">
            <small class="text-light fw-medium">Backdrop</small>
            <div class="mt-3">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Add New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <input type="text" id="Name" class="form-control" placeholder="Enter Name" />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" id="Email" class="form-control" placeholder="xxxx@xxx.xx" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="Role" class="form-label">Role</label>
                                        <input type="text" id="Role" class="form-control" placeholder="Role" />
                                    </div>
                                </div>
                                <div class="row g-2 mt-3">
                                    <div class="col mb-0">
                                        <label for="Billing" class="form-label">Billing</label>
                                        <input type="text" id="Billing" class="form-control" placeholder="Billing" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="Status" class="form-label">Status</label>
                                        <select id="Status" class="form-select">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--  Edit User Modal -->
        <div class="modal fade" id="editUserModal"  data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalTitle">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="editName" class="form-label">Name</label>
                                <input type="text" id="editName" class="form-control" placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" id="editEmail" class="form-control" placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-0">
                                <label for="editRole" class="form-label">Role</label>
                                <input type="text" id="editRole" class="form-control" placeholder="Role" />
                            </div>
                        </div>
                        <div class="row g-2 mt-3">
                            <div class="col mb-0">
                                <label for="editBilling" class="form-label">Billing</label>
                                <input type="text" id="editBilling" class="form-control" placeholder="Billing" />
                            </div>
                            <div class="col mb-0">
                                <label for="editStatus" class="form-label">Status</label>
                                <select id="editStatus" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('.datatables-users').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'td.control'
                    }
                },
                columnDefs: [{
                    className: 'control',
                    orderable: false,
                    targets: 0
                }],
                pagingType: "full_numbers",
                language: {
                    search: "",
                    searchPlaceholder: "Search..."
                }
            });

            $('.edit-record').on('click', function() {
                let userId = $(this).data('id');
                let userName = $(this).data('name');
                let userEmail = $(this).data('email');
                let userRole = $(this).data('role');
                let userBilling = $(this).data('billing');
                let userStatus = $(this).data('status');

                $('#editName').val(userName);
                $('#editEmail').val(userEmail);
                $('#editRole').val(userRole);
                $('#editBilling').val(userBilling);
                $('#editStatus').val(userStatus);
            });

            $('.delete-record').on('click', function() {
                let userId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        // Call delete API or function here
                    }
                })
            });
        });
    </script>
@endpush
