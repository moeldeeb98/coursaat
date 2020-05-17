
<div class="row">
    <div class="col-md-6">
        @php $input = 'name' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row) ? $row->{$input} : '' }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>


