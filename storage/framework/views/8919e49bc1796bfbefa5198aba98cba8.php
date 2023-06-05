
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.css">
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
                <th> بداية العمل</th>
                <th>نهاية العمل</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th>نوع العمل</th>
                <th>الأدوات اللازمة</th>
                <th>عدد العملة</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($dat->title); ?></td>
                    <td><?php echo e($dat->date_start); ?></td>
                    <td><?php echo e($dat->date_end); ?></td>
                    <td><?php echo e($dat->payement_type); ?></td>
                    <td><?php echo e($dat->budget); ?></td>
                    <td><?php echo e($dat->type); ?></td>
                    <td><?php echo e($dat->tools); ?></td>
                    <td><?php echo e($dat->worker_number); ?></td>
                    <td>
                        <a href="javascript:void(0)" id="show-details"
                            data-url="<?php echo e(route('jobs.details')); ?>"data-href='{"id":<?php echo e($dat->id); ?>,"userid":<?php echo e($dat->user_id); ?>}''
                            class="btn btn-info">معطيات حول
                            العمل</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker_tra')): ?>
                            <button data-href='{"id":<?php echo e($dat->id); ?>,"userid":<?php echo e($dat->user_id); ?>}' type="button"
                                class="btn btn-sm editbtn btn-primary" data-toggle="modal" data-target="">
                                سجل </button>
                        <?php endif; ?>


                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>العمل</th>
                <th> بداية العمل</th>
                <th>نهاية العمل</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th>نوع العمل</th>
                <th>الأدوات اللازمة</th>
                <th>عدد العملة</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">سجل الآن</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker')): ?>
                        <form id="sendmessage" method="post" action="<?php echo e(route('request.store')); ?>">
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transporter')): ?>
                            <form id="sendmessage" method="post" action="<?php echo e(route('transport.store')); ?>">
                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="name-label" for="name">بداية العمل</label>
                                        <input type="number" id="job_id" hidden name="job_id" value="">
                                        <input type="number" id="emp_id" hidden name="emp_id" value="">
                                        <input type="date" name="date_start" value="" id="date_start"
                                            placeholder=" " class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="number-label" for="number">نهاية العمل
                                        </label>
                                        <input type="date" value="" name="date_end" id="date_end"
                                            class="form-control" placeholder=""required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="name-label" for="">توقيت بداية العمل</label>

                                        <input type="time" name="time_start" value="" id="time_start"
                                            placeholder=" " class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="number-label" for="">توقيت نهاية العمل
                                        </label>
                                        <input type="time" value="" name="time_end" id="time_end"
                                            class="form-control" placeholder=""required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>طريقة الدفع </label>
                                        <select id="payement_type" name="payement_type" class="form-control" required>
                                            <option disabled selected value>إختر الطريقة </option>
                                            <option value="باليوم">باليوم</option>
                                            <option value="بالكمية">بالكمية</option>
                                            <option value="كامل العمل">كامل العمل</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="number-label" for="">الثمن المخصص
                                        </label>
                                        <input type="number" value="" name="budget" id="budget"
                                            class="form-control" placeholder=""required>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-4">
                                    <button id="formSubmit" type="submit"
                                        class="btn btn-primary btn-block">تسجيل</button>
                                </div>
                            </div>

                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">معطيات حول العمل</h5>

                </div>

                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>إسم ولقب الشمغل</td>
                            <td id="name"></td>

                        </tr>
                        <tr>
                            <td>تقييم المشغل</td>
                            <td id="review"></td>

                        </tr>

                        <tr>
                            <td>العمل</td>
                            <td id="title"></td>

                        </tr>
                        <tr>
                            <td>تاريخ البداية</td>
                            <td id="date_start1"></td>

                        </tr>
                        <tr>
                            <td>تاريخ النهاية</td>
                            <td id="date_end1"></td>

                        </tr>
                        <tr>
                            <td>توقيت البداية</td>
                            <td id="time_start1"></td>

                        </tr>
                        <tr>
                            <td>توقيت النهاية</td>
                            <td id="time_end1"></td>

                        </tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker')): ?>
                            <tr>
                                <td>طريقة الدفع</td>
                                <td id="payement_type1"></td>

                            </tr>
                            <tr>
                                <td>المبلغ</td>
                                <td id="budget1"></td>

                            </tr>
                            <tr>
                                <td>نوع العمل</td>
                                <td id="type1"></td>

                            </tr>
                            <tr>
                                <td>الأدوات المستعملة</td>
                                <td id="tools1"></td>

                            </tr>
                            <tr>
                                <td>المكان</td>
                                <td id="place"></td>

                            </tr>
                            <tr>
                                <td>العدد المطلوب</td>
                                <td id="worker_number"></td>

                            </tr>
                            <tr>
                                <td>العدد المتبقي</td>
                                <td id="worker_left"></td>

                            </tr>
                            <tr>
                                <td>التفاصيل</td>
                                <td id="description"></td>

                            </tr>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transporter')): ?>
                            <tr>
                                <table class="table" id="work">
                                    <tr>
                                        <td>العامل</td>
                                        <td>مكانه</td>

                                    </tr>
                                </table>
                            </tr>
                        <?php endif; ?>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder=" ' + title + '" />');
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


        $(document).ready(function() {
            $('body').on('click', '#show-details', function() {

                var userURL = $(this).data('url');
                var data = $(this).data('href');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('jobs.details')); ?>",
                    type: 'post',
                    data: data,

                    success: function(data) {
                        const user = data.user[0]
                        const job = data.post[0]
                        const rev = data.rev[0]
                        const work = data.work
                        $('#userShowModal').modal('show');
                        $('#name').text(user.name);

                        $('#budget1').text(job.budget);
                        $('#date_end1').append(job.date_end);
                        $('#date_start1').text(job.date_start);
                        $('#description').text(job.description);
                        $('#place').text(job.place);
                        $('#time_end1').text(job.time_end);
                        $('#time_start1').text(job.time_start);
                        $('#title').text(job.title);
                        $('#payement_type1').text(job.payement_type);
                        $('#type1').text(job.type);
                        $('#tools1').text(job.tools);
                        $('#worker_number').text(job.worker_number);
                        $('#worker_left').text(job.worker_left);
                        for (var i = 0; i < work.length; i += 1) {
                            $("#work").append("<tr><td>" + work[i].name + "</td><td>" +
                                work[i].location + "</td></tr>");
                        }
                        if (rev.review) {
                            $('#review').text(rev.review);
                        } else {

                            $('#review').text("لا يوجد تقييم");
                        }

                    }
                });

            });

        });

        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');
                var data = $(this).data('href');
                console.log(data)

                $('#job_id').val(data['id']);
                $('#emp_id').val(data['userid']);



            });
        });



        $('#sendmessage').submit(function(e) {
            e.preventDefault();

            var url = $(this).attr("action");
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert('تم التسجيل بنجاح');
                    location.reload();
                },
                error: function(response) {

                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\work1\resources\views/jobs/joblist.blade.php ENDPATH**/ ?>