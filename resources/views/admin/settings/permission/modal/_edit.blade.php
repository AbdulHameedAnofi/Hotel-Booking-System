  <!--Create modal -->
  <div class="col-lg-4 col-md-6">
    <div class="mt-3">
      <!-- Modal -->
      <form 
        action="{{ route('permission.update',$permission->id) }}" 
        method="post" 
        class="needs-validation" 
        role="form"
        novalidate
      >
        @csrf
        @method('patch')
        <div class="modal fade" id="myDynamicEditModal" tabindex="-1" style="display: none;" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="text-center mb-4">
                    <h3>{{ trans('sentence.edit')}} {{ trans('sentence.permission')}}</h3>
                    <p>{{ trans('sentence.edit_permission_settings')}}</p>
                </div>
                <div class="alert alert-warning" role="alert">
                    <h6 class="alert-heading fw-bold mb-2">{{ trans('sentence.warning')}}</h6>
                    <p class="mb-0">{{ trans('sentence.by_edit_permission_name')}}</p>
                </div>
               @includeIf('admin.settings.permission.modal._input')
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--End Create modal -->