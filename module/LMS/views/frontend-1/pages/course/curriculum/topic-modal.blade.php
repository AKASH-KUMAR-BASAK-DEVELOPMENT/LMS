<!-- Popup modal for add topic START -->
<div class="modal fade" id="addTopic" tabindex="-1" aria-labelledby="addTopicLabel" aria-hidden="true"
     style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="addTopicLabel">Add topic</h5>
                <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i></button>
            </div>
            <div class="modal-body">
                <form class="row text-start g-3">
                    <!-- Topic name -->
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" id="topicName" placeholder="Enter topic name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success my-0" onclick="addTopic()">Add topic</button>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal for add topic END -->
