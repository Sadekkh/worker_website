<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('admin/lib/owlcarousel/asset/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="<?php echo e(route('request.create')); ?>">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>العاملات الكادحات</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">

                    </div>
                    <div class="ms-3">

                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?php echo e(route('adminpannel.index')); ?>" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="<?php echo e(route('adminpannel.index1')); ?>" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Users</a>
                    <a href="<?php echo e(route('adminpannel.index2')); ?>" class="nav-item nav-link"><i
                            class="fa fa-keyboard me-2"></i>Jobs</a>
                    <a href="<?php echo e(route('adminpannel.index3')); ?>" class="nav-item nav-link"><i
                            class="fa fa-table me-2"></i>Requests</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo e(asset('admin/img/user.jpg')); ?>" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                            <a href="#"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item">Log Out</a>


                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>


            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Users list</h6>

                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table text-start align-middle table-bordered table-hover mb-0"
                            style="width:100%" dir="rtl">
                            <thead>
                                <tr>
                                    <th> الإسم واللقب</th>
                                    <th> العمل</th>
                                    <th> تاريخ البداية</th>
                                    <th> تاريخ النهاية</th>
                                    <th> طريقة الدفع</th>
                                    <th> المبلغ</th>

                                    <th>الحالة</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($dat->name); ?></td>
                                        <td><?php echo e($dat->title); ?></td>
                                        <td><?php echo e($dat->date_start); ?></td>
                                        <td><?php echo e($dat->date_end); ?></td>
                                        <td><?php echo e($dat->payement_type); ?></td>
                                        <td><?php echo e($dat->budget); ?></td>
                                        <td>
                                            <?php if($dat->accept == 0): ?>
                                                <button type="button" class="btn btn-warning">في الإنتظار</button>
                                            <?php elseif($dat->accept == 1): ?>
                                                <button type="button" class="btn btn-success">مقبول</button>
                                            <?php elseif($dat->accept == 2): ?>
                                                <button type="button" class="btn btn-secondary">ملغى</button>
                                            <?php endif; ?>
                                        </td>


                                        <td> <a href="<?php echo e(route('requests.destroys', $dat->id)); ?>"
                                                class="btn btn-sm btn-primary">delete</a>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> الإسم واللقب</th>
                                    <th> العمل</th>
                                    <th> تاريخ البداية</th>
                                    <th> تاريخ النهاية</th>
                                    <th> طريقة الدفع</th>
                                    <th> المبلغ</th>

                                    <th>الحالة</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Sales End -->


            <!-- Widgets End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('/admin/lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/admin/lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/admin/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/admin/lib/tempusdominus/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/admin/lib/tempusdominus/js/moment-timezone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            // DataTable
            var table = $('#example').DataTable({
                responsive: true,

                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        });
    </script>


    < /body>

        < /html>
<?php /**PATH C:\laragon\www\work1\resources\views/admins/requests.blade.php ENDPATH**/ ?>