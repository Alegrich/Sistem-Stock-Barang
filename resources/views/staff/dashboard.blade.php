
@extends('layouts.parent')

@section('title', 'Staff')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Supplier</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Item</h4>
                    </div>
                    <div class="card-body">
                        42
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-thumbtack"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Category</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Stock Status</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">Week</a>
                            <a href="#" class="btn">Month</a>
                            <a href="#" class="btn">Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="182" data-statistic="[640, 387, 530, 302, 430, 270, 700]"
                        data-labels='["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]'></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-success"><i class="fas fa-caret-down"></i></span>
                                23%</span>
                            <div class="detail-value">100</div>
                            <div class="detail-name">Today's Stock In</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-up"></i></span>
                                15%</span>
                            <div class="detail-value">50</div>
                            <div class="detail-name">Today's Stock Out</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-success"><i class="fas fa-caret-down"></i></span>
                                9%</span>
                            <div class="detail-value">12,821</div>
                            <div class="detail-name">This Month's Stock In</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-up"></i></span>
                                19%</span>
                            <div class="detail-value">92,142</div>
                            <div class="detail-name">This Month's Stock Out</div>

@extends('layouts.app')
@section('title', 'Staff')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Jumlah Items</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2">2s1,459</h4>
                                </div>
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
        </div>

    </div>
@endsection
        <!-- Users List Table -->
        <div class="card">
            <canvas id="myChart"></canvas>
        </div>
        <!-- Modal Backdrop -->
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>

@endpush
