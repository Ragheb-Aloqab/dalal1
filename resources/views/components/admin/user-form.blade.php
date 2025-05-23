
<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <!-- User Name -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="اسم المستخدم" name="name" />
    </div>

    <!-- User Email -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="البريد الإلكتروني" name="email" />
    </div>

    <!-- User Phone -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="رقم الهاتف" name="phone" />
    </div>

    <!-- User Avatar Image -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.file-upload-field label="الصورة الشخصية" name="avatar" />
    </div>



</div>
