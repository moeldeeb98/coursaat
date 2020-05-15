{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : '' }}">
        </div>
    </div>
    <div class="col-md-6" >
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
    </div>
</div>


