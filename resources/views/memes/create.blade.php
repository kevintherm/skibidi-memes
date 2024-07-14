<x-main-layout>


    <x-slot name="head">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/lib/css/emoji.css" rel="stylesheet">
        <style>
            #dragandrophandler {
                border: 2px dotted #f59e0b;
                width: 100%;
                color: #f4c573;
                text-align: center;
                vertical-align: middle;
                padding: 3rem;
                margin-bottom: 10px;
                font-size: 2rem;
            }

            #dragandrophandler:hover {
                background: #f4c57322;
                cursor: pointer;
            }

            #dragandrophandler.is-dragover {
                background: #f4c57322;
            }
        </style>
    </x-slot>

    <x-slot name="foot">
        <script>
            $(document).ready(function() {

                $('label').on('drag dragstart dragend dragover dragenter dragleave drop', function(event) {
                        event.preventDefault();
                        event.stopPropagation();
                    })
                    .on('dragover dragenter', function() {
                        $(this).addClass('is-dragover');
                    })
                    .on('dragleave dragend drop', function() {
                        $(this).removeClass('is-dragover');
                    })
                    .on('drop', function(event) {

                        $('input[type=file]').prop('files', event.originalEvent.dataTransfer.files);
                        $('input[type=file]').trigger('change');
                    });

                $('input[type=file]').on('change', function(event) {

                    $('#result span').text(event.target.files[0].name);

                });

            });
        </script>
        <script src="/lib/js/config.min.js"></script>
        <script src="/lib/js/util.min.js"></script>
        <script src="/lib/js/jquery.emojiarea.min.js"></script>
        <script src="/lib/js/emoji-picker.min.js"></script>
        <script>
            $(function() {
                // Initializes and creates emoji set from sprite sheet
                window.emojiPicker = new EmojiPicker({
                    emojiable_selector: '[data-emojiable=true]',
                    assetsPath: '/lib/img/',
                    popupButtonClasses: 'fa fa-smile-o' // far fa-smile if you're using FontAwesome 5
                });
                // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
                // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
                // It can be called as many times as necessary; previously converted input fields will not be converted again
                window.emojiPicker.discover();
            });
        </script>
    </x-slot>

    <div class="container">
        <p>
            Buat dan upload meme skibidi mu, agar menjadi sigma skibidi.
        </p>
        <x-border></x-border>

        <form action="{{ route('memes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label id="dragandrophandler" for="img">
                    Klik atau Drag file kesini
                </label>
                <input type="file" name="img" id="img" accept="image/*" hidden />
                <div id="result">
                    File terpilih: <span></span>
                </div>
                @error('img')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 emoji-picker-container">
                <label for="desc">Caption</label>
                <textarea name="desc" id="desc" rows="2" class="form-control"
                    placeholder="Caption menarik seperti alpha male" data-emojiable="true"></textarea>
                @error('desc')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-outline-warning">
                    Post
                </button>
            </div>

        </form>

    </div>

</x-main-layout>
