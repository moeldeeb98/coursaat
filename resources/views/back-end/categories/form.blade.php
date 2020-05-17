
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

    <div class="col-md-6">
        @php $input = 'meta_keywords' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row) ? $row->{$input} : '' }}">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        @php $input = 'meta_desc' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                {{ isset($row) ? $row->{$input} : '' }}
            </textarea>

            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>

</div>


