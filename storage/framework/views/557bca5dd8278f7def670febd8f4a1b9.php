
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>العمل</th>
                <th>إسم السائق</th>
                <th>مكانه</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($dat->title); ?></td>
                    <td><?php echo e($dat->name); ?></td>
                    <td><?php echo e($dat->location); ?></td>
                    <td><?php echo e($dat->payement_type); ?></td>
                    <td><?php echo e($dat->budget); ?></td>

                    <td> <a href="javascript:void(0)" id="show-user" data-url="<?php echo e(route('transport.show', $dat->id)); ?>"
                            class="btn btn-info">معطيات حول العامل</a>
                        <?php if($dat->accept == 0): ?>
                            <form method="post" action="<?php echo e(route('transport.accept', [$dat->job, $dat->jobid])); ?>">
                                <?php echo csrf_field(); ?>

                                <button class="btn btn-success" type="submit">قبول</button>
                            </form>
                        <?php elseif($dat->accept == 1): ?>
                            <button class="btn btn-success">تم القبول </button>
                        <?php elseif($dat->accept == 2): ?>
                            <button class="btn btn-danger" type="submit">ملغى</button>
                        <?php endif; ?>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>العمل</th>
                <th>إسم السائق</th>
                <th>مكانه</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">معطيات حول العامل</h5>

                </div>

                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>الإسم واللقب</td>
                            <td id="user-id"></td>
                            </td>
                        </tr>
                        <tr>
                            <td>رقم الهاتف</td>
                            <td id="user-name"></td>
                        </tr>
                        <tr>
                            <td>المنطقة</td>
                            <td id="user-email"></td>
                        </tr>
                        <tr>
                            <td>تقييم</td>
                            <td id="rev"></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
        $(document).ready(function() {
            $('body').on('click', '#show-user', function() {

                var userURL = $(this).data('url');

                $.ajax({
                    url: userURL,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#userShowModal').modal('show');
                        $('#user-id').text(data[0].name);
                        $('#user-name').text(data[0].mnumber);
                        $('#user-email').text(data[0].location);
                        if (data[0].review) {
                            $('#rev').text(data[0].review);
                        } else {
                            $('#rev').text("لا يوجد تقييم");
                        }
                    }
                });

            });

        });
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');
                var data = JSON.parse($(this).val());
                $('#job_id').val(data['id']);
                $('#emp_id').val(data['user_id']);
                console.log(data);


            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\work1\resources\views/transport/list.blade.php ENDPATH**/ ?>