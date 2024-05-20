<div
    id="message_{{ $message->id }}"
    class="{{ $message->sender_id == Auth::id() ? 'text-right' : 'text-left' }} max-w-2/3 text-sm mx-auto message">
    @if($message->content)
        <div
            class="inline-block max-w-[400px] {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white sent-message ' : 'bg-gray-200 text-gray-800 received-message ' }} px-1 py-1/4">
            {{ $message->content }}
        </div>
    @endif
    <br>

    @if ($message->attachments->count() > 0)
        <div
            class="inline-block {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white sent-message-attachment ' : 'bg-gray-200 text-gray-800 received-message-attachment' }}">
            <div class="flex max-w-[392px] flex-wrap gap-1">
                @foreach($message->attachments as $attachment)
                    <div class="min-w-[128px]">
                        <div
                            onclick="viewAttachment('{{ $attachment->type }}', '{{ Storage::url($attachment->path) }}')"
                            class="bg-gray-200 rounded-xl ring-1 ring-blue-100 overflow-hidden relative">
                            @if (in_array($attachment->type, ['image/jpeg', 'image/png', 'image/gif']))
                                <img
                                    src="{{ Storage::url($attachment->path) }}"
                                    alt="Attachment"
                                    class="w-[128px] h-32 object-cover">
                            @elseif ($attachment->type == 'application/pdf')
                                <div
                                    class="flex items-center justify-center h-32 bg-red-200">
                                    <i class="fas fa-file-pdf text-4xl text-red-500"></i>
                                </div>
                            @elseif ($attachment->type == 'application/zip' || $attachment->type == 'application/x-rar-compressed')
                                <div
                                    class="flex items-center justify-center h-32 bg-green-200">
                                    <i class="fas fa-file-archive text-4xl text-green-500"></i>
                                </div>
                            @elseif (str_starts_with($attachment->type, 'video/'))
                                <div
                                    class="flex items-center justify-center h-32 bg-blue-200">
                                    <i class="fas fa-file-video text-4xl text-blue-500"></i>
                                </div>
                            @elseif (str_starts_with($attachment->type, 'audio/'))
                                <div
                                    class="flex items-center justify-center h-32 bg-yellow-200">
                                    <i class="fas fa-file-audio text-4xl text-yellow-500"></i>
                                </div>
                            @else
                                <div
                                    class="flex items-center justify-center h-32 bg-gray-300">
                                    <i class="fas fa-file text-4xl text-gray-500"></i>
                                </div>
                            @endif
                            <a href="{{ Storage::url($attachment->path) }}"
                               class="absolute top-0 btn btn-xs btn-circle btn-ghost right-0 mt-1 mr-1 bg-gray-500 text-white text-xs px-2 py-1">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <!-- if no message or attachment -->
    @if (!$message->content && $message->attachments->count() == 0)
        <div
            class="inline-block max-w-[400px] {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white sent-message ' : 'bg-gray-200 text-gray-800 received-message ' }} px-1 py-1/4">
            <i class="fas fa-exclamation-circle"></i> This message has been
            deleted.
        </div>
    @endif
        <!-- justify-end or justify-start -->
    <div class="flex items-center gap-2 {{ $message->sender_id == Auth::id() ? 'justify-end' : 'justify-start' }}">
        <div class="text-[10px] text-blue-500">
            {{ $message->time }}
        </div>
        @if ($message->sender_id == Auth::id())
            @if ($message->read_at)
                <div class="relative mb-1 px-[2px]">
                    <i class="fas fa-check m-0 p-0 text-blue-500 text-[10px]"></i>
                    <i class="fas absolute m-0 p-0 left-[2px] fa-check text-blue-500 text-[10px] top-[43%] transform[-50%]">
                    </i>
                </div>
            @else
                <div class="relative mb-1 px-[2px]">
                    <i class="fas fa-check text-green-500 text-[10px]"></i>
                    <i class="fas absolute m-0 p-0 left-[2px] fa-check text-green-500 text-[10px] top-[43%] transform[-50%]"></i>
                </div>
            @endif
        @endif
    </div>
</div>
