
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

    <div class="col-md-6">
        @php $input = 'image' @endphp
        <div>
            <label >Video Image</label>
            <input type="file" name="{{ $input }}" class="@error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        @php $input = 'youtube' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube url</label>
            <input type="url" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row) ? $row->{$input} : '' }}">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        @php $input = 'published' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{ (isset($row) && $row->{$input} == 1) ? 'selected' : '' }}>published</option>
                <option value="0" {{ (isset($row) && $row->{$input} == 0) ? 'selected' : '' }}>hidden</option>
            </select>
            <input type="url" >
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        @php $input = 'cat_id' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (isset($row) && $row->{$input} == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <input type="url" >
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        @php $input = 'desc' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Description</label>
            <textarea cols="30" rows="5" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                {{ isset($row) ? $row->{$input} : '' }}
            </textarea>
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
            <textarea name="{{ $input }}" cols="30" rows="2" class="form-control @error($input) is-invalid @enderror">
                {{ isset($row) ? $row->{$input} : '' }}
            </textarea>

            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        @php $input = 'skills[]' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ ( in_array($skill->id, $selectedSkills)) ? 'selected' : '' }}>{{ $skill->name }}</option>
                @endforeach
            </select>
            <input type="url" >
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        @php $input = 'tags[]' @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ ( in_array($tag->id, $selectedTags)) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            <input type="url" >
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>


