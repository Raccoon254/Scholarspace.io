<div class="p-4 flex gap-4">
    <div class="w-1/2 flex flex-col">
        <div class="flex gap-[1px] mb-2">
            <button id="addHeading1" class="control-btn">
                H1
            </button>
            <button id="addHeading2" class="control-btn">
                H2
            </button>
            <button id="addHeading3" class="control-btn">
                H3
            </button>
            <button id="addParagraph" class="control-btn">
                <i class="fas fa-paragraph"></i> P
            </button>
            <button id="addBold" class="control-btn">
                <i class="fas fa-bold"></i>
            </button>
            <button id="addList" class="control-btn">
                <i class="fas fa-list"></i>
            </button>
            <button id="addLink" class="control-btn">
                <i class="fas fa-link"></i>
            </button>
            <button id="addImage" class="control-btn">
                <i class="fas fa-image"></i>
            </button>
            <div class="hidden">
                <input type="file" accept="image/*" id="image" wire:model="image">
            </div>
        </div>
        <textarea
            id="content"
            wire:model.live="content"
            type="text" class="border w-full border-gray-300 p-2"
            rows="10"></textarea>
    </div>

    <!-- Preview -->
    <div class="w-1/2">
        <h3>Preview:</h3>
        <div id="preview" class="markdown-content hidden text-black">
            {{ $markdownContent }}
        </div>
        {{--        AS inner html
        --}}
        <div id="render" class="markdown-content-render text-black" wire:ignore>
        </div>
    </div>
</div>

<script>
    document.getElementById('addHeading1').addEventListener('click', function () {
        addToContent("\n# H1 ");
    });
    document.getElementById('addHeading2').addEventListener('click', function () {
        addToContent("\n## H2 ");
    });
    document.getElementById('addHeading3').addEventListener('click', function () {
        addToContent("\n### H3 ");
    });
    document.getElementById('addParagraph').addEventListener('click', function () {
        addToContent("\n");
    });
    document.getElementById('addBold').addEventListener('click', function () {
        addToContent("\n**bold text** ");
    });
    document.getElementById('addList').addEventListener('click', function () {
        addToContent("\n- list item");
    });
    document.getElementById('addLink').addEventListener('click', function () {
        addToContent("\n[link text](url) ");
    });
    document.getElementById('addImage').addEventListener('click', function () {
        document.getElementById('image').click();
        setTimeout(() => {
                addToContent("\n![alt text](image_url) ");
            }, 100)
    });

    function addToContent(text) {
        let contentElement = document.getElementById('content');

        //if we have nothing remove the new line
        if (contentElement.value === '') {
            text = text.trim();
        }

        //if we have a previous list and we are adding a new item
        if (text.includes('-') && contentElement.value.endsWith('-')) {
            text = text.trim();
        }

        contentElement.value += text;
        contentElement.dispatchEvent(new Event('input')); // To trigger Livewire update
    }

    // on content change
    document.getElementById('content').addEventListener('input', function () {
        setTimeout(
            function () {
                let content = document.getElementById('preview').innerText
                let render = document.getElementById('render');
                render.innerHTML = content;
            }, 20
        )
    });
</script>
