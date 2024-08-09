<div class="rounded-lg p-4 flex flex-col gap-4" data-theme="light">
    <div class="flex flex-col">
        <input wire:model="title" class="input input-ghost in" type="text" placeholder="Enter title">
        @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col">
        <div id="editor"></div>
        @error('content') <span>{{ $message }}</span> @enderror
    </div>

    <button id="save_button" class="btn">Save Blog</button>

    @script
    <script>

        const textArea = document.querySelector('#content');
        const saveButton = document.querySelector('#save_button');

        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }, { 'header': 3 }],  // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

        //when the livewire component is mounted
        document.addEventListener('livewire:load', function () {
            quill.root.innerHTML = @this.content;
        });

        saveButton.addEventListener('click', () => {
            @this.
            set('content', quill.root.innerHTML);
            @this.
            saveBlog();
        });

    </script>
    @endscript
</div>
