<div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row duplicable-tagify">
            <div class="col-md-6 mb-4 clone-tagify">
                <label for="TagifyBasic" class="form-label">Basic</label>
                <Tags>
                    <input id="TagifyBasic" class="form-control" name="TagifyBasic" value="Tag1, Tag2, Tag3">
                </Tags>
            </div>
        </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function () {
        var input = document.querySelector("#TagifyBasic");
        tagify = new Tagify(input)
    });
</script>
@endpush