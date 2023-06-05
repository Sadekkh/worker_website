
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.css">

    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

        * {
            font-family: "Lato";
        }

        /*decoration*/
        h1 {
            margin: 20px 50px 0;
            background: #eff0f2;
            width: 275px;
            font-size: 1.5em;
            text-align: center;
            border-radius: 5px 5px 0 0;
            padding: 30px 0;
            color: #34495e;
        }

        h1:before {
            color: #e74c3c;
            content: "★";
            display: block;
            font-size: 2em;
            padding: 20px 0;
        }

        .product-review-stars {
            margin: 0 50px;
            background: #2c3e50;
            padding: 20px 50px 20px 20px;
        }

        .product-review-stars label {
            text-shadow: 0px 0px 10px black;
        }

        /*end decoration*/

        .visuallyhidden {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px);
            clip: rect(1px, 1px, 1px, 1px);
        }

        .product-review-stars label:after {
            content: "★";
            color: inherit;
            -webkit-transform: scale(4);
            position: absolute;
            z-index: 4;
            left: 0px;
            transition: all 0.4s;
            opacity: 0;
            color: inherit;
            visibility: hidden;
        }

        .product-review-stars input:checked+label:after {
            visibility: visible;
            -webkit-transform: scale(1);
            opacity: 1;
        }

        .product-review-stars {
            unicode-bidi: bidi-override;
            direction: rtl;
            width: 205px;
        }

        .product-review-stars label {
            font-family: "icomoon";
            font-size: 2em;
            position: relative;
            cursor: pointer;
            color: #dfe3e4;
        }

        .product-review-stars input:checked~label:before {
            opacity: 1;
        }

        .product-review-stars:hover input~label:before {
            opacity: 0;
        }

        .product-review-stars input+label:before {
            content: "\2605";
            position: absolute;
            right: 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out, color 0.3s ease-in-out;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            /* Chrome and Safari */
            -moz-backface-visibility: hidden;
            /* Firefox */
            -ms-backface-visibility: hidden;
            /* Internet Explorer */
        }

        .product-review-stars input+label:hover:before,
        .product-review-stars input+label:hover~label:before {
            opacity: 1;
        }

        .product-review-stars input+label:nth-of-type(1):after,
        .product-review-stars input+label:nth-of-type(1):before,
        .product-review-stars input+label:nth-of-type(1):hover:before,
        .product-review-stars input+label:nth-of-type(1):hover~label:before,
        .product-review-stars input:nth-of-type(1):checked~label:before {
            color: #2ecc71;
        }

        .product-review-stars input+label:nth-of-type(2):after,
        .product-review-stars input+label:nth-of-type(2):before,
        .product-review-stars input+label:nth-of-type(2):hover:before,
        .product-review-stars input+label:nth-of-type(2):hover~label:before,
        .product-review-stars input:nth-of-type(2):checked~label:before {
            color: #f1c40f;
        }

        .product-review-stars input+label:nth-of-type(3):after,
        .product-review-stars input+label:nth-of-type(3):before,
        .product-review-stars input+label:nth-of-type(3):hover:before,
        .product-review-stars input+label:nth-of-type(3):hover~label:before,
        .product-review-stars input:nth-of-type(3):checked~label:before {
            color: #f39c12;
        }

        .product-review-stars input+label:nth-of-type(4):after,
        .product-review-stars input+label:nth-of-type(4):before,
        .product-review-stars input+label:nth-of-type(4):hover:before,
        .product-review-stars input+label:nth-of-type(4):hover~label:before,
        .product-review-stars input:nth-of-type(4):checked~label:before {
            color: #e74c3c;
        }

        .product-review-stars input+label:nth-of-type(5):after,
        .product-review-stars input+label:nth-of-type(5):before,
        .product-review-stars label:nth-of-type(5):hover:before,
        .product-review-stars input:nth-of-type(5):checked~label:before {
            color: #d35400;
        }

        .product-review-stars label:nth-of-type(5):hover:before {
            color: #d35400 !important;
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
                <th>توقيت البداية</th>
                <th>توقيت النهاية</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>

                <th>الحالة</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($dat->title); ?></td>
                    <td><?php echo e($dat->date_start); ?></td>
                    <td><?php echo e($dat->date_end); ?></td>
                    <td><?php echo e($dat->time_start); ?></td>
                    <td><?php echo e($dat->time_end); ?></td>
                    <td><?php echo e($dat->payement_type); ?></td>
                    <td><?php echo e($dat->budget); ?></td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker_tra')): ?>
                        <td>
                            <?php if($dat->accept == 0): ?>
                                <button type="button" class="btn btn-warning">في الإنتظار</button>
                            <?php elseif($dat->accept == 1): ?>
                                <button type="button" class="btn btn-success">مقبول</button>
                                <a href="javascript:void(0)" id="show-details"
                                    data-url="<?php echo e(route('jobs.details')); ?>"data-href='{"id":<?php echo e($dat->job_id); ?>,"userid":<?php echo e($dat->user_id); ?>}''
                                    class="btn btn-info">التفاصيل</a>
                            <?php elseif($dat->accept == 2): ?>
                                <button type="button" class="btn btn-secondary">ملغى</button>
                            <?php endif; ?>
                            <?php if($dat->review == 0 && $dat->date_end < date('Y-m-d') && $dat->accept == 1): ?>
                                <a href="javascript:void(0)" id="reviews"
                                    data-url="<?php echo e(route('jobs.details')); ?>"data-href='{"id":<?php echo e($dat->job_id); ?>,"userid":<?php echo e($dat->emp_id); ?>,"idd":<?php echo e($dat->id); ?>}'
                                    class="btn btn-info">التقييم</a>
                            <?php endif; ?>


                        </td>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employer')): ?>
                        <td>
                            <?php if($dat->state == 0): ?>
                                <button type="button" class="btn btn-warning">مرحلة إختيار العملة</button>
                            <?php elseif($dat->state == 1 && $dat->date_end > date('Y-m-d')): ?>
                                <button type="button" class="btn btn-success">في الإنجاز</button>
                            <?php elseif($dat->date_end < date('Y-m-d')): ?>
                                <button type="button" class="btn btn-secondary">منتهي</button>
                            <?php endif; ?>
                            <a href="javascript:void(0)" id="show-details"
                                data-url="<?php echo e(route('jobs.details')); ?>"data-href='{"id":<?php echo e($dat->id); ?>,"userid":<?php echo e($dat->user_id); ?>}'
                                class="btn btn-info">التفاصيل</a>
                        </td>
                    <?php endif; ?>
                    <td></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>العمل</th>
                <th> بداية العمل</th>
                <th>نهاية العمل</th>
                <th>توقيت البداية</th>
                <th>توقيت النهاية</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th>الحالة</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">معطيات حول العمل</h5>

                </div>

                <div class="modal-body">
                    <table class="table">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker_tra')): ?>
                            <tr>
                                <td>إسم ولقب المشغل</td>
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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employer_wor')): ?>
                            <tr>
                                <td>إسم السائق</td>
                                <td id="trans_name"></td>
                            </tr>
                            <tr>
                                <td>رقم السائق</td>
                                <td id="trans_nm"></td>
                            </tr>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employer')): ?>
                                <tr>
                                    <td><a href="javascript:void(0)" id="reviewss" class="btn btn-info">التقييم</a></td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employer_tra')): ?>
                            <tr>
                                <table class="table" id="work">
                                    <tr>
                                        <td>العامل</td>
                                        <td>مكانه</td>
                                        <td>رقم هاتفه</td>

                                    </tr>
                                </table>
                            </tr>
                        <?php endif; ?>


                    </table>

                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">سجل الآن</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sendmessage" method="post" action="<?php echo e(route('review.store')); ?>">

                        <?php echo csrf_field(); ?>
                        <center>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <input type="number" id="job_id" hidden name="job_id" value="">
                            <input type="number" id="emp_id" hidden name="employer_id" value="">
                            <input type="number" id="id" name="id" hidden value="">
                            <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet'
                                type='text/css'>
                            <h1>التقييم</h1>

                            <div class="product-review-stars">
                                <input type="radio" id="star5" name="review" value="5"
                                    class="visuallyhidden" /><label for="star5" title="Rocks!">★</label>
                                <input type="radio" id="star4" name="review" value="4"
                                    class="visuallyhidden" /><label for="star4" title="Pretty good">★</label>
                                <input type="radio" id="star3" name="review" value="3"
                                    class="visuallyhidden" /><label for="star3" title="Meh">★</label>
                                <input type="radio" id="star2" name="review" value="2"
                                    class="visuallyhidden" /><label for="star2" title="Kinda bad">★</label>
                                <input type="radio" id="star1" name="review" value="1"
                                    class="visuallyhidden" /><label for="star1" title="Sucks big time">★</label>
                            </div>


                            <label for="comment">التعليق</label>
                            <textarea name="comment" id="" cols="30" rows="10"></textarea>







                            <div class="row">
                                <div class="col-md-4">
                                    <button id="formSubmit" type="submit"
                                        class="btn btn-primary btn-block">تسجيل</button>
                                </div>
                            </div>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>

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
            $('#reviews').on('click', function() {


                $('#editmodal').modal('show');
                var data = $(this).data('href');

                $('#job_id').val(data['id']);
                $('#emp_id').val(data['userid']);
                $('#worker_id').val(data['userid']);
                $('#id').val(data['idd']);


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
                    url: "<?php echo e(route('transport.details')); ?>",
                    type: 'post',
                    data: data,

                    success: function(data) {
                        const user = data.user[0]
                        const job = data.post[0]
                        const rev = data.rev[0]
                        const trans = data.trans[0]
                        const work = data.work
                        const rev1 = data.rev1
                        console.log(data);
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
                        $('#trans_name').text(trans.name);
                        $('#trans_nm').text(trans.mnumber);

                        if (rev.review) {
                            $('#review').text(rev.review);
                        } else {

                            $('#review').text("لا يوجد تقييم");
                        }

                        for (var i = 0; i < work.length; i += 1) {
                            $("#work").append(
                                "<tr>" +
                                "<td>" + work[i].name + "</td>" +
                                "<td>" + work[i].location + "</td>" +
                                "<td>" + work[i].mnumber +
                                "</td><td><button   data-href='{\"id\":" +
                                work[i].job_id + ",\"userid\":" + work[i].worker_id +
                                ",\"idd\":1}' class='btn btn-info update_user_button'>التقييم</button></td></tr>"
                            );


                        }




                        $(document).ready(function() {
                            $('#reviewss').on('click', function() {


                                $('#editmodal').modal('show');

                                $('#job_id').val(job.id);
                                $('#emp_id').val(job.user_id);
                                $('#id').val(0);


                            });
                        });
                        $(document).ready(function() {
                            $('.update_user_button').on('click', function() {


                                $('#editmodal').modal('show');
                                var datass = $(this).data('href');
                                console.log(datass);
                                $('#job_id').val(datass.id);
                                $('#emp_id').val(datass.userid);
                                $('#id').val(0);


                            });
                        });

                    }
                });

            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\work1\resources\views/requests/myjobs.blade.php ENDPATH**/ ?>