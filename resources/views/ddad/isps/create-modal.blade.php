<!--  create model -->
<form id="isp-create-modal-form show" action="{{ route('isps.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="isp-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel"


         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">Add new ISP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="st_level_up form-group">
                                <label for="name">ISP name*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="st_level_up form-group">
                                <label for="contact_person">Contact person*</label>
                                <input type="text" name="contact_person"
                                       class="form-control @error('contact_person') is-invalid @enderror" id="contact_person"
                                       value="{{ old('contact_person') }}" >
                                @error('contact_person')
                                    <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="st_level_up form-group">
                                <label for="mobile_number">Mobile nubmer*</label>
                                <input type="text" name="mobile_number"
                                       class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number"
                                       value="{{ old('contact_person') }}" >
                                @error('mobile_number')
                                    <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="st_level_up form-group">
                                <label for="package_name">Package name*</label>
                                <input type="text" name="package_name"
                                       class="form-control @error('package_name') is-invalid @enderror" id="package_name"
                                       value="{{ old('package_name') }}" >
                                @error('package_name')
                                <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="st_level_up form-group">
                                <label for="package_price">Package price*</label>
                                <input type="number" name="package_price" class="form-control @error('package_price') is-invalid @enderror"
                                       id="detector_label" value="{{ old('package_price') }}" >
                                @error('package_price')
                                <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save ISP</button>



                </div>
            </div>
        </div>
    </div>
</form>

@push('script')
<script>
var  error = false;
@error('package_price') error = true; @enderror
@error('package_name')  error = true; @enderror
@error('name') error = true; @enderror
@error('contact_person') error = true; @enderror
@error('mobile_number') error = true; @enderror
if(error) {
    $('#isp-create-modal').modal('show')
}
</script>
@endpush
