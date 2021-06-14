<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content pd-20">
      <div class="modal-header">
        <h2 class="modal-title text-center text-uppercase" id="exampleModalCenterTitle">Delete Data!!</h2>
        <a type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
          <span class="d-block fa-2x" aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body pd-20">
      Are you sure you want to delete? Delete it for forever!!
      </div>
      <div class="modal-footer pd-t-20 text-white">
        <a type="button" class="btn btn-secondary" href="#" data-dismiss="modal">Close</a>
        <a type="submit" class="btn btn-danger" href="?delId=<?= $result['id'];?>">Delete</a>
      </div>
    </div>
  </div>
</div>