<div class="modal fade" id="deleteCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <button type="button" class="close align-self-end" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h5 class="modal-title text-danger" id="exampleModalLabel">تحـــذير</h5>
            </div>
            <div class="modal-body text-center text-danger font-weight-bold">
                هل انت متأكد من رغبتك في اجراء عملة الحذف؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">كلا</button>
                <form action="" method="post" id="formedeletecategoy">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mr-2">نعم</button>
                </form>
            </div>
        </div>
    </div>
</div>
