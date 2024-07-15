<div class="comment mb-2" x-data="{
    replyInput: '',
    async reply() {
        $wire.replyTo(@json($comment['id']));

        username = await $wire.getReplyUsername();

        $refs.replyInput.value = '@' + username + ' ';
        $refs.replyInput.focus()
    }
}">
    <div class="d-flex gap-2">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPVFwiCwqjKjyL7tVfEMrswvIV_NgKDbRCdw&s"
            alt="User Profile" width="25" height="25" class="rounded-circle" />
        <div class="d-flex flex-column gap-1 justify-content-center">
            <div>
                <span class="fs-6 fw-semibold">{{ $comment['user']['name'] }}</span>
                <small class="fw-light text-secondary">
                    {{ \Carbon\Carbon::parse($comment['created_at'])->diffForHumans(null, true) }}
                </small>
            </div>
            <p class="text-wrap">
                {{ $comment['body'] }}
            </p>
            <div>
                <button class="btn m-0 p-0" x-on:click="reply">
                    <small class="text-secondary fw-semibold">
                        Reply
                    </small>
                </button>
            </div>
        </div>
    </div>
</div>
