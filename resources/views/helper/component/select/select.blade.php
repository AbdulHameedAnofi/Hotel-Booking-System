<div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row duplicable-select">
          <!-- Basic -->
            <div class="col-md-5 mb-4 clone-select">
                <label class="form-label">Basic</label>
                <select class="select2 form-select form-select-lg select2-hidden-accessible">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                    <option value="CA">California</option>
                    <option value="NV">Nevada</option>
                    <option value="OR">Oregon</option>
                    <option value="VA">Virginia</option>
                    <option value="WV">West Virginia</option>
                </select>
            </div>

            <!-- Multiple -->
            <div class="col-md-6 mb-4 clone-select2">
                <label class="form-label">Multiple</label>
                <select class="select2 form-select select2-hidden-accessible" multiple="">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                </select>
            </div>
            <div class="col-md-1" style="margin-top:27px;">
                <span class="btn btn-danger btn-xs pull-right btn-del-select">Remove</span>
            </div>
        </div>
        <div class="col-md-2" style="margin-left: 5px;">
            <span class="btn btn-success btn-xs add-select">Add More</span>
        </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function () {
        $('.btn-del-select').hide();
        $(document).on('click','.add-select', function(){
            $(this).parent().parent().find(".clone-select select").select2("destroy");
            $(this).parent().parent().find(".clone-select2 select").select2("destroy");
            $(this).parent().parent().find(".duplicable-select").clone().insertBefore($(this).parent()).removeClass("duplicable-select").find(":not(select).form-control").val("");
            $(this).parent().parent().find(".clone-select select").select2();
            $(this).parent().parent().find(".clone-select2 select").select2();
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove(); 
            });
        });
    });
</script>
@endpush