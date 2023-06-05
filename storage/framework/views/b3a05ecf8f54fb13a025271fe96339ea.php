
<?php $__env->startSection('styles'); ?>
    <style>
        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(route('jobs.store')); ?>" dir="rtl">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label id="name-label" for="name">العمل </label>
                    <input type="text" name="title" value="" id="title" placeholder=" " class="form-control"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label id="name-label" for="name">المكان </label>
                    <input type="text" name="place" value="" id="title" placeholder=" " class="form-control"
                        required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label id="name-label" for="name">بداية العمل</label>
                    <input type="date" name="date_start" value="" id="date_start" placeholder=" "
                        class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label id="number-label" for="number">نهاية العمل
                    </label>
                    <input type="date" value="" name="date_end" id="date_end" class="form-control"
                        placeholder=""required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label id="name-label" for="">توقيت بداية العمل</label>

                    <input type="time" name="time_start" value="" id="time_start" placeholder=" "
                        class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label id="number-label" for="">توقيت نهاية العمل
                    </label>
                    <input type="time" value="" name="time_end" id="time_end" class="form-control"
                        placeholder=""required>
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
                    <input type="number" value="" name="budget" id="budget" class="form-control"
                        placeholder=""required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>نوع العمل</label>
                    <select id="type" name="type" class="form-control" required>
                        <option disabled selected value> إختر نوع العمل</option>
                        <option value="حفر">حفر</option>
                        <option value="جزر">جزر</option>


                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الأدوات اللازمة</label>
                    <select id="tools" name="tools" class="form-control" required>
                        <option disabled selected value>إختر الأدوات </option>
                        <option value="مجرف">مجرف</option>
                        <option value="بالة">بالة</option>


                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <label id="name-label" for="name">العدد المطلوب </label>
                <input type="number" name="worker_number" value="" id="title" placeholder=" "
                    class="form-control" required>
            </div>
        </div>
        <div>

            <label id="number-label" for="">التفاصيل </label>
            <textarea style="width: 100%" name="description" id="" cols="30" rows="10"></textarea>


        </div>




        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <button id="formSubmit" type="submit" class="btn btn-primary btn-block">تسجيل</button>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\work1\resources\views/jobs/jobpost.blade.php ENDPATH**/ ?>