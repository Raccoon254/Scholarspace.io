<div class="p-4 flex gap-4">
    <div class="w-1/2 flex flex-col">
        <div class="flex gap-[1px] mb-2">
            <button id="addHeading1" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                H1
            </button>
            <button id="addHeading2" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                H2
            </button>
            <button id="addHeading3" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                H3
            </button>
            <button id="addParagraph" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                <i class="fas fa-paragraph"></i> P
            </button>
            <button id="addBold" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                <i class="fas fa-bold"></i>
            </button>
            <button id="addList" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                <i class="fas fa-list"></i>
            </button>
            <button id="addLink" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                <i class="fas fa-link"></i>
            </button>
            <button id="addImage" class="btn rounded-none m-0 btn-sm bg-blue-200 border-none btn-ghost text-black">
                <i class="fas fa-image"></i>
            </button>
        </div>
        <textarea
            id="content"
            wire:model="content"
            type="text" class="border w-full border-gray-300 p-2"
            rows="10"></textarea>
    </div>

    <!-- Preview -->
    <div>
        <h3>Preview:</h3>
        {{ $content }}
        <br>
        {{ $markdownContent }}
    </div>
</div>

<script>
    document.getElementById('addHeading1').addEventListener('click', function() {
        addToContent("# H1 ");
    });
    document.getElementById('addHeading2').addEventListener('click', function() {
        addToContent("## H2 ");
    });
    document.getElementById('addHeading3').addEventListener('click', function() {
        addToContent("### H3 ");
    });
    document.getElementById('addParagraph').addEventListener('click', function() {
        addToContent("\n\n");
    });
    document.getElementById('addBold').addEventListener('click', function() {
        addToContent(" **bold text** ");
    });
    document.getElementById('addList').addEventListener('click', function() {
        addToContent("\n- list item");
    });
    document.getElementById('addLink').addEventListener('click', function() {
        addToContent(" [link text](url) ");
    });
    document.getElementById('addImage').addEventListener('click', function() {
        addToContent(" ![alt text](image_url) ");
    });

    function addToContent(text) {
        var contentElement = document.getElementById('content');
        contentElement.value += text;
        contentElement.dispatchEvent(new Event('input')); // To trigger Livewire update
    }
</script>
