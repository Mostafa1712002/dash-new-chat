<div>
    <div class="hstack gap-2 fs-15">
            <a class="btn btn-icon btn-sm btn-info-transparent rounded-pill"
                href="{{ route('midade.users.admin.users.edit', $row->id) }}" title="edit"><i class="ri-edit-line"></i></a>
            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill" title="trash"
                wire:click="$dispatch('delete',{element_id : {{ $row->id }}})"><i class="ri-delete-bin-line"></i></a>

    </div>
</div>

