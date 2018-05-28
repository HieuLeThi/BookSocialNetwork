<div class="modal" id="add-category">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{{ __('Add category') }}</h4>
        </div>
        <form method="POST" action="{{ route('addCategories') }}" class="inline">
            {{ csrf_field() }}
            <div class="modal-body">
                <p><strong>{{ __('Category Title') }}:</strong></p>
                <input type="text" class="form-control" name="title" id="title" placeholder="{{ __('Category Title') }}" autofocus>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-flat btn-primary">&nbsp;&nbsp;{{ __('Add') }}&nbsp;&nbsp;</button>
                <button type="button" class="btn btn-sm btn-flat btn-default" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form> 
    </div>
  </div>
</div>