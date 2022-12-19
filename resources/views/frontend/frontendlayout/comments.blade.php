<div class="mb-5">
    <div class="card">
        <div class="card-body">
            <!-- Comment form-->
            @include('Admin.section.errors')
            @auth

                <form class="mb-4" method="post" action="{{route('comment.send')}}">
                    <textarea class="form-control" name="comment" rows="3" placeholder="{{__('messages.Join the discussion and leave a comment!')}}"></textarea>
                    @csrf
                    <input type="hidden" name="parent_id" value="0">

                    <input type="hidden"  name="commentable_id" value="{{$subject->id}}">
                    <input type="hidden"  name="commentable_type" value="{{ get_class($subject) }}">
                    <button class="btn btn-primary mt-3">
                        {{__('messages.Send Comment')}}
                    </button>
                </form>
            @else
                <div class="alert alert-danger" role="alert">@lang('messages.commentnotlogin') </div>
        @endauth



        <!-- Comment with nested comments-->

            <!-- Single comment-->
           @foreach($comments as $comment)
            <div class="d-flex border-bottom pb-4 mb-4">
                    <!-- Parent comment-->

                        <img class="rounded-circle avatar-lg" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />

                    <div class="ms-3">
                        <div class="fw-bold">{{ $comment->user->name }}
                            @auth
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#sendCommentModal" data-name="{{$comment->user->name}}"
                                    data-parent="{{ $comment->id }}">
                                response
                            </button>
                            @endauth
                        </div>

                    {!! $comment->comment !!}
                        @if(count($comment->comments)>0)
                            @foreach($comment->comments as $comment_child)
                                <!-- Child comment 1-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">{{$comment_child->user->name}}</div>
                                            {!! $comment_child->comment !!}
                                        </div>
                                    </div>
                            @endforeach


                            @endif

                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>




<!-- Modal -->



<div class="modal fade" id="sendCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.New message')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/comment">
                    @csrf
                        <input type="hidden" id="parent_id" name="parent_id" value="0">
                        <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
                        <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">


                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">{{__('messages.Message')}}:</label>
                        <textarea class="form-control" id="message-text" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('messages.Send message')}}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('messages.Close')}}</button>

            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        var exampleModal = document.getElementById('sendCommentModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-name')
            var parent_id = button.getAttribute('data-parent')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var x = document.getElementById("parent_id");
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient;
            x.value=parent_id;

        })
    </script>
@endsection


